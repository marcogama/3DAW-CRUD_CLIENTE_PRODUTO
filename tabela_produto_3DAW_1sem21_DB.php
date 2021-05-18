<?php

//Criar tabela produto
//ALUNO MARCO ANTONIO RIBEIRO GAMA --- MAT.1810478300006

$servername="localhost";
$username="3daw";
$password="12341234";
$dbname="3DAW_1sem21";

//Estabelecendo conexão

$conn= new mysqli($servername,$username,$password,$dbname);

//Verificando conexão

if($conn->connect_error){
    die("Falha na conexao:".$conn->connect_error);
}

//Criando tabela

$sql="CREATE TABLE PRODUTO (
CODPROD      INT(5) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
NOME        VARCHAR(20) NOTNULL,
DESCRI      VARCHAR(30) NOTNULL,
PREÇO       INTEGER(9) NOTNULL,
QUANT       INT(5) NOTNULL,
PESO        VARCHAR(10) NOTNULL,
)";

if($conn->query($sql)===TRUE){
    echo "Tabela criada com sucesso";
}else{
    echo "Erro ao criar tabela:".$conn->error;
}
$conn->close();
?>