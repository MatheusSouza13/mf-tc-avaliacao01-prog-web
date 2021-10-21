<?php
	include('config/bd_conexao.php');
	
	$erros = array('imagem'=>'','cantor_banda'=>'','endereco'=>'','descricao'=>'','capacidade_total'=>'');
	$imagem = $cantor_banda = $endereco = $descricao = $capacidade = '';
	
	if (isset($_POST['enviar'])){		
		//Verificar link da imagem da banda
		if (empty($_POST['imagem'])){
			$erros['imagem'] = 'A imagem é obrigatória';
		} else{
			$imagem = $_POST['imagem'];
			if (!filter_var($imagem, FILTER_VALIDATE_URL)){
				$erros['imagem'] = 'Insira um link válido';
				$imagem = '';
			}
		}
		
		//Verificar nome da banda/ cantor
		if (empty($_POST['cantor_banda'])){
			$erros['cantor_banda'] = 'O nome da banda/ cantor é obrigatório';
		} else{
			$cantor_banda = $_POST['cantor_banda'];
			if (!preg_match('/^([a-zA-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ\s]+)(,\s*[a-zA-ZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ\s]*)*$/',$cantor_banda)){
				$erros['cantor_banda'] = 'O nome da banda/ cantor deve conter somente letras';			
				$cantor_banda = '';
			}
		}
		
		//Verificar local
		if (empty($_POST['endereco'])){
			$erros['endereco'] = 'Endereço válido deve ser informado </br>';
		} else{
			$endereco = $_POST['endereco'];
			if (!preg_match('/^([a-zA-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ\s]+)(,\s*[a-zA-ZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ\s]*)*$/',$endereco)){
				$erros['endereco'] = 'O endereço deve conter somente letras e separados por vírgula';			
				$endereco = '';
			}
		}
		
				
		//Verificar descricao
		if (empty($_POST['descricao'])){
			$erros['descricao'] = 'A descrição do show deve ser informada </br>';
		} else{
			$descricao = $_POST['descricao'];
			if (!preg_match('/^([a-zA-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ\s]+)(,\s*[a-zA-ZzáàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ\s]*)*$/',$descricao)){
				$erros['descricao'] = 'A descrição deve conter somente letras e separados por vírgula';			
				$descricao = '';
			}
		}

				
		//Verificar capacidade_total
		if (empty($_POST['capacidade_total'])){
			$erros['capacidade_total'] = 'A capacidade do local deve ser informada </br>';
		} else{
			$capacidade_total = $_POST['capacidade_total'];
			if (!filter_var($capacidade_total, FILTER_VALIDATE_INT)){
				$erros['capacidade_total'] = 'Informe um número válido';
				$capacidade_total = '';
			}
		}
		
		if (array_filter($erros)){
			//echo "Erro no formulário.";
		}else{
			//echo "Formulário válido";
			//Limpando o SQL de códigos suspeitos
			$imagem = mysqli_real_escape_string($conn,$_POST['imagem']);
			$cantor_banda = mysqli_real_escape_string($conn,$_POST['cantor_banda']);
			$endereco =  mysqli_real_escape_string($conn,$_POST['endereco']);
			$descricao =  mysqli_real_escape_string($conn,$_POST['descricao']);
			$capacidade_total =  mysqli_real_escape_string($conn,$_POST['capacidade_total']);
			
			//Query SQL
			$sql = "INSERT INTO shows(imagem,cantor_banda,capacidade_total,descricao,endereco) VALUES('$imagem','$cantor_banda','$capacidade_total','$descricao','$endereco')";
			
			//Salva no banco de dados
			if (mysqli_query($conn, $sql)){
				//sucesso
				header('Location: index.php');
			} else {
				echo 'Erro na query: '.mysqli_error($conn);
			}
		}
	}

?>

<!DOCTYPE html>
<html>
	<?php include('templates/header2.php') ?>
	<section class="container grey-text">
		<h4 class="center">Novo Show</h4>
		<form class="white" action="cadastro.php" method="POST" >
			<label>Imagem:</label>
			<input type="url" name="imagem" value="<?php echo $imagem ?>">
			<div class="red-text"><?php echo $erros['imagem']?></div>

			<label>Banda:</label>
			<input type="text" name="cantor_banda" value="<?php echo $cantor_banda ?>">
			<div class="red-text"><?php echo $erros['cantor_banda']?></div>		
			
			<label>Endereço:</label>
			<input type="text" name="endereco" value="<?php echo $endereco ?>">
			<div class="red-text"><?php echo $erros['endereco']?></div>		
			
			<label>Descrição:</label>
			<input type="text" name="descricao" value="<?php echo $descricao ?>">
			<div class="red-text"><?php echo $erros['descricao']?></div>	

			<label>Capacidade:</label>
			<input type="number" name="capacidade_total" value="<?php echo $capacidade_total ?>">
			<div class="red-text"><?php echo $erros['capacidade_total']?></div>	

			
			<div class="center" style="margin-top: 10px;">
				<input type="submit" name="enviar" value="Enviar" class="btn brand z-depth-0">
			</div>
		</form>
	</section>
	<?php include('templates/footer.php') ?>

    <input type="text">
</html>

