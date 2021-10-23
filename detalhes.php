<?php
	include('config/bd_conexao.php');
	
	// querry para buscar
	$sql = 'SELECT id_data, data_do_show, valor, quantidade_vendida FROM datas ORDER BY data_do_show';
	
	//resultado como um conjunto de linhas
	$result = mysqli_query($conn, $sql);
	
	// busca a query
	$datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	//limpa memória de $result
	mysqli_free_result($result);
		
	//Remove a pizza do banco de dados
	if(isset($_POST['delete'])){
		//limpando a query
		$id_show = mysqli_real_escape_string($conn, $_POST['id_show']);
		
		//montando a query
		$sql = "DELETE FROM shows WHERE id_show = $id_show";
		
		//removendo do banco
		if(mysqli_query($conn, $sql)){
			//sucesso
			header('Location: index.php');			
		}else{
			echo 'query error'.mysqli_error($conn);
		}
	}
	

	
	//Verificando se o parametro id foi enviado pelo get
	if(isset($_GET['id_show'])){
		//limpa a query sql
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

	if(isset($_POST['deleteData'])){
		//limpando a query
		$id_data = mysqli_real_escape_string($conn, $_POST['id_data']);
		$id_show = mysqli_real_escape_string($conn, $_POST['id_show']);
		
		//montando a query
		$sql = "DELETE FROM datas WHERE id_data = $id_data";
		
		//removendo do banco
		if(mysqli_query($conn, $sql)){
			//sucesso
			header('Location: detalhes.php?id_show='.$id_show);			
		}else{
			echo 'query error'.mysqli_error($conn);
		}
	}

?>


<!DOCTYPE html>
<html lang="pt-br">
    <?php include('templates/header2.php'); ?>
        <div class="container row">
		<?php if($show): ?>
            <div class="col s12">
				<div class="card" style="display: flex">
                    <div class="card-image z-depth-0">
                        <img src="./imagens/<?php echo htmlspecialchars($show['imagem']);?>.png" alt="<?php echo htmlspecialchars($show['id_show']);?>"/>
                    </div>
                    <div class="card-content">
						<p><span style="font-weight: bold;">Cantor/Banda: </span><?php echo htmlspecialchars($show['cantor_banda']);?></p>
						<p><span style="font-weight: bold;">Descrição: </span><?php echo htmlspecialchars($show['descricao']);?></p>
						<p><span style="font-weight: bold;">Local: </span> <?php echo htmlspecialchars($show['endereco']);?></p>
						
						<!-- Formulário de Edição -->
						<div class="center" style="margin-top: 40px;">
							<a class="brand-text" href="editar.php?id_show=<?php echo $show['id_show'] ?>">
								<input type="submit" name="editar" value="Editar" class="btn brand z-depth-0">
							</a>
						</div>

						<!-- Formulário de remoção -->
						<form class="center" action="detalhes.php" method="POST">
							<input type="hidden" name="id_show" value="<?php echo $show['id_show']; ?>">
							<input type="submit" name="delete" value="Remover" class="btn brand z-depth-0">
						</form>
			
						<div class="center" style="margin-top: 20px;">
							<a class="brand-text" href="cadastrarDatas.php?id_show=<?php echo $show['id_show'] ?>">
								<input type="submit" name="cadastrarDatas" value="Cadastrar Datas" class="btn brand z-depth-0">
							</a>
						</div>
					</div>
				</div>
            </div> 
			
			

		<?php else: ?>
			<h5>Shopw não encontrado.</h5>
		<?php endif ?>	

		<?php if($datas){?>
			<h4 class="center">Datas disponíveis</h4>
			
		<?php }
		else{?>
			<h4 class="center">Nenhuma data disponível.</h4>
		<?php }?>
		<div calss="containter">
			<div class="row center" style="margin-top: 2%">
				<?php foreach ($datas as $data) {
					$quantidade_vendida = $data['quantidade_vendida'];
					$quatidade_disponivel = $show['capacidade_total'] - $quantidade_vendida;?>
					<div class="col s12 m4">
						<div class="card">
							<div class="card-content">
								<p><span style="font-weight: bold;">Data: </span><?php echo htmlspecialchars($data['data_do_show']);?></p>
								<p><span style="font-weight: bold;">Valor: </span> R$<?php echo htmlspecialchars($data['valor']);?></p>
								<p><span style="font-weight: bold;">Quantidade disponivel: </span><?php echo htmlspecialchars($quatidade_disponivel);?></p>
							</div>
							
							<div class="card-action center">
								<a href="editarData.php?id_data=<?php echo $data['id_data']?>">Editar</a>
								<a href="venda.php?id_data=<?php echo $data['id_data']?>">Comprar Ingresso</a>
							</div>
						</div>
					</div>
				<?php } ?>
			
			</div>
		</div>
    <?php include('templates/footer.php')?>


</html>