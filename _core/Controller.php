<?php

class Controller {

    public function __construct() {

    }

    public function loadView($viewName, $dados = array()) {
        extract($dados);
        require '_views/' . $viewName . '.php';
    }

    public function loadTemplate($viewName, $dados = array()) {
        extract($dados);
        require "_views/template.php";
    }

    public function loadViewTemplate($viewName, $dados = array()) {
        extract($dados);
        include '_views/' . $viewName . '.php';
    }

}
