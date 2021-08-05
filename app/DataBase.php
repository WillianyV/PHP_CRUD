<?php

class Database{
    private $_PDO;

    public function __construct($_db_name = 'cadastro')
    {
        try {
            $this->_PDO = new PDO("mysql:dbname=$_db_name;host=localhost","root", "");
        } catch (PDOException $e) {
            die("Erro ao conectar com o Banco de Dados! <br/> 
                 Erro: <b>{$e->getMessage()}</b>");
        }
    }
    

    public function insert($_query, array $_binds)
    {
        $_data_base = new Database();
        $_stmt = $_data_base->select($_query,$_binds);        
        if($_stmt->rowCount() > 0){
            return true;
        }
        return false;
    }

    public function select($_query, array $_binds)
    {
        $_stmt = $this->_PDO->prepare($_query);
        foreach($_binds as $_key => $_value){
            $_stmt->bindValue($_key, $_value);    
        }
        $_stmt->execute();
        return $_stmt;
    }

    public function update($_query, array $_binds)
    {
        $_data_base = new Database();
        $_stmt = $_data_base->select($_query,$_binds);  
        return $_stmt->rowCount();
    }

    public function delete($_query, array $_binds)
    {
        $_data_base = new Database();
        $_stmt = $_data_base->select($_query,$_binds);  
        return $_stmt->rowCount();
    }
}