<?php
	include('config/bd_conexao.php');
	
	if(isset($_GET['id_data']))
    {
		//Limpa a query sql
        $id_data = mysqli_real_escape_string($conn, $_GET['id_data']);
    }
	
	// querry para buscar
	$sql = "SELECT quantidade_vendida FROM datas WHERE id_data='$id_data'";
	
	//resultado como um conjunto de linhas
	$result = mysqli_query($conn, $sql);
	
	// busca a query
	$datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	//limpa memória de $result
	mysqli_free_result($result);
	
	$erros = array('ingressoInteiro'=>'','ingressoMeia'=>'');
	$ingressoInteiro = $ingressoMeia = '';

	// if (isset($_POST['enviar'])){

	// 	if (empty($_POST['ingressoInteiro'])){
	// 		$erros['ingressoInteiro'] = 'A quantidade de ingressos é obrigatória';
	// 	} else{
	// 		$ingressoInteiro = htmlspecialchars($_POST['ingressoInteiro']);
	// 	}
		
	// 	if (empty($_POST['ingressoMeia'])){
	// 		$erros['ingressoMeia'] = 'A quantidade de ingressos é obrigatória';
	// 	} else{
	// 		$ingressoMeia = htmlspecialchars($_POST['ingressoMeia']);
	// 	}
				
	// 	if (!array_filter($erros))
    //     {
	// 		foreach($datas as $data){
	// 			$quantidade_vendida = $data['quantidade_vendida'];
	// 		}		
	// 		$ingressoInteiro = mysqli_real_escape_string($conn,$_POST['ingressoInteiro']);
	// 		$ingressoMeia = mysqli_real_escape_string($conn,$_POST['ingressoMeia']);
	// 		$quantidade_vendida += $ingressoInteiro + $ingressoMeia;

	// 		//Query SQL
	// 		$sql = "UPDATE datas SET quantidade_vendida='$quantidade_vendida' WHERE id_data='$id_data'";
			
	// 		//Salva no banco de dados
	// 		if (mysqli_query($conn, $sql)){
	// 			//sucesso
	// 			header('Location: venda.php?ingressoInteiro='.$ingressoInteiro.'&ingressoMeia='.$ingressoMeia);
	// 		} else {
	// 			echo 'Erro na query: '.mysqli_error($conn);
	// 		}
	// 	}
	// }

?>

<!DOCTYPE html>
<html>
	<?php include('templates/header2.php');	
		foreach($datas as $data){
			$quantidade_vendida = $data['quantidade_vendida'];
		}
	?>
	<section class="container grey-text">
		<h4 class="center">Nova Data</h4>
		<form class="white" action="confirmacao.php" method="POST" >

			<label>Quantidade de ingresso inteiro: </label>
			<input type="number" min=0 name="ingressoInteiro" value="<?php echo $ingressoInteiro ?>">
			<div class="red-text"><?php echo $erros['ingressoInteiro']?></div>		

			<label>Quantidade de ingresso meia: </label>
			<input type="number" min=0 name="ingressoMeia" value="<?php echo $ingressoMeia ?>">
			<div class="red-text"><?php echo $erros['ingressoMeia']?></div>		

			<div class="center" style="margin-top: 10px;">
				<input type="hidden" name="id_data" value="<?php echo $id_data; ?>">
				<input type="submit" name="enviar" value="Enviar" class="btn brand z-depth-0">
			</div>
		</form>
	</section>
	<?php include('templates/footer.php') ?>
</html>

