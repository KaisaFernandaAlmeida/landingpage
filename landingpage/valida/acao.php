<?php
    include('../include/conecte.php');
    session_start();
    
    $id    			= isset($_POST["id"])   		   ? $_POST["id"]   		   : 0;
	$acao  			= isset($_REQUEST["acao"]) 		   ? $_REQUEST["acao"] 		   : "";
	
	/*
	echo "Ação: ". $acao . "<br/>";
	echo "ID:   ". $id;
	exit; */
 
	$nome           = isset($_POST["nome"])            ? $_POST["nome"] 		   : "";
	$sexo           = isset($_POST["sexo"]) 		   ? $_POST["sexo"] 		   : "";
	$idade          = isset($_POST["idade"]) 		   ? $_POST["idade"] 		   : 0;
	$hobby          = isset($_POST["hobby"]) 		   ? $_POST["hobby"] 		   : "";
	$datanascimento = isset($_POST["datanascimento"])  ? $_POST["datanascimento"]  : "";
    $email          = isset($_POST["email"])           ? $_POST["email"] 		   : "";
	$senha          = isset($_POST["senha"])           ? $_POST["senha"] 		   : "";
	$tpusuario      = isset($_POST["tpusuario"])       ? $_POST["tpusuario"] 	   : "";
	$dtnascimento   = isset($dtnascimento)  		   ? $dtnascimento   		   : "";
	
	
    $consulta_cadastro = $PDO->query("SELECT * FROM desenvolvedores WHERE email like '" .$email."'" );
    $row               = $consulta_cadastro->fetch(PDO::FETCH_ASSOC);
    $registros         = $consulta_cadastro->rowCount();
		
    // LOGIN
    if($acao == "login"){
		if($registros >= 1 && $email != ""){

			if($row['senha'] == $senha){
				$_SESSION['login']   = $email;
				$_SESSION['senha']   = $senha;
				echo '<script> alert ("Login efetuado com sucesso!"); location.href=("../index.php")</script>';
			  
			}else{
				unset ($_SESSION['login']);
				unset ($_SESSION['senha']);
				echo '<script> alert ("Senha incorreta!"); location.href=("../index.php")</script>';  
			}

		}else{
			unset ($_SESSION['login']);
			unset ($_SESSION['senha']);
			echo '<script> alert ("Usuário não cadastrado!"); location.href=("../index.php")</script>'; 
		} 
    } 


    if(($id == 0 || $id == "") && ($acao != 'excluir')){ //INSERIR
		
		$dtnascimento =  explode("/",$datanascimento);
		$dtbanco      = $dtnascimento[2]."-".$dtnascimento[1]."-".$dtnascimento[0]; 

		  if($registros >= 1){
			echo '<script> alert ("Usuário já cadastrado!"); location.href=("../index.php")</script>';

		  }else{
		 
			$sql = $PDO->query("INSERT into desenvolvedores (nome, sexo, idade, hobby, datanascimento, email, senha, tpusuario)
								values('".$nome."',
									   '".$sexo."',
									   '".$idade."',
									   '".$hobby."',
									   '".$dtbanco."',
									   '".$email."',
									   '".$senha."',
									   '2')");

			if($sql){
			 echo '<script> alert ("Usuário cadastrado com sucesso!"); location.href=("../index.php")</script>'; 
					
			}else{
				echo '<script> alert ("Erro ao gravar usuário"); location.href=("../index.php?id=0&acao=inserir")</script>';
			}
		  }  
 
 
    } else if(($id != "") && ($acao == "editar")){ //ALTERAR
		
		$dtnascimento =  explode("/",$datanascimento);
		$dtbanco      = $dtnascimento[2]."-".$dtnascimento[1]."-".$dtnascimento[0]; 

        $sql = $PDO->query("UPDATE desenvolvedores set 
                                  nome = '".$nome."', 
								  sexo = '".$sexo."', 
								  idade = '".$idade."', 
								  hobby = '".$hobby."', 
								  datanascimento = '".$dtbanco."', 
                                  email = '".$email."', 
                                  senha = '".$senha."',
								  tpusuario = '".$tpusuario."'
                                  WHERE id = ". $id); 
			
        if($sql){
            echo '<script> alert ("Usuário alterado com sucesso!"); location.href=("../index.php")</script>';
        }else{
            echo '<script> alert ("Erro ao alterar usuário"); location.href=("../index.php?id=0&acao=alterar")</script>';
        }


    } else if($acao == "excluir"){ //EXCLUIR
	
		$stmt = $PDO->prepare('DELETE FROM desenvolvedores WHERE id = '. $_GET['id']);
        //$stmt->bindParam(':id', $id); 
        $res  = $stmt->execute();

        if($res){
            echo '<script> alert ("Usuário excluído com sucesso!"); location.href=("../index.php")</script>';
        }else{
            echo '<script> alert ("Erro ao excluir usu&aacute;rio"); location.href=("../index.php?id=0&acao=alterar")</script>';
        }
    }
