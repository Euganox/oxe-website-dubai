<?php
/**
 * Класс для результатов действий
 */
class Result {
    public $result=false;
    public $text='запрос не обработан';

    function __construct($result=false,$text='') {
        $this->result=$result;
        $this->text=$text;
    }

    public function toArray() {
        return array('result'=>$this->result,'text'=>$this->text);
    }
}