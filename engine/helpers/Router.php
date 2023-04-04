<?php

class Router {
    public static function route($default = 'home') {
        $currentAction = self::getCurrentAction($default);

        $actionPath    = ACT_PATH . $currentAction;

        $filePath = $actionPath . '.php';
        if (!file_exists($filePath)) {
            self::abort(404, 'Страница не найдена');
        }

        require($filePath);
    }

    public static function getLocale() : string {
        $uriArr = array_values(array_filter(explode('/', explode('?', $_SERVER['REQUEST_URI'])[0]), fn($it) => boolval($it)));

        if (isset($uriArr[0]) && ($uriArr[0] === 'ru' || $uriArr[0] === 'RU')) {
            return 'RU';
        } else {
            return 'EN';
        }
    }

    public static function abort(int $code, string $message = 'Неизвестная ошибка') {
        http_response_code($code);
        require(TPL_PATH . 'layouts/error.layout.php');
        exit;
    }

    public static function view (string $page, array $data = []) : string {
        // Включение буферизации вывода
        ob_start();
        // Импортирует переменные из массива в текущую таблицу символов
        extract($data);

        if (self::getLocale() === 'RU') {
            require TPL_PATH . 'pages/ru/' . $page . '.page.php';
        } else {
            require TPL_PATH . 'pages/' . $page . '.page.php';
        }

        // Возвращает содержимое буфера вывода
        $result = ob_get_contents();
        // Очистить (стереть) буфер вывода и отключить буферизацию вывода
        ob_end_clean();

        return $result;
    }

    public static function getSite() : string {
        return "{$_SERVER['REQUEST_SCHEME']}://{$_SERVER['HTTP_HOST']}";
    }

    public static function getCurrentPage() : string {
        return self::getCurrentAction();
    }

    private static function getCurrentAction($default = "home") : string {
        $uriArr = array_values(array_filter(explode('/', explode('?', $_SERVER['REQUEST_URI'])[0]), fn($it) => boolval($it)));

        if (isset($uriArr[0]) && $uriArr[0] === 'ru') {
            $currentAction = Arrays::arrayGet($uriArr, 1, $default);
        } else {
            $currentAction = Arrays::arrayGet($uriArr, 0, $default);
        }

        return $currentAction;
    }
}