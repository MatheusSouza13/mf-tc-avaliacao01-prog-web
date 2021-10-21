<?php
	include('config/bd_conexao.php');
	
	// querry para buscar
	$sql = 'SELECT id_show,imagem,cantor_banda,endereco,descricao,capacidade_total FROM shows ORDER BY id_show';
	
	//resultado como um conjunto de linhas
	$result = mysqli_query($conn, $sql);
	
	// busca a query
	$shows = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	//limpa memória de $result
	mysqli_free_result($result);
	
	//fecha conexão
	mysqli_close($conn);
	
	//print_r($shows);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <?php include('templates/header.php')?>

    <div calss="containter justify">
        <div class="row">
            <?php foreach ($shows as $show) {?>
                <div class="col s2 m4 card large">
                    <div class="card-image z-depth-0">
                        <img src="<?php echo htmlspecialchars($show['imagem']);?>" alt="<?php echo htmlspecialchars($show['id_show']);?>"/>
                        <span class="card-title bold"><?php echo htmlspecialchars($show['cantor_banda']);?></span>
                    </div>
                    <div class="card-content">
                        <p><?php echo htmlspecialchars($show['descricao']);?></p>
                        <p>Local: <?php echo htmlspecialchars($show['endereco']);?></p>
                    </div>
                    
                    <div class="card-action">
                        <a href="detalhes.php?id_show=<?php echo $show['id_show']?>">Detalhes</a>
                        <a href="venda.php?id_show=<?php echo $show['id_show']?>">Comprar Ingresso</a>
                    </div>
                </div>
            <?php } ?>
        
        </div>
    </div>


    <?php include('templates/footer.php')?>
</html>