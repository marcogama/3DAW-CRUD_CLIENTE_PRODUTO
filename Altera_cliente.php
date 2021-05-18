<?php

//ALTERAR CLIENTE
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
$NOME_Err=$SNOME_Err=$CPF_Err=$CEP_Err=$END_Err="";
$CPF=$NOME=$SNOME=$CEP=$END=$CIDADE=$ESTADO="";
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
										if (empty($_POST["CEP"])){
													               $CEP_Err="Insira o cep";
										}else{
											 $CEP=$_POST["CEP"];
											 if (!preg_match("[0-9]",$CEP)){
														                         $CEP_Err="CEP deve ter apenas numeros";
											 } 
										}
										if (empty($_POST["END"])){
													               $END_Err="Insira o endereço";
										}else{
											 $END=$_POST["END"]; 
										}
	                                    $CIDADE=$_POST["CIDADE"];
                                        $ESTADO=$_POST["ESTADO"];
}
$sql="UPDATE CLIENTE SET NOME='$NOME',SNOME='$SNOME',CPF='$CPF',CEP='$CEP',
      END='$END',CIDADE='$CIDADE',ESTADO='$ESTADO' WHERE CODCLI='$CODCLI'";
if($conn->query($sql)===TRUE){
    echo "Alterado com sucesso";
}else{
    echo "Erro na alteracao".$conn_error;
}
$conn->close();
?>