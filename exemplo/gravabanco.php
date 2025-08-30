<?php
    $cpf="12345";
    $nome="Robertissom";
    $idade=34;
    $cidade="salvador";
    try{
        $conecta=new PDO("mysql:host=127.0.0.1;port=3306;dbname=escola","root","123456");
        $conecta->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $texto="INSERT INTO alunos(cpf,nome,idade,cidade) VALUES ('".$cpf."','".$nome."','".$idade."','".$cidade."')";
        $conecta->exec($texto);
        echo "<h1>Dados gravados com sucesso</h1>";
    }
    catch(PDOException $erro){
        echo "Falha de conexão";
    }
?>