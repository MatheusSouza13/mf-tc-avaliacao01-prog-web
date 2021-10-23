<?php
	include('config/bd_conexao.php');
	
	if(isset($_GET['id_show']))
    {
        //Limpa a query sql
        $id_show = mysqli_real_escape_string($conn, $_GET['id_show']);
    }
	
	$erros = array('data_do_show'=>'','valor'=>'');
	$data_do_show = $valor = '';

	if (isset($_POST['enviar'])){
		//Verificar link da imagem da banda
		if (empty($_POST['data_do_show'])){
			$erros['data_do_show'] = 'A data é obrigatória';
		} else{
			$data_do_show = htmlspecialchars($_POST['data_do_show']);
		}
		
		//Verificar nome da banda/ cantor
		if (empty($_POST['valor'])){
			$erros['valor'] = 'O valor é obrigatório';
		} else{
			$valor = htmlspecialchars($_POST['valor']);
		}
				
		if (!array_filter($erros))
        {
			//Limpando o SQL de códigos suspeitos
			$data_do_show = mysqli_real_escape_string($conn,$_POST['data_do_show']);
			$valor = mysqli_real_escape_string($conn,$_POST['valor']);
			$id_show = mysqli_real_escape_string($conn,$_POST['id_show']);
			$quantidade_vendida = 0;

			//Query SQL
			$sql = "INSERT INTO datas(id_show, data_do_show, valor, quantidade_vendida) VALUES('$id_show','$data_do_show','$valor', '$quantidade_vendida')";
			
			//Salva no banco de dados
			if (mysqli_query($conn, $sql)){
				//sucesso
				header('Location: detalhes.php?id_show='.$id_show);
			} else {
				echo 'Erro na query: '.mysqli_error($conn);
			}
		}
	}

?>

<!DOCTYPE html>
<html>
	<?php include('templates/header2.php');	?>
	<section class="container grey-text">
		<h4 class="center">Nova Data</h4>
		<form class="white" action="cadastrarDatas.php" method="POST" >
			<label>Data:</label>
			<input type="datetime-local" name="data_do_show" value="<?php echo $data_do_show ?>">
			<div class="red-text"><?php echo $erros['data_do_show']?></div>

			<label>Valor:</label>
			<input type="number" step="0.01" min=0 name="valor" value="<?php echo $valor ?>">
			<div class="red-text"><?php echo $erros['valor']?></div>		

			<div class="center" style="margin-top: 10px;">
				<input type="hidden" name="id_show" value="<?php echo $id_show; ?>">
				<input type="submit" name="enviar" value="Enviar" class="btn brand z-depth-0">
			</div>
		</form>
	</section>
	<?php include('templates/footer.php') ?>

    <input type="text">
</html>

