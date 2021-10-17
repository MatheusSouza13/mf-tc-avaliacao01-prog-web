<?php

?>

<!DOCTYPE html>
<html>
	<?php include('templates/header.php')?>
	<div class="container center">
		<?php if($pizza): ?>
			<h4><?php echo $pizza['nomePizza'];?></h4>
			<p>Email: <?php echo $pizza['email'];?></p>
			<h5>Ingredientes:</h5>
			<p><?php echo $pizza['ingredientes'];?></p>
			
			<!-- Formulário de remoção -->
			<form action="detalhes.php" method="POST">
				<input type="hidden" name="id_pizza" value="<?php echo $pizza['id']; ?>">
				<input type="submit" name="delete" value="Remover" class="btn brand z-depth-0">
			</form>
			
			<!-- Formulário de Edição -->
			<form action="alterar.php" method="POST">
				<input type="hidden" name="id" value="<?php echo $pizza['id']; ?>">
				<input type="submit" name="editar" value="Editar" class="btn brand z-depth-0">
			</form>
			
		<?php else: ?>
			<h5>Pizza não encontrada.</h5>
		<?php endif ?>	
	</div>
	
	<?php include('templates/footer.php')?>
	

</html>