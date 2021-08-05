<?php 
    require("../../../app/DataBase.php");
    //update
    $_data_base = new Database();
    $_query = "DELETE FROM users WHERE id = :id";
    $_binds = ['id' => 1];
    $_result = $_data_base->delete($_query,$_binds );
    if(!$_result){
        die("Falha no delete");
    }
    
?>
