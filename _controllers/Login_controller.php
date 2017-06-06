<?php

class Login_controller extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $dados = array();
        if (filter_input(INPUT_POST, 'submitLogin')) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
            if (empty($email) || empty($senha)) {
                $dados['aviso'] = "Informe usuário e senha.";
            } else {
                $user = new Usuario();
                if ($user->getAutenticacao($email, $senha)) {
                    header("Location: /home");
                    exit;
                } else {
                    $dados['aviso'] = "Usuário e/ou senha incorreto.";
                }
            }
        }
        $this->loadTemplate('login', $dados);
    }

    public function cadastrar() {
        if (!isset($_SESSION["funcao"]) || $_SESSION["funcao"] !== "0") {
            echo "<script>alert('Esta operação não é compatível com sua função. Contate o administrador.');</script>";
            $this->loadTemplate('home');
        } else {
            $dados = array();
            if (filter_input(INPUT_POST, 'cadastrar')) {
                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
                $funcao = filter_input(INPUT_POST, 'funcao', FILTER_SANITIZE_STRING);
                $senha1 = filter_input(INPUT_POST, 'senha1', FILTER_SANITIZE_STRING);
                $senha2 = filter_input(INPUT_POST, 'senha2', FILTER_SANITIZE_STRING);
                if (!empty($nome) && !empty($email)) {
                    if (!empty($senha1) && ($senha1 === $senha2)) {
                        $senha = sha1($senha1);
                        $user = new Usuario();
                        if ($user->verifyUsername($email)) {
                            if ($user->addUsuario($nome, $email, $senha, $funcao)) {
                                header("Location: /home");
                                exit();
                            }
                        } else {
                            $dados['aviso'] = "O nome de usuário já existe. Escolha outro.";
                        }
                    } else {
                        $dados['aviso'] = "Cadastrado não efetuado. Os campos de senha devem ser idênticos.";
                    }
                } else {
                    $dados['aviso'] = "Informe todos os campos.";
                }
            }
            $this->loadTemplate('cadastrar', $dados);
        }
    }

    public function sair() {
        $_SESSION = array();
        session_destroy();
        header("Location: /home");
    }

}
