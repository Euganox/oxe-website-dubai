<?php
/**
 * Класс для работы с базой
 *
 * Используется библиотека PDO
 */
class DB
{
	private static $log_file = 'db_error.log';
	private static $connect = FALSE;
	private static $_instance = FALSE;
    private static $debug = FALSE;
	private static $columns_cache = array();
    private static $last_error='';
    public static  $trace = FALSE;
    public static  $cache = TRUE;

    /**
     * Коннект с базе и настройка ее
     */
	public static function config($host, $port, $user, $pass, $dbname, $options = array(), $driver = "mysql") {
        $is_port = isset($port);
		$dsn = $driver . ':host=' . $host . ($is_port ? ';port=' . $port : '') . ';dbname=' . $dbname . ";";

        if (isset($options['log_path']))
            self::$log_file = $options['log_path'] . self::$log_file;
        else
            self::$log_file = dirname(__FILE__) . '/' . self::$log_file;

        if (isset($options['debug']) && $options['debug']==true)
                self::$debug = TRUE;

		try {
			$attr = array(
				PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
				PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_PERSISTENT => true,
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_USE_BUFFERED_QUERY=>true,
                PDO::ATTR_EMULATE_PREPARES => false,
			);

			self::$connect = new PDO($dsn, $user, $pass, $attr);
		} catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            self::logError('Connection failed: ' . $e->getMessage());
		}
	}

    ///////////////////////////////
    // Выполнение запроса
    ///////////////////////////////
	public static function query($sql = NULL, $params = array(), $debug = true) {
		if (!self::$connect) return FALSE;

		if (!is_array($params))
			$params = array($params);

		try {
            if (self::$trace) {
                $tStart = microtime(true);
                echo '<pre>';
                echo $sql;
            }
			$prepared = self::$connect->prepare($sql);

						/*if (user::getUserId() == 1) {
							print $sql.'<pre>';
							print_r($params);
							print '</pre>';
							print '<br><br>';
						}*/

            foreach (array_keys($params) as $key) {
                $value=$params[$key];
                $type=PDO::PARAM_STR;
                if (is_array($value)) {
                    $value=$value['value'];
                    if (isset($value['type']))
                        $type=$value['type'];
                }
                if (is_int($key)) $key++;
                $prepared->bindValue($key, $value, $type);
            }
            $prepared->execute();

            if (self::$trace) {
                echo 'Время выполнения: '.number_format(microtime(true) - $tStart, 4);
                echo '</pre>';
            }

		} catch (PDOException $e) {
            //echo_array($e);
			$log = trim($sql) . "\n" . '"' . $e->getMessage() . '": ' . $e->getTraceAsString() . "\n";
            self::logError($log,$debug);
			return false;
		}
		return $prepared;
	}

    ///////////////////////////////
    // select к одной таблице с параметрами
    ///////////////////////////////
	//public static function select($from, $fields = array(), $params = array(), $debug = true, $globalsearch2 = false) {
	public static function select($from, $fields = array(), $params = array(), $debug = true) {
		if (!self::$connect) return FALSE;

        // Список таблиц
        if (is_array($from))
            $from = implode(', ',$from);

        // Список полей
		if (is_array($fields))
            $fields = implode(', ',$fields);
        else if ($fields=='' || !$fields)
            $fields = '*';

        // Where параметры
        $where='';
        if (is_string($params))
            $params = array('where' => $params);
        if (array_key_exists('where', $params) && !empty($params['where'])) {
            if (is_array($params['where']))
                $where = ' WHERE '.implode(' AND ', $params['where']);
            else
                $where = ' WHERE '.$params['where'];
        }

        // Параметры для Prepare
        $bind_params=array();
        if (array_key_exists('params', $params) &&  !empty($params['params']) && is_array($params['params']))
            $bind_params=$params['params'];

        // Joins
		$left_join = array_key_exists('left_join', $params) ? ' LEFT JOIN '.$params['left_join'] : '';
		$join = array_key_exists('join', $params) ? ' JOIN '.$params['join'] : '';

        // Параметры для bindValue
        if (array_key_exists('where_params', $params) && !empty($params['where_params']) && is_array($params['where_params'])) {
            $t=self::getParams($params['where_params']);
            $bind_params=array_merge($bind_params,$t['bind_params']);
            $where_params=$t['where_params'];

            if (count($where_params)>0)
            {
                if ($where != '') $where.=' AND '.implode(' AND ', $where_params);
                else $where = ' WHERE '.implode(' AND ', $where_params);
            }
        }

        // Сортировка
		$order = array_key_exists('order', $params) ? ' ORDER BY '.$params['order'] : '';

        // Группировка
		$group = array_key_exists('group', $params) ? ' GROUP BY '.$params['group'] : '';

        // Лимит
		$limit = '';
		if (array_key_exists('limit', $params)) {
			$limit = ' LIMIT ';
			if (is_array($params['limit'])) {
				$limit .= $params['limit'][0].','.$params['limit'][1];
			} else {
				$limit .= $params['limit'];
			}
		}

		$offset = '';
		if (array_key_exists('offset', $params)) {
			$offset = ' OFFSET ';
			$offset .= $params['offset'];
		}

        if (!self::$cache)
            $fields='SQL_NO_CACHE '.$fields;

		$sql = 'SELECT '.$fields.' FROM '.$from.$left_join.$join.$where.$group.$order.$limit.$offset;
		/*if (user::getUserId()==1) {
			print $sql;
			print '<br><br>';
		}*/
		$result = self::query($sql, $bind_params, $debug);

		// Test
		// if (user::getUserId()==1) {
		// 	echo('<br><br>');
		// 	echo('<b>sql - </b>');
		// 	print_r($sql);
		// 	echo('<br><br>');
		// 	echo('<b>bind_params - </b>');
		// 	print_r($bind_params);
		// 	echo('<br><br>');
		// }

		if (!!$result && $result->rowCount()) {
			//ini_set('memory_limit', '-1');
			$result = $result->fetchAll( (!empty($params['pdo']) ? $params['pdo'] : false));

            // Преобразование массива с ключом в качестве значения одного из полей
			if (isset($params['key'])) {
				$tmp = array();
                $key = $params['key'];
				foreach ($result as $row) {
					if (!isset($row[$key])) continue;
					$tmp[$row[$key]] = $row;

                    // удаляем значение ключа из массива
                    unset($tmp[$row[$key]][$key]);

                    /*
                    // если остался только 1 элемент в массиве, то преобразовываем массив в строку
                    if (count($tmp[$row[$key]])==1) {
                        $keys=array_keys($tmp[$row[$key]]);
                        $tmp[$row[$key]]=$tmp[$row[$key]][$keys[0]];
                    }
                    */
				}
				$result = $tmp;
				unset($tmp);
			}
			return $result;
		}

		return array();
	}


    ///////////////////////////////
    // Удаление записи
    ///////////////////////////////
    public static function delete($tbl, $where_params = array(), $debug = true) {
        if (!self::$connect) return new Result(false,'Нет связи с базой');

        $where='';
        if (count($where_params)>0)
        {
            $t=self::getParams($where_params);
            $params=$t['bind_params'];
            $where_params=$t['where_params'];
            $where = ' WHERE '.implode(' AND ', $where_params);
        }

        $sql = 'delete from '.self::getTableName($tbl).$where;
        $result=self::query($sql, $params, $debug);

        if ($result===false)
            return false;
        else
            return $result->rowCount();
    }

    ///////////////////////////////
    // update одной таблицы
    ///////////////////////////////
    public static function update($tbl_name, $values = null, $where_params = array(), $debug = true) {
        if (!self::$connect) return FALSE;

        $tbl_columns = self::getColumns($tbl_name);

        if ($values === null || $values === false) {
            $values = array();
            foreach ($_POST as $field_name => $field_value) {
                if (!array_key_exists($field_name, $tbl_columns) || is_array($field_value)) continue;
                if ($tbl_columns[$field_name]['Key'] == 'PRI' && $tbl_columns[$field_name]['Extra'] == 'auto_increment') continue;

                $values[$field_name] = self::setValue($field_value,$field_name,$tbl_columns);
            }
        }

        $params = array();
        $fields = array();
        $where='';

        foreach ($values as $field_name => $field_value) {
            if (!is_null($field_value)) {
                $fields[] = '`'.$field_name.'` = :new_'.$field_name;
                $params[':new_'.$field_name] = self::setValue($field_value,$field_name,$tbl_columns);
            }
            else
                $fields[] = '`'.$field_name.'` = NULL';
        }

        $t=self::getParams($where_params);
        $params=array_merge($params,$t['bind_params']);
        $where_params=$t['where_params'];

        if (count($where_params)>0)
            $where = ' WHERE '.implode(' AND ', $where_params);

        $sql = 'UPDATE '.self::getTableName($tbl_name).' SET '.implode(',', $fields).' '.$where;

        $result=self::query($sql, $params, $debug);

        if ($result===false)
            return false;
        else
            return $result->rowCount();
    }

    ///////////////////////////////
    // Выполнение insert
    ///////////////////////////////
    public static function insert($tbl_name, $values = null, $debug = true) {
        if (!self::$connect) return FALSE;

        $tbl_columns = self::getColumns($tbl_name);

        if ($values === null || $values === false) {
            $values = array();
            foreach ($_POST as $field_name => $field_value) {
                if (!array_key_exists($field_name, $tbl_columns) || is_array($field_value)) continue;
                if ($tbl_columns[$field_name]['Key'] == 'PRI' && $tbl_columns[$field_name]['Extra'] == 'auto_increment') continue;
                if (!array_key_exists($field_name, $tbl_columns) || is_array($field_value)) continue;

                $values[$field_name]=self::setValue($field_value,$field_name,$tbl_columns);
            }
        }

        $params = array();
        $fields = array();

        foreach ($values as $field_name => $field_value) {

            if (is_null($field_value) && !is_null($tbl_columns[$field_name]['Default'])) {
                $fields[] = '`'.$field_name.'`';
                $params[] = $tbl_columns[$field_name]['Default'];
            } elseif (!is_null($field_value)) {
                $fields[] = '`'.$field_name.'`';
                $params[] = self::setValue($field_value,$field_name,$tbl_columns);
            }
        }

        if (!$fields) return false;

        $sql = 'INSERT INTO '.self::getTableName($tbl_name).'('.implode(',', $fields).') VALUES ('.implode(',', array_fill(0, count($fields), '?')).')';

        $result=self::query($sql, $params, $debug);

        if ($result===false)
            return false;
        else
            return self::getLastInsertId();
    }

    ///////////////////////////////
    // Получение значения одного поля
    ///////////////////////////////
    public static function getValue($tbl, $field , $params = array(), $debug = true) {
        if (!self::$connect) return FALSE;

        $sql_field=$field;
        if (is_array($field)) {
            if (isset($field['function']))
                $sql_field=$field['function'];
            if (isset($field['field'])) {
                $sql_field=$field['function'].' as '.$field['field'];
                $field=$field['field'];
            }
        }

        $result=self::select($tbl, $sql_field , $params, $debug);

        if ($result===false)
            return false;
        else {
            if (isset($result[0]))
                return $result[0][$field];
            else
                return '';
        }
    }

    ///////////////////////////////
    // Получение списка значений одного поля
    ///////////////////////////////
    public static function getArray($tbl, $field , $params = array(), $debug = true) {
        if (!self::$connect) return FALSE;

        $sql_field=$field;
        if (is_array($field)) {
            if (isset($field['function']))
                $sql_field=$field['function'];
            if (isset($field['field'])) {
                $sql_field=$field['function'].' as '.$field['field'];
                $field=$field['field'];
            }
        }

        $result=self::select($tbl, $sql_field , $params, $debug);

        if ($result===false)
            return false;
        else {
            $a=array();
            foreach ($result as $row) $a[]=$row[$field];
            return $a;
        }
    }

    /*
    ///////////////////////////////
    // Определение количества записей
    ///////////////////////////////
    public static function count($params = array(), $debug = true) {
        if (!self::$connect) return FALSE;

        $sql='select count(*) from ';
        if (!isset($params['from']))
            return FALSE;
        else
            $sql.=$params['from'];

        if (isset($params['where']))
            $sql.=' where '.$params['where'];

        $result = self::query($sql, array_key_exists('params', $params) ? $params['params'] : array(), $debug);

        if (!!$result) {
            return intval($result->fetch(PDO::FETCH_COLUMN));
        }

        return 0;
    }
    */

    ///////////////////////////////
    // Определение количества записей
    ///////////////////////////////
    //public static function count($from, $params = array(), $debug = true, $globalsearch2 = false) {
		public static function count($from, $params = array(), $debug = true) {
        if (!self::$connect) return FALSE;

        if (is_array($from))
            $from = implode(', ',$from);

        if (is_string($params)) $params = array('where' => $params);

        $where = array_key_exists('where', $params) ? ' WHERE '.$params['where'] : '';
        $left_join = array_key_exists('left_join', $params) ? ' LEFT JOIN '.$params['left_join'] : '';
        $join = array_key_exists('join', $params) ? ' JOIN '.$params['join'] : '';
        $order = array_key_exists('order', $params) ? ' ORDER BY '.$params['order'] : '';

        // Параметры для bindValue
        $bind_params=array();

        if (array_key_exists('where_params', $params) && !empty($params['where_params']) && is_array($params['where_params'])) {
            $t=self::getParams($params['where_params']);
            $bind_params=array_merge($bind_params,$t['bind_params']);
            $where_params=$t['where_params'];

            if (count($where_params)>0)
            {
							/*if ($globalsearch2) {
								if ($where!='')
										$where.=' AND '.implode(' OR ', $where_params);
								else
										$where = ' WHERE '.implode(' OR ', $where_params);
							}
							else {
								if ($where!='')
										$where.=' AND '.implode(' AND ', $where_params);
								else
										$where = ' WHERE '.implode(' AND ', $where_params);
							}*/
							if ($where!='')
									$where.=' AND '.implode(' AND ', $where_params);
							else
									$where = ' WHERE '.implode(' AND ', $where_params);
            }
        }

				if (((isset($_GET['project'])) and (((isset($_GET['section'])) and
				($_GET['section'] !=  'country_houses') and ($_GET['section'] !=  'country_lands')) and
				($_GET['project'] == 'main'))) and (!isset($_GET['filter']))) {
					$pos = strripos($from, 'left join');
					if ($pos === false) {
						$sql = 'SELECT COUNT(*) AS count FROM '.$from.$where;
					}
					else {
						$pieces = explode(" left join ", $from);
						$sql = 'SELECT COUNT(*) AS count FROM '.$pieces[0].$where;
					}
				}
				// MASS MARKET
				elseif (((isset($_GET['project'])) and (((isset($_GET['section'])) and
				($_GET['section'] !=  'country_houses_mm') and ($_GET['section'] !=  'country_lands_mm')) and
				($_GET['project'] == 'massmarket'))) and (!isset($_GET['filter']))) {
					$pos = strripos($from, 'left join');
					if ($pos === false) {
						$sql = 'SELECT COUNT(*) AS count FROM '.$from.$where;
					}
					else {
						$pieces = explode(" left join ", $from);
						$sql = 'SELECT COUNT(*) AS count FROM '.$pieces[0].$where;
					}
				}
				//
				else {
					$sql = 'SELECT COUNT(*) AS count FROM '.$from.$left_join.$join.$where.$order;
				}

        $result = self::query($sql, $bind_params, $debug);

        if (!!$result) {
            return intval($result->fetch(PDO::FETCH_COLUMN));
        }

        return 0;
    }

    /*
    ///////////////////////////////
    // Выборка записи по ключу
    ///////////////////////////////
	public static function one($tbl_name, $primary_key, $fields = false, $params = array(), $debug = false) {
		if (!self::$connect) return FALSE;

		if (is_array($primary_key)) {
			$params = $primary_key;
			$primary_key = false;
			$debug = (bool) $fields;
		}

		if (!$fields) $fields = self::getTableName($tbl_name).'.*';

		if (is_string($params)) $params = array('where' => $params);

		$left_join = array_key_exists('left_join', $params) ? ' LEFT JOIN '.$params['left_join'] : '';
		$join = array_key_exists('join', $params) ? ' JOIN '.$params['join'] : '';
		$order = array_key_exists('order', $params) ? ' ORDER BY '.$params['order'] : '';

		if ($primary_key !== false && $pk_field = self::getColumns($tbl_name, 'pk')) {
			$params['where'] = self::getTableName($tbl_name).'.`'.$pk_field.'` = '.intval($primary_key);
		}

		if (array_key_exists('where', $params) && !empty($params['where'])) {
			if (is_array($params['where'])) {
				$where = ' WHERE '.implode(' AND ', $params['where']);
			} else {
				$where = ' WHERE '.$params['where'];
			}
		} else {
			$where = '';
		}
		$sql = 'SELECT '.$fields.' FROM '.self::getTableName($tbl_name).$left_join.$join.$where.$order.' LIMIT 1';

		//var_dump($sql);
		$result = self::query($sql, array_key_exists('params', $params) ? $params['params'] : array(), $debug);

		if (!!$result && $result->rowCount()) {
			return $result->fetch( (!empty($params['pdo']) ? $params['pdo'] : false) );
		}

		return array();
	}

    ///////////////////////////////
    // Update по первичному ключу
    ///////////////////////////////
	public static function update_pk($tbl_name, $post = null, $debug = false) {
		if (!self::$connect) return FALSE;

		if ($post === null || $post === false) {
			$post = $_POST;
		}

		$params = array();
		$tbl_columns = self::getColumns($tbl_name);

		$pri = '';
		$fields = array();
		foreach ($post as $field_name => $field_value) {
			if (!array_key_exists($field_name, $tbl_columns) || is_array($field_value)) continue;

			if ($tbl_columns[$field_name]['Key'] == 'PRI' && $tbl_columns[$field_name]['Extra'] == 'auto_increment') {
				$pri = $field_name;
				continue;
			}

			if (is_null($field_value) && !is_null($tbl_columns[$field_name]['Default'])) {
				$fields[] = '`'.$field_name.'` = ?';
				$params[] = $tbl_columns[$field_name]['Default'];
			} elseif (!is_null($field_value)) {
				$fields[] = '`'.$field_name.'` = ?';
				$params[] = $field_value;
			}
		}

		if (!$fields || !array_key_exists($pri, $post)) return;

		$params[] = $post[$pri];

		$sql = 'UPDATE '.self::getTableName($tbl_name).' SET '.implode(',', $fields).' WHERE `'.$pri.'` = ?';

//		var_dump($sql, $params);
		return self::query($sql, $params, $debug);
	}

    */



	public static function getColumns($tbl_name, $params = array()) {
		if (!self::$connect) return FALSE;

		if (array_key_exists($tbl_name, self::$columns_cache)) {
			$columns = self::$columns_cache[$tbl_name];
		} else {
			$result = self::query('SHOW FULL COLUMNS FROM '.self::getTableName($tbl_name));
			if (!$result) return array();

			// Field, Type, Null, Key, Default, Extra
			$columns = array();
			foreach ($result->fetchAll() as $ar) {
				$columns[$ar['Field']] = $ar;
			}

			if (!empty($columns)) {
				self::$columns_cache[$tbl_name] = $columns;
			}
		}

		if (!empty($params)) {
			if (is_array($params)) {

			} else {
				switch($params) {
					case 'pk':
						foreach ($columns as $column_name => $ar) {
							if ($ar['Key'] == 'PRI' && $ar['Extra'] == 'auto_increment') {
								return $column_name;
							}
						}
						return null;
						break;
				}
			}
		}

		return $columns;
	}

	public static function getTableName($tbl_name) {
		if (strpos($tbl_name, ' ') !== false) {
			list($table, $as) = explode(' ', $tbl_name, 2);
			$as = ' '.$as;
		} else {
			$table = $tbl_name;
			$as = '';
		}
		return '`'.$table.'`'.$as;
	}

    //////////////////////////////
    // Проверка на пустое значение
    //////////////////////////////
    private static function setValue($value,$field,$fields) {
        if ($value=='' && isset($fields[$field])) {
            if ($fields[$field]['Type']=='timestamp' && $fields[$field]['Null']=='YES')
                $value=null;
        }
        return $value;
    }

    //////////////////////////////
    // Формирование строки условия и параметров для bind
    //////////////////////////////
    private static function getParams($params=array())
    {
        $where_params=array();
        $bind_params=array();

        foreach (array_keys($params) as $key) {
            $operator='=';
            if (is_array($params[$key]) && isset($params[$key]['operator']) && $params[$key]['operator']!=='')
                $operator=$params[$key]['operator'];

            if (is_array($params[$key]))
                $value=$params[$key]['value'];
            else
                $value=$params[$key];

            if (strtolower($operator)=='like')
                $value='%'.$value.'%';

            $field=$key;
            if (is_array($params[$key]) && isset($params[$key]['function']) && $params[$key]['function']!='') // Вместо названия поля используем функцию
                $field=$params[$key]['function'];

            if (is_array($value)) { // от до
								if ($field == 'u.id') {
									if (($value[0] == 234) or ($value[1] == 234) or ($value[0] == 343) or ($value[1] == 343)) {
										$where_params[]='u.id = :u_id1 or u.id = :u_id2';
										$bind_params[':u_id1']=$value[0];
										$bind_params[':u_id2']=$value[1];
									}
									else if (is_array($value)) {
										$counter=1;
										foreach ($value as $mini_key => $mini_value) {
											$value[$mini_key]='"'.$mini_value.'"';
										}
										$where_params[]='u.id = '.implode(' or u.id = ',$value);
									}
								}
                elseif (is_array($params[$key]) && isset($params[$key]['template']) && $params[$key]['template']!='') {// подставляем шаблон вместо поля
                    $t=$params[$key]['template'];
                    $t=str_replace('#VALUE_FROM#',$value[0],$t);
                    $t=str_replace('#VALUE_TO#',$value[1],$t);
                    $where_params[]=$t;
                }
								else {
                    if ($value[0]!=='') {
                        $bind_params[':'.str_replace('.','_',$key).'_from']=$value[0];
                        $where_params[]=$field.' >= :'.str_replace('.','_',$key).'_from';
                    }
                    if ($value[1]!=='') {
                        $bind_params[':'.str_replace('.','_',$key).'_to']=$value[1];
                        $where_params[]=$field.' <= :'.str_replace('.','_',$key).'_to';
                    }
                }
            } else {
                $bind=true;
                if (is_array($params[$key]) && isset($params[$key]['template']) && $params[$key]['template']!='') { // подставляем шаблон вместо поля
                    if (strpos($params[$key]['template'],'#VALUE#')==false)
                        $bind=false;
                    $where_params[]=str_replace('#VALUE#',' :'.str_replace('.','_',$key),$params[$key]['template']);
                } else
                    $where_params[]=$field.' '.$operator.' :'.str_replace('.','_',$key);

                if ($bind)
                    $bind_params[':'.str_replace('.','_',$key)]=$value;
            }

        }
        return array('where_params'=>$where_params, 'bind_params'=>$bind_params);
    }

    private static function logError($msg,$debug=true)
    {
        self::$last_error=$msg;

        if ($debug == true && self::$debug == true) {
            echo '<pre>'.$msg.'</pre>';
        } else {
            $msg = "[" . date("H:i:s d.m.Y") . "]\n" . $msg . "\n\n";
            file_put_contents(self::$log_file, $msg, FILE_APPEND);
        }
    }

	public static function getLastInsertId() {
		if (!self::$connect) return FALSE;

		return self::$connect->lastInsertId();
	}

    public static function getLastError() {
        return self::$last_error;
    }

    public static function getConnection()
	{
		if (!self::$connect) return FALSE;

		return self::$connect;
	}

	private static function getInstance()
	{
		if (self::$_instance == FALSE) self::$_instance = new self();

		return self::$_instance;
	}

	private function __construct()
	{
	}

	private function __clone()
	{
	}
}
