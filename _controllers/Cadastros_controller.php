<?php

class Cadastros_controller extends Controller {

    function __construct() {
        parent::__construct();
        if (!isset($_SESSION["logged"]) || empty($_SESSION["uid"])) {
            header("Location: /login");
            exit();
        }
    }

    public function index() {
        $dados = array();
        $this->loadTemplate("cadastros", $dados);
    }

    public function getcadastros() {
        $pacientes = new Cadastros();
        header("Content-Type: application/json; charset=UTF-8");
        echo json_encode($pacientes->getPacientes());
    }

    public function update() { // ::::::::::: APENAS A FUNCAO 1 (MÉDICO) PODE ALTERAR CADASTROS :::::::::::::::
        if (!isset($_SESSION["funcao"]) || $_SESSION["funcao"] !== "1") {
            echo "Esta operação não é compatível com sua função. Contate o administrador.";
        } else {
            $paciente['id'] = filter_input(INPUT_POST, 'txtid', FILTER_SANITIZE_STRING);
            $paciente['nome'] = filter_input(INPUT_POST, 'txtNome', FILTER_SANITIZE_STRING);
            $paciente['nascimento'] = filter_input(INPUT_POST, 'txtNascimento', FILTER_SANITIZE_STRING);
            $paciente['sexo'] = filter_input(INPUT_POST, 'txtSexo', FILTER_SANITIZE_STRING);
            $paciente['dtEntrada'] = filter_input(INPUT_POST, 'txtDtEntrada', FILTER_SANITIZE_STRING);
            $paciente['telRes'] = filter_input(INPUT_POST, 'txtTelRes', FILTER_SANITIZE_STRING);
            $paciente['telCel'] = filter_input(INPUT_POST, 'txtTelCel', FILTER_SANITIZE_STRING);
            $paciente['telCom'] = filter_input(INPUT_POST, 'txtTelCom', FILTER_SANITIZE_STRING);
            $paciente['telAd'] = filter_input(INPUT_POST, 'txtTelAd', FILTER_SANITIZE_STRING);
            $paciente['email'] = filter_input(INPUT_POST, 'txtEmail', FILTER_SANITIZE_STRING);
            $paciente['endereco'] = filter_input(INPUT_POST, 'txtEndereco', FILTER_SANITIZE_STRING);
            $paciente['numero'] = filter_input(INPUT_POST, 'txtNumero', FILTER_SANITIZE_STRING);
            $paciente['estado'] = filter_input(INPUT_POST, 'txtEstado', FILTER_SANITIZE_STRING);
            $paciente['cidade'] = filter_input(INPUT_POST, 'txtCidade', FILTER_SANITIZE_STRING);
            $paciente['info'] = filter_input(INPUT_POST, 'txtInformacoes', FILTER_SANITIZE_STRING);
            $cadastro = new Cadastros();
            echo ($cadastro->atualizarCadastro($paciente)) ? '1' : '2';
        }
    }

}
