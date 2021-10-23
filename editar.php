<?php
	include('config/bd_conexao.php');

	//Verificando se o parâmetro id foi enviado pelo get
    if(isset($_GET['id_show']))
    {
        //Limpa a query sql
        $id_show = mysqli_real_escape_string($conn, $_GET['id_show']);

        //Monta a query
        $sql = "SELECT * FROM shows WHERE id_show = $id_show";

        //Pega o resultado da query
        $result = mysqli_query($conn, $sql);

        //Busca um único resultado em formato de vetor
        $show = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);
    }
	
	$erros = array('imagem'=>'','cantor_banda'=>'','endereco'=>'','descricao'=>'','capacidade_total'=>'');
	$imagem = $cantor_banda = $endereco = $descricao = $capacidade = '';


	if (isset($_POST['editar']))
	{	
		$id_show = mysqli_real_escape_string($conn, $_POST['id_show']);
		
		//Verificar link da imagem da banda
		if (empty($_POST['imagem'])){
			$erros['imagem'] = 'A imagem é obrigatória';
		} else{
			$imagem = htmlspecialchars($_POST['imagem']);
		}
		
		//Verificar nome da banda/ cantor
		if (empty($_POST['cantor_banda'])){
			$erros['cantor_banda'] = 'O nome da banda/ cantor é obrigatório';
		} else{
			$cantor_banda = htmlspecialchars($_POST['cantor_banda']);
		}
		
		//Verificar local
		if (empty($_POST['endereco'])){
			$erros['endereco'] = 'Endereço válido deve ser informado </br>';
		} else{
			$endereco = htmlspecialchars($_POST['endereco']);
		}
		
				
		//Verificar descricao
		if (empty($_POST['descricao'])){
			$erros['descricao'] = 'A descrição do show deve ser informada </br>';
		} else{
			$descricao = htmlspecialchars($_POST['descricao']);
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
		
		if (!array_filter($erros))
		{
			//Limpando o SQL de códigos suspeitos
			$imagem = mysqli_real_escape_string($conn,$_POST['imagem']);
			$cantor_banda = mysqli_real_escape_string($conn,$_POST['cantor_banda']);
			$endereco =  mysqli_real_escape_string($conn,$_POST['endereco']);
			$descricao =  mysqli_real_escape_string($conn,$_POST['descricao']);
			$capacidade_total =  mysqli_real_escape_string($conn,$_POST['capacidade_total']);
			
			//Query SQL
			$sql = "UPDATE shows SET imagem='$imagem', cantor_banda='$cantor_banda', capacidade_total='$capacidade_total', descricao='$descricao', endereco='$endereco' WHERE id_show='$id_show'";
			
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
		<form class="white" action="editar.php" method="POST" >
			<label>Imagem:</label>
			<input type="text" name="imagem" value="<?php echo $show['imagem'] ?>">
			<div class="red-text"><?php echo $erros['imagem']?></div>

			<label>Banda:</label>
			<input type="text" name="cantor_banda" value="<?php echo $show['cantor_banda'] ?>">
			<div class="red-text"><?php echo $erros['cantor_banda']?></div>		
			
			<label>Endereço:</label>
			<input type="text" name="endereco" value="<?php echo $show['endereco'] ?>">
			<div class="red-text"><?php echo $erros['endereco']?></div>		
			
			<label>Descrição:</label>
			<input type="text" name="descricao" value="<?php echo $show['descricao'] ?>">
			<div class="red-text"><?php echo $erros['descricao']?></div>	

			<label>Capacidade:</label>
			<input type="number" min=1 name="capacidade_total" value="<?php echo $show['capacidade_total'] ?>">
			<div class="red-text"><?php echo $erros['capacidade_total']?></div>	

			
			<div class="center" style="margin-top: 10px;">
				<input type="hidden" name="id_show" value="<?php echo $show['id_show']; ?>">
				<input type="submit" name="editar" value="Confirmar Edição" class="btn brand z-depth-0">
			</div>
		</form>
	</section>
	<?php include('templates/footer.php') ?>

    <input type="text">
</html>

