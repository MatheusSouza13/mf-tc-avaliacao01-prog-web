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

    <?php if($shows){?>
		    <h4 class="center">Shows disponíveis</h4>
        <?php }
        else{?>
            <h4 class="center">Nenhum show disponível</h4>
    <?php }?>

    <div calss="containter" style="display: flex; align-items: center; margin-left: 75px; margin-right: 75px;">
        <div class="row" style="margin-top: 2%">
            <?php foreach ($shows as $show) {?>
                <div class="col s12 m4">
                    <div class="card">
                        <div class="card-image z-depth-0">
                            <img src="./imagens/<?php echo htmlspecialchars($show['imagem']);?>.png" alt="<?php echo htmlspecialchars($show['id_show']);?>"/>
                        </div>
                        <div class="card-content">
                            <p><span style="font-weight: bold;">Cantor/Banda: </span><?php echo htmlspecialchars($show['cantor_banda']);?></p>
                            <p><span style="font-weight: bold;">Local: </span> <?php echo htmlspecialchars($show['endereco']);?></p>
                        </div>
                        
                        <div class="card-action center">
                            <a href="detalhes.php?id_show=<?php echo $show['id_show']?>">Detalhes</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        
        </div>
    </div>


    <?php include('templates/footer.php')?>
</html>