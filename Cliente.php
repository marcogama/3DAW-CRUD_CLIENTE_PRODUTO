<?php

//Selecionar cliente
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
$NOME_Err=$CPF_Err=$SNOME_Err="";
$CPF=$NOME=$SNOME="";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
			                            if (empty($_POST["CPF"])){
													                    $CPF_Err="Insira o cpf";
										}else{
											 $CPF=$_POST["CPF"];
											 if (!preg_match("[0-9]-",$CPF)){
														                  $CPF_Err="Insira apenas numeros";
											 } 
										}
										if (empty($_POST["NOME"])){
													             $NOME_Err="Insira o Nome";
										}else{
											 $NOME=$_POST["NOME"];
											 if (!preg_match("[A-Z, ,a-z]",$NOME)){         
                                                                                 $NOME_Err="Nome deve ter apenas letras";
											 } 
										}
										if (empty($_POST["SNOME"])){
													               $SNOME_Err="Insira o sobrenome";
										}else{
											 $SNOME=$_POST["SNOME"];
											 if (!preg_match("[A-Z, ,a-z]",$SNOME)){
														                         $SNOME_Err="Nome deve ter apenas letras";
											 } 
										}
}
$sql="SELECT CPF,NOME,SNOME FROM 3DAW_1sem21 WHERE CPF='$CPF',NOME='$NOME',SNOME='$SNOME'";
$resultado=$conn->query($sql);
if($resultado->num_rows>0){
    while($row=$resultado->fetch_assoc){
        echo "Aluno:".$row["CPF"]."<br>"."Nome:".$row["NOME"]." ".$row["SNOME"]"<br>";
    }
}else{
    echo "Nenhum resultado";
}
$conn->close();
?>