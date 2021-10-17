<?php

?>

<!DOCTYPE html>
<html>
	<?php include('templates/header.php') ?>
	<section class="container grey-text">
		<h4 class="center">Novo Show</h4>
		<form class="white" action="adicionar.php" method="POST" >
			<label>Imagem:</label>
			<input type="text" name="image" value="">			

			<label>Banda:</label>
			<input type="url" name="banda" value="">			
			
			<label>Local:</label>
			<input type="text" name="local" value="">	
			
			<label>Descrição:</label>
			<input type="text" name="local" value="">	

			<label>Capacidade:</label>
			<input type="text" name="local" value="">

			
			<div class="center" style="margin-top: 10px;">
				<input type="submit" name="enviar" value="Enviar" class="btn brand z-depth-0">
			</div>
		</form>
	</section>
	<?php include('templates/footer.php') ?>

    <input type="text">
</html>


<!-- <!DOCTYPE html>
<html>
	<?php include('templates/header.php') ?>
	<section class="container grey-text">
		<h4 class="center">Novo Show</h4>
		<form class="white" action="adicionar.php" method="POST" >
			<label>Imagem</label>
			<input type="text" name="image" value="<?php echo $image ?>">			
			<div class="red-text"><?php echo $erros['image']?></div>
			
			<label>Banda</label>
			<input type="url" name="banda" value="<?php echo $banda ?>">			
			<div class="red-text"><?php echo $erros['banda']?></div>
			
			<label>Ingredientes (separados por vírgula)</label>
			<input type="text" name="ingredientes" value="<?php echo $ingredientes ?>">				
			<div class="red-text"><?php echo $erros['ingredientes']?></div>
			
			<div class="center" style="margin-top: 10px;">
				<input type="submit" name="enviar" value="Enviar" class="btn brand z-depth-0">
			</div>
		</form>
	</section>
	<?php include('templates/footer.php') ?>

    <input type="text">
</html>
-->