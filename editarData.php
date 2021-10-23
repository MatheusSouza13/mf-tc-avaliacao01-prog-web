<?php
	include('config/bd_conexao.php');
	
	if(isset($_GET['id_show']))
    {
        //Limpa a query sql
        $id_show = mysqli_real_escape_string($conn, $_GET['id_show']);
    }

	//Verificando se o parâmetro id foi enviado pelo get
    if(isset($_GET['id_data']))
    {
        //Limpa a query sql
        $id_data = mysqli_real_escape_string($conn, $_GET['id_data']);

        //Monta a query
        $sql = "SELECT * FROM datas WHERE id_data = $id_data";

        //Pega o resultado da query
        $result = mysqli_query($conn, $sql);

        //Busca um único resultado em formato de vetor
        $data = mysqli_fetch_assoc($result);

        mysqli_free_result($result);
        mysqli_close($conn);
    }
	
	$erros = array('data_do_show'=>'','valor'=>'');
	$data_do_show = $valor = '';

	if (isset($_POST['editar'])){

		$id_data = mysqli_real_escape_string($conn, $_POST['id_data']);

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
			$id_show = $_POST['id_show'];

			//Query SQL
			$sql = "UPDATE datas SET data_do_show='$data_do_show', valor='$valor' WHERE id_data='$id_data'";

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
	<?php include('templates/header2.php'); ?>
	<section class="container grey-text">
		<h4 class="center">Editar Data</h4>
		<form class="white" action="editarData.php" method="POST" >
			<label>Data:</label>
			<input type="datetime-local" name="data_do_show" value="<?php echo date('Y-m-d\TH:i', strtotime($data['data_do_show'])); ?>">
			<div class="red-text"><?php echo $erros['data_do_show']?></div>

			<label>Valor:</label>
			<input type="number" step="0.01" min=0 name="valor" value="<?php echo $data['valor'] ?>">
			<div class="red-text"><?php echo $erros['valor']?></div>		

			<div class="center" style="margin-top: 10px;">
				<input type="hidden" name="id_data" value="<?php echo $data['id_data']; ?>">
				<input type="hidden" name="id_show" value="<?php echo $data['id_show']; ?>">
				<input type="submit" name="editar" value="Confirmar Edição" class="btn brand z-depth-0">
			</div>
		</form>

		<form class="center" action="detalhes.php" method="POST">
			<input type="hidden" name="id_data" value="<?php echo $data['id_data']; ?>">
			<input type="hidden" name="id_show" value="<?php echo $data['id_show']; ?>">
			<input type="submit" name="deleteData" value="Remover" class="btn brand z-depth-0">
		</form>
	</section>
	<?php include('templates/footer.php') ?>

    <input type="text">
</html>