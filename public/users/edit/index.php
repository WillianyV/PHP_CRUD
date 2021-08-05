<?php 
    require("../../../app/DataBase.php");
    //update
    $_data_base = new Database();
    $_query = "UPDATE users SET name = :name, email = :email, description = :description WHERE id = :id";
    $_binds = ['id' => 1,'name' => 'Veras', 'email' => 'veras@gmail.com', 'description' => 'Oi! Eu sou o Goku!'];
    $_result = $_data_base->update($_query,$_binds );
    if(!$_result){
        die("Falha ao editar");
    }
    
?>
