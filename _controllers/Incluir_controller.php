<?php

class Incluir_controller extends Controller {

    public function __construct() {
        parent::__construct();
        if (!isset($_SESSION["logged"]) || empty($_SESSION["uid"])) {
            header("Location: /login");
            exit();
        }
    }

    public function index() { // ::::::::::: FUNCAO 1 (MÉDICO) E 0 (ADMIN) PODE INCLUIR CADASTROS :::::::::::::::
        if (!isset($_SESSION["funcao"]) || ($_SESSION["funcao"] !== "0" && $_SESSION["funcao"] !== "1")) {
            echo "<script>alert('Esta operação não é compatível com sua função. Contate o administrador.');</script>";
            $this->loadTemplate('home');
        } else {
            $dados = array();
            if (filter_input(INPUT_POST, 'submitenviar') !== NULL) {
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
                $dados['aviso'] = ($cadastro->incluirPaciente($paciente)) ?
                        "Cadastro incluído com sucesso." :
                        "Ocorreu um erro ao realizar o cadastro.";
            }
            $cad = new Cadastros();
//            $dados['imagem'] = $cad->getImagem();
            $this->loadTemplate('incluir', $dados);
        }
    }

}
