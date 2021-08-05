<?php 
    require("../../../app/DataBase.php");
    $_name = filter_input(INPUT_POST,'name', FILTER_SANITIZE_STRING);
    $_email = filter_input(INPUT_POST,'email', FILTER_VALIDATE_EMAIL);
    $_description = filter_input(INPUT_POST,'description', FILTER_SANITIZE_SPECIAL_CHARS);

    if(!empty($_name) && !empty($_email) && !empty($_description)){        
        $_data_base = new Database();
        $_query = "INSERT INTO users SET name = :name, email = :email, description = :description ";
        $_binds = ['name' => $_name, 'email' => $_email, 'description' => $_description];
        $_result = $_data_base->insert($_query,$_binds );
        if(!$_result){
            die("Falha no cadastro");
        }else{
            header("location:../");
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema crud</title>
    <link rel="stylesheet" href="../../css/style.css">
    
</head>
<body>
    <main>
        <div class="crud">
            <h3>Sistema de cadastro</h3>
            <form action="" method="POST"> 
                <input type="text" name="name" placeholder="Seu nome">
                <input type="email" name="email" placeholder="Digite o seu e-mail">
                <textarea name="description" cols="30" rows="10">Descreva-se</textarea>
                <button type="submit">Cadastrar</button>
            </form>            
        </div>
        
    </main>
</body>
</html>