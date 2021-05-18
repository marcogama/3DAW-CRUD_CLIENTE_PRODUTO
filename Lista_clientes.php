<?php

//LISTAR CLIENTES
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
$sql="SELECT CODCLI,NOME,CPF FROM CLIENTE";
$resultado=$conn->query($sql);
if($resultado->num_rows>0){
    while($row=$resultado->fetch_assoc){
        echo "Cliente:".$row["CODCLI"]."-Nome:".$row["NOME"]."-CPF:".$row["CPF"]."<br>";
    }
}else{
    echo "Nenhum resultado";
}
$conn->close();
?>