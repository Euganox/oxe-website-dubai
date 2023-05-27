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
        } else if (isset($uriArr[0]) && ($uriArr[0] === 'lora' || $uriArr[0] === 'LORA')) {
            return 'LORA';
        } else if (isset($uriArr[0]) && ($uriArr[0] === 'mont' || $uriArr[0] === 'MONT')) {
            return 'MONT';
        } else if (isset($uriArr[0]) && ($uriArr[0] === 'play' || $uriArr[0] === 'PLAY')) {
            return 'PLAY';
        } else if (isset($uriArr[0]) && ($uriArr[0] === 'mer' || $uriArr[0] === 'MER')) {
            return 'MER';
        } else if (isset($uriArr[0]) && ($uriArr[0] === 'bit' || $uriArr[0] === 'BIT')) {
            return 'BIT';
        } else if (isset($uriArr[0]) && ($uriArr[0] === 'UB' || $uriArr[0] === 'ub')) {
            return 'UB';
        } else if (isset($uriArr[0]) && ($uriArr[0] === 'ral' || $uriArr[0] === 'RAL')) {
            return 'RAL';
        }  else if (isset($uriArr[0]) && ($uriArr[0] === 'cond' || $uriArr[0] === 'COND')) {
            return 'COND';
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
        } else if (self::getLocale() === 'LORA') {
            require TPL_PATH . 'pages/lora/' . $page . '.page.php';
        } else if (self::getLocale() === 'MER') {
            require TPL_PATH . 'pages/mer/' . $page . '.page.php';
        } else if (self::getLocale() === 'MONT') {
            require TPL_PATH . 'pages/mont/' . $page . '.page.php';
        } else if (self::getLocale() === 'PLAY') {
            require TPL_PATH . 'pages/play/' . $page . '.page.php';
        } else if (self::getLocale() === 'BIT') {
            require TPL_PATH . 'pages/bit/' . $page . '.page.php';
        } else if (self::getLocale() === 'UB') {
            require TPL_PATH . 'pages/ub/' . $page . '.page.php';
        } else if (self::getLocale() === 'RAL') {
            require TPL_PATH . 'pages/ral/' . $page . '.page.php';
        } else if (self::getLocale() === 'COND') {
            require TPL_PATH . 'pages/cond/' . $page . '.page.php';
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
        $requestScheme = $_SERVER['REQUEST_SCHEME'] ?? 'https';

        return "$requestScheme://{$_SERVER['HTTP_HOST']}";
    }

    public static function getCurrentPage() : string {
        return self::getCurrentAction();
    }

    private static function getCurrentAction($default = "home") : string {
        $uriArr = array_values(array_filter(explode('/', explode('?', $_SERVER['REQUEST_URI'])[0]), fn($it) => boolval($it)));

        if (isset($uriArr[0]) && $uriArr[0] === 'ru'
            || isset($uriArr[0]) && $uriArr[0] === 'lora'
            || isset($uriArr[0]) && $uriArr[0] === 'mer'
            || isset($uriArr[0]) && $uriArr[0] === 'ub'
            || isset($uriArr[0]) && $uriArr[0] === 'mont'
            || isset($uriArr[0]) && $uriArr[0] === 'play'
            || isset($uriArr[0]) && $uriArr[0] === 'bit'
            || isset($uriArr[0]) && $uriArr[0] === 'ral'
            || isset($uriArr[0]) && $uriArr[0] === 'cond'
        ) {
            $currentAction = Arrays::arrayGet($uriArr, 1, $default);
        } else {
            $currentAction = Arrays::arrayGet($uriArr, 0, $default);
        }

        return $currentAction;
    }
}