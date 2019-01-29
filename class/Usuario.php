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

        if (isset($results)) {

            $row = $results[0];

            $this->setId($row['id']);
            $this->setLogin($row['login']);
            $this->setSenha($row['senha']);
            $this->setDataCadastro(new DateTime($row['data_cadastro']));

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

}

?>