<?php

/*
define("HOST", "localhost");
define("DBNAME", "dbphp7");
define("CHARSET", "uft8");
define("USER", "root");
define("PASSWORD", "root");
*/

class DadosSQL extends PDO {

    // Atributos
    private $conn;

    // Método construtor para criar conexão com banco de dados
    public function __construct() {

        $opcoes = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8', PDO::ATTR_PERSISTENT => TRUE);$this->conn = new PDO("mysql:host=localhost;dbname=dbphp7;charset=utf8", "root", "root", $opcoes);
        //$this->conn = new PDO("mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD, $opcoes);

    }

    // Métodos
    private function setParams($statment, $parameters = array()) {

        foreach ($parameters as $key => $value) {
            
            $this->setParam($statment, $key, $value);

        }

    }

    private function setParam($statment, $key, $value) {

        $statment->bindParam($key, $value);

    }

    // Função para executar os comandos
    public function query($rawQuery, $params = array()) { // $rawQuery é o comando SQL

        // Cria o statement que só funciona dentro desse método
        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        // Executa a instrução SQL ($stmt)
        $stmt->execute();

        return $stmt;

    }

    public function select($rawQuery, $params = array()):array {

        // Cria o statement que só funciona dentro desse método
        $stmt = $this->query($rawQuery, $params);

         // PDO::FETCH_ASSOC traz só os dados associativos, sem os índices do array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}

?>