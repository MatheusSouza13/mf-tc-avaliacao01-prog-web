<?php

	include('config/bd_conexao.php');
	
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
			echo 'query error'.m,ysqli_error($conn);
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
	

?>


<!DOCTYPE html>
<html lang="pt-br">
    <?php include('templates/header2.php')?>

    <div calss="containter justify">
        <div class="row">
		<?php if($show): ?>
            <div class="col s12 card large">
                    <div class="card-image z-depth-0">
                        <img src="<?php echo htmlspecialchars($show['imagem']);?>" alt="<?php echo htmlspecialchars($show['id_show']);?>"/>
                        <span class="card-title bold"><?php echo htmlspecialchars($show['cantor_banda']);?></span>
                    </div>
                    <div class="card-content">
                        <p><?php echo htmlspecialchars($show['descricao']);?></p>
                        <p>Local: <?php echo htmlspecialchars($show['endereco']);?></p>
						<p>Capacidade: <?php echo htmlspecialchars($show['capacidade_total']);?></p>
                    </div>
                    <!-- <div class="card-action center">
                        <a href="editar.php?id_show=<?php echo $shows['id_show']?>">Editar</a>
						<a href="#">Remover</a>
						<a href="#">Datas/ Horários/ Valores</a>
                    </div> -->
            </div> 
			<!-- Formulário de remoção -->
			<form class="center" action="detalhes.php" method="POST">
				<input type="hidden" name="id_show" value="<?php echo $show['id_show']; ?>">
				<input type="submit" name="delete" value="Remover" class="btn brand z-depth-0">
			</form>
			
			<!-- Formulário de Edição -->
			<form class="center" action="alterar.php" method="POST">
				<input type="hidden" name="id_show" value="<?php echo $show['id_show']; ?>">
				<input type="submit" name="editar" value="Editar" class="btn brand z-depth-0">
			</form>        

		<?php else: ?>
			<h5>Shopw não encontrado.</h5>
		<?php endif ?>	
        
        </div>
    </div>


    <?php include('templates/footer.php')?>


</html>