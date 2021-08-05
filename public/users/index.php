<?php
    require("../../app/DataBase.php");
    $_data_base = new Database();
    // com filtro
    $_query = "SELECT * FROM users WHERE id > :id";
    $_binds = ['id' => 0];
    $_results = $_data_base->select($_query,$_binds );
    if(!$_results){
        die("Falha no cadastro");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema crud</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <main>
        <div class="crud">
            <h3>Lista de usuários</h3>
            <a href="create/index.php"> + Cadastrar novo usuario</a>
            <div class="result">
                <?php
                    if($_results->rowCount() > 0){
                        $_dados = $_results->fetchAll();
                        foreach ($_dados as $_dado){
                ?>
                        <ul>
                            <li><?php  echo "Nome: {$_dado['name']}" ?></li>
                            <li><?php  echo "E-mail: {$_dado['email']}" ?></li>
                            <li><?php echo "Descrição: {$_dado['description']}" ?></li> 
                            <li><a href="edit/index.php?id=<?php echo $_dado['id'] ?>">Editar</a></li>
                            <li><a href="delete/index.php?id=<?php echo $_dado['id'] ?>">Excluir</a></li>                
                        </ul>
                <?php
                        }                
                    }else{
                        echo "Não existe usuários cadastrados <br/>";
                    }
                ?> 
            </div>                     
        </div>
        
    </main>
</body>
</html>