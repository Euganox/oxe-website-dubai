<?php

if (!function_exists('view')) {
    /**
     * Функция упрощения подключения шаблонов
     * @param string $page - путь до страницы или сама страница.
     * @param array $data - передаваемые данные на страницу.
     * @return string
     */
    function view (string $page, array $data = []) : string {
        // Включение буферизации вывода
        ob_start();
        // Импортирует переменные из массива в текущую таблицу символов
        extract($data);

        require TPL_PATH . 'pages/' . $page . '.page.php';

        // Возвращает содержимое буфера вывода
        $result = ob_get_contents();
        // Очистить (стереть) буфер вывода и отключить буферизацию вывода
        ob_end_clean();

        return $result;
    }
}