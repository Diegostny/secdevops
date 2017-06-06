<?php

class Sobre_controller extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();
        if (filter_input(INPUT_POST, 'btnEnviar')) {
            $dados['strImagem'] = filter_input(INPUT_POST, 'origem', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        } else {
            $cad = new Cadastros();
            $dados['imagem'] = $cad->getImagem();
        }
        $this->loadTemplate('sobre', $dados);
    }

}
