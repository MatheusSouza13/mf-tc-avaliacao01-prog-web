<?php 

	//include('config/bd_conexao.php');
	//
    //$erros = array('email' => '','nomePizza' => '','ingredientes'=>'');
    //$email = $nomePizza = $ingredientes = '';
	//$erros = array('email' => '', 'nomePizza' => '', 'ingredientes' => '');
   //
	//if(isset($_POST['editar'])){
	//	//Limpa os dados de sql injection
	//	$id = mysqli_real_escape_string($conn,$_POST['id']);
	//	
	//	//Monta a query
	//	$sql = "SELECT * FROM pizza WHERE id = $id;";
	//	
	//	//Executa a query e guarda em $result
	//	$result = mysqli_query($conn,$sql);
	//	
	//	//Busca o resultado em forma de vetor
	//	$pizza = mysqli_fetch_assoc($result);
	//	
	//	$nomePizza = $pizza['nomePizza'];
	//	$email = $pizza['email'];
	//	$ingredientes = $pizza['ingredientes'];		
	//	
	//	mysqli_free_result($result);
	//	
	//	mysqli_close($conn);	
	//}		
	//
	//if(isset($_POST['enviar'])){
	//	
	//	// Campo email
	//	if(empty($_POST['email'])){
	//		$erros['email']= 'O e-mail é obrigatório';
	//	} else{
	//		$email = $_POST['email'];
	//		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	//			$erros['email']= 'Insira um e-mail válido ';
	//			$email = '';
	//		}
	//	}		
	//	// Campo nomePizza
	//	if(empty($_POST['nomePizza'])){
	//		$erros['nomePizza'] = 'É necessário dar um nome para a pizza';
	//	} else{
	//		$nomePizza = $_POST['nomePizza'];
	//		if (!preg_match('/^[a-zA-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ\s]+$/',$nomePizza)){
	//			$erros['nomePizza'] = 'O nome deve conter somente letras e espaços';		
	//			$nomePizza = '';
	//		}
	//	}
	//	// Campo ingredientes
	//	if(empty($_POST['ingredientes'])){
	//		$erros['ingredientes'] = 'Deve conter ao menos um ingrediente';
	//	} else{
	//		$ingredientes = $_POST['ingredientes'];
	//		if (!preg_match('/^([a-zA-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ\s]+)(,\s*[a-zA-ZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ\s]*)*$/',$ingredientes)){
	//			$erros['ingredientes'] = 'Os ingredientes deve conter somente letras e separados por vírgula';		
	//			$ingredientes = '';
	//		}
	//	}
	//	
	//	if(array_filter($erros)){			
	//		//echo 'Erro no formulário';
	//	} else {
	//		//echo 'Formulário Válido';
	//		//Inserir no banco de dados
	//		//Limpando o conteúdo de códigos suspeitos
	//		$id = mysqli_real_escape_string($conn,$_POST['id']);
	//		$email = mysqli_real_escape_string($conn,$_POST['email']);
	//		$nomePizza = mysqli_real_escape_string($conn,$_POST['nomePizza']);
	//		$ingredientes = mysqli_real_escape_string($conn,$_POST['ingredientes']);
	//		
	//		//Criando a query
	//		$sql = "UPDATE pizza SET nomePizza = '$nomePizza', email = '$email', 
	//				ingredientes = '$ingredientes' WHERE id = $id;";
	//				
	//		//Salva no banco de dados
	//		if (mysqli_query($conn,$sql)){
	//			//Sucesso
	//			header('Location: index.php');
	//		} else {
	//			echo 'Query error: '.mysqli_error($conn);
	//		}
	//	}
	//} 
	
?>

<!-- <!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Alterar Pizza</h4>
		<form class="white" action="alterar.php" method="POST">
			<input type="hidden" name="id" value="<?php echo $id ?>">
			<label>E-mail</label>
			<input type="text" name="email" value="<?php echo $email ?>">
			<div class="red-text"><?php echo $erros['email'].'</br>'; ?>
			<label>Nome da Pizza</label>
			<input type="text" name="nomePizza" value="<?php echo $nomePizza ?>">
			<div class="red-text"><?php echo $erros['nomePizza'].'</br>'; ?>
			<label>Ingredientes (separado por vírgula)</label>
			<input type="text" name="ingredientes" value="<?php echo $ingredientes ?>">
			<div class="red-text"><?php echo $erros['ingredientes'].'</br>'; ?>
			<div class="center" style="margin-top: 10px;">
				<input type="submit" name="enviar" value="Enviar" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html> -->