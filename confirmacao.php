<?php
	include('config/bd_conexao.php');
	
    $id_data = $_POST['id_data'];

	// querry para buscar
	$sql = "SELECT id_data, valor, quantidade_vendida FROM datas WHERE id_data='$id_data'";
	
	//resultado como um conjunto de linhas
	$result = mysqli_query($conn, $sql);
	
	// busca a query
	$datas = mysqli_fetch_all($result, MYSQLI_ASSOC);
	
	//limpa memória de $result
	mysqli_free_result($result);


    if (isset($_POST['efetuarCompra'])){

        $quantidade_vendida = mysqli_real_escape_string($conn, $_POST['quantidade_vendida']);

        //Query SQL
        $sql = "UPDATE datas SET quantidade_vendida='$quantidade_vendida' WHERE id_data='$id_data'";
        
        //Salva no banco de dados
        if (mysqli_query($conn, $sql)){
            //sucesso
            header('Location: index.php');
        } else {
            echo 'Erro na query: '.mysqli_error($conn);
        }
		
	}

?>

<!DOCTYPE html>
<html>
	<?php include('templates/header2.php');	

        $ingressoInteiro = $_POST['ingressoInteiro'];
        $ingressoMeia = $_POST['ingressoMeia'];
        foreach ($datas as $data)
        {
            $quantidade_vendida = $data['quantidade_vendida'];
            $quantidade_vendida += $ingressoInteiro + $ingressoMeia;

            $valor = $data['valor'];
            $valor_total = ($ingressoInteiro * $valor) + ($ingressoMeia* $valor / 2);
        }
    ?>

        <section class="container grey-text">
            <h4 class="center">Confirmar Compra</h4>
            <form class="white" action="confirmacao.php" method="POST" >

                <h5 class="center">Quantidade de ingressos inteiros:  <?php echo $_POST['ingressoInteiro'] ?></h5>
                <h5 class="center">Quantidade de ingressos meia:  <?php echo $_POST['ingressoMeia'] ?></h5>
                <h5 class="center">Valor Total:  R$<?php echo $valor_total ?></h5>
               
                <div class="center" style="margin-top: 10px;">
                    <input type="hidden" name="id_data" value="<?php echo $id_data; ?>">
                    <input type="hidden" name="quantidade_vendida" value="<?php echo $quantidade_vendida; ?>">
                    <input type="submit" name="efetuarCompra" value="Confirmar Compra" class="btn brand z-depth-0">
                </div>
            </form>
        </section>
	<?php include('templates/footer.php') ?>
	
</html>

