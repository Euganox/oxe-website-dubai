<?php
/**
 * Класс для общих параметров sql запросов
 */
class Sql {
    /**
     * Left join на справочник
     *
     * @param string $field_name поля для join
     * @param string $dic_id id справочника
     * @param string $field_dic поля справочник для join
     * @param string $alias алиас таблицы
     * @return string
     */
    public static function joinDic($field_name,$dic_id,$field_dic='id',$alias='d') {
        return ' left join soho_dic '.$alias.' on ('.$alias.'.'.$field_dic.'='.$field_name.' and '.$alias.'.dic_id='.$dic_id.')';
    }

    /**
     * Список значений из справочника
     *
     * @param string $dic_name имя справочника
     * @param bool $with_empty возвращать с пустым элементом
     * @param string $with_key возвращать значение и текст
     * @param string $where доп параметры к запросу
     * @return array
     */
    public static function getDic($dic_name,$with_empty=true,$with_key='',$where='') {
        $tbl='soho_dic d, soho_dic_list l';
        $fields=array('d.name as text');
        $where='d.dic_id=l.id and l.code="'.$dic_name.'" '.$where;
        if ($with_key!='')
            $fields[]='d.'.$with_key.' as value';
        $list=DB::select($tbl,$fields,array('order'=>'d.id','where'=>$where));
        if ($with_empty)
            $list=array_merge(array(array('text'=>'')),$list);

        return $list;
    }

    /**
     * Список типов объектов
     *
     * @return array
     */
    public static function getObjTypeList() {
        $list=DB::select('soho_dic ','*',array('where_params'=>array('dic_id'=>76),'order'=>'pos, id'));

        return $list;
    }
}
