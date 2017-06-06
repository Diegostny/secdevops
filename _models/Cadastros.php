<?php

class Cadastros extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPacientes($id = '') {
        $rows = array();
//        $sql = "SELECT *, CASE sexo " .
//                "WHEN 'M' THEN 'Masculino' WHEN 'F' THEN 'Feminino' END AS sexo " .
//                "FROM paciente ";
        $sql = "SELECT * FROM paciente";
        if (empty($id)) {
            $query = $this->db->prepare($sql);
        } else {
            $query = $this->db->prepare($sql . " WHERE id= :id");
            $query->bindValue(':id', $id);
        }
        try {
            $query->execute();
            $rows = $query->fetchAll(PDO::FETCH_OBJ);
            return $rows;
        } catch (Exception $ex) {
            throw $ex;
        } finally {
            $query->closeCursor();
        }
    }

    public function incluirPaciente($pac) {
        extract($pac);
        try {
            $query = $this->db->prepare(
                    "INSERT INTO paciente (id, nome, nascimento, sexo, dtEntrada, telRes, telCel, telCom, telAd, "
                    . "email, endereco, numero, estado, cidade, info) "
                    . "VALUES (DEFAULT, :nome, :nascimento, :sexo, :dtEntrada, :telRes, :telCel, :telCom, :telAd, "
                    . ":email, :endereco, :numero, :estado, :cidade, :info)");
            $query->bindValue(':nome', $nome);
            $query->bindValue(':nascimento', $nascimento);
            $query->bindValue(':sexo', $sexo);
            $query->bindValue(':dtEntrada', $dtEntrada);
            $query->bindValue(':telRes', $telRes);
            $query->bindValue(':telCel', $telCel);
            $query->bindValue(':telCom', $telCom);
            $query->bindValue(':telAd', $telAd);
            $query->bindValue(':email', $email);
            $query->bindValue(':endereco', $endereco);
            $query->bindValue(':numero', $numero);
            $query->bindValue(':estado', $estado);
            $query->bindValue(':cidade', $cidade);
            $query->bindValue(':info', $info);
            $query->execute();
            return TRUE;
        } catch (Exception $ex) {
            echo "Erro:</br>" . $ex->getMessage();
            exit();
        } finally {
            $query->closeCursor();
        }
    }

    public function atualizarCadastro($pac) {
        extract($pac);
        try {
            $query = $this->db->prepare(
                    "UPDATE paciente SET nome=:nome, nascimento=:nascimento, sexo=:sexo, dtEntrada=:dtEntrada, "
                    . " telRes=:telRes, telCel=:telCel, telCom=:telCom, telAd=:telAd, email=:email, "
                    . " endereco=:endereco, numero=:numero, estado=:estado, cidade=:cidade, info=:info "
                    . " WHERE id = :id");
            $query->bindValue(':id', $id);
            $query->bindValue(':nome', $nome);
            $query->bindValue(':nascimento', $nascimento);
            $query->bindValue(':sexo', $sexo);
            $query->bindValue(':dtEntrada', $dtEntrada);
            $query->bindValue(':telRes', $telRes);
            $query->bindValue(':telCel', $telCel);
            $query->bindValue(':telCom', $telCom);
            $query->bindValue(':telAd', $telAd);
            $query->bindValue(':email', $email);
            $query->bindValue(':endereco', $endereco);
            $query->bindValue(':numero', $numero);
            $query->bindValue(':estado', $estado);
            $query->bindValue(':cidade', $cidade);
            $query->bindValue(':info', $info);
            $query->execute();
            return TRUE;
        } catch (PDOException $ex) {
//            throw $ex();
            return FALSE;
        } finally {
            $query->closeCursor();
        }
    }

    public function getImagem() {
        $res = array();
        $sql = "SELECT url FROM tbImagens";
        try {
            $rows = $this->db->query($sql);
            $res = $rows->fetchAll(PDO::FETCH_ASSOC);
            $r = rand(0, ($rows->rowCount()-1));
            return $res[$r];
        } catch (Exception $ex) {
            echo "Erro:</br>" . $ex->getMessage();
            exit();
        }
    }

}
