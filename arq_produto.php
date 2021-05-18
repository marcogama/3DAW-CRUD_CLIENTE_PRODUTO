<?php

     
    /*  Inserir produto
    	MARCO ANTONIO RIBEIRO GAMA
        MAT. 1810478300006
	*/
			
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
	if($_SERVER["REQUEST METHOD"]=="POST"){
                                        $produto=array("","","","","");
	                                    $arq=fopen("$_POST["arquivo"]","r")or die("Nao foi possivel abrir o arquivo!");
	                                    fgets($arq);
	                                    while(!feof($arq)){
		                                                $arq_aux=fgets($arq);
				                                        $i=0;
				                                        $j=0;
	                                                    while($arq_aux[$i]!='\0'){
								                                       $c[$i]=$arq_aux[$i];
								                                       if($arq_aux[$i+1]==';'){
								                                                      $produto[$j]=$c;
								                                                      $i++;
								                                                      $j++;
								                                                      $c="";
								                                       }
								                                       if($i+1==$conta){
								                                                      $produto[$j]=$c;
								                                       }
								                                       $i++;
	                                                    }
				                                        $NOME=$produto[0];
														$DESCR=$produto[1];
				                                        $PRECO=$produto[2];
				                                        $QUANT=$produto[3];
				                                        $PESO=$produto[4];
				                                        $sql="INSERT INTO PRODUTO(NOME,DESCR,PRECO,QUANT,PESO)
                                                             VALUES("$NOME.",".$DESCR.",".$PRECO.",".$QUANT.",".$PESO")";
                                                        if($conn->query(sql)===TRUE){
                                                                                  echo "Registro inserido com sucesso";
                                                        }else{
                                                             echo "Erro de registro";
                                                        }
				                                        $arq_aux="";
	                                    }
	                                    fclose($arq);
	}
	$conn->close();
?>