<?php

class Usuario {

    // Atributos privados
    private $id;
    private $login;
    private $senha;
    private $dataCadastro;

    // Métodos especiais de acesso
    public function getId() {

        return $this->id;

    }

    public function setId($value) {

        $this->id = $value;

    }

    public function getlogin() {

        return $this->login;

    }

    public function setLogin($value) {

        $this->login = $value;

    }

    public function getSenha() {

        return $this->senha;

    }

    public function setSenha($value) {

        $this->senha = $value;

    }

    public function getDataCadastro() {

        return $this->dataCadastro;

    }

    public function setDataCadastro($value) {

        $this->dataCadastro = $value;

    }

    // Métodos
    public function loadById($id) {

        $sql = new DadosSQL();

        $results = $sql->select("SELECT * FROM usuarios WHERE id = ?", array(
            "1" => $id
        ));

        if (count($results) > 0) {

            $row = $results[0];

            $this->setId($row['id']);
            $this->setLogin($row['login']);
            $this->setSenha($row['senha']);
            $this->setDataCadastro(new DateTime($row['data_cadastro']));

        } else {

            return "Não foi possível encontrar o usuário!";

        }

    }

    public function __toString() {

        return json_encode(array(
            "id" => $this->getId(),
            "login" => $this->getLogin(),
            "senha" => $this->getSenha(),
            "dataCadastro" => $this->getDataCadastro()->format("d/m/Y H:i:s")
        ));

    }

    public function atualizar($login, $senha, $id) {

        $sql = new DadosSQL();

        $result = $sql->select("UPDATE usuarios SET login = ?, senha = ? WHERE id = ?", array(
            "1" => $login,
            "2" => $senha,
            "3" => $id
        ));

        if (count($result) > 0) {

            $this->setLogin($login);
            $this->setSenha($senha);
        
        } else {

            return "Usuário inexistente!";

        }

    }

    public function excluir($id) {

        $sql = new DadosSQL();

        $result = $sql->select("DELETE FROM usuarios WHERE id = ?", array(
            "1" => $id
        ));

        if (count($result) > 0) {

            return "Usuário excluído!";

        } else {

            return "Usuário inexistente!";

        }

    }

}

?>