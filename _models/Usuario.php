<?php

class Usuario extends Model {

    private $uid;

    public function __construct($id = '') {
        parent::__construct();
        if (!empty($id)) {
            $this->uid = $id;
        }
    }

    public function addUsuario($nome, $email, $senha, $funcao) {
        $sql = "INSERT INTO usuarios (ID, NOME, EMAIL, SENHA, FUNCAO) VALUES " .
                "(DEFAULT, '$nome', '$email', '$senha', '$funcao')";
        try {
            $this->db->query($sql);
            return TRUE;
        } catch (PDOException $ex) {
            echo "Erro:</br></br> " . $ex->getMessage();
            exit();
        }
    }

    public function getAutenticacao($email, $senha) {
        $sql = "SELECT id,nome,funcao FROM usuarios "
                . "WHERE email = :email AND senha = :senha";
        // Prepara a consulta para execução e retorna um objeto "statement":
        $query = $this->db->prepare($sql);
        // Copia o valor de uma variável para a chave indicada da consulta:
        $query->bindValue(':email', $email);
        $query->bindValue(':senha', $senha);
        try {
            // Executa o "statement" previamente preparado:
            $query->execute();
            // Retorna o número de linhas afetadas pela consulta do "statement":
            if ($query->rowCount() === 1) {
                // Copia os dados da próxima linha do resultado para um array:
                $res = $query->fetch();
                // cria variáveis de sessão utilizando os dados do usuário:
                $_SESSION['uid'] = $res['id'];
                $_SESSION['username'] = $res['nome'];
                $_SESSION['funcao'] = $res['funcao'];
                $_SESSION['logged'] = TRUE;
                return TRUE;
            } else {
                return FALSE;
            }
        } catch (PDOException $ex) {
            return FALSE;
        } finally {
            // Fecha o cursor permitindo que a consulta seja efetuada novamente.
            $query->closeCursor();
        }
    }
        
    public function verifyUsername($email) {
        $sql = "SELECT * FROM usuarios WHERE email = :username";
        $query = $this->db->prepare($sql);
        $query->bindValue(':username', $email);
        $query->execute();
        if ($query->rowCount() > 0) {
            return false; // email ja existe
        } else {
            return true; // email ainda não utilizado
        }
    }

}
