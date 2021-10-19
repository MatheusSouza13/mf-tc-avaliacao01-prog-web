<?php

	//include('config/bd_conexao.php');
	//
	////Remove a pizza do banco de dados
	//if(isset($_POST['delete'])){
	//	//limpando a query
	//	$id_pizza = mysqli_real_escape_string($conn, $_POST['id_pizza']);
	//	
	//	//montando a query
	//	$sql = "DELETE FROM pizza WHERE id = $id_pizza";
	//	
	//	//removendo do banco
	//	if(mysqli_query($conn, $sql)){
	//		//sucesso
	//		header('Location: index.php');			
	//	}else{
	//		echo 'query error'.m,ysqli_error($conn);
	//	}
	//}
	//
//
	//
	////Verificando se o parametro id foi enviado pelo get
	//if(isset($_GET['id'])){
	//	//limpa a query sql
	//	$id = mysqli_real_escape_string($conn, $_GET['id']);
	//	
	//	//Monta a query
	//	$sql = "SELECT * FROM pizza WHERE id = $id";
	//	
	//	//Pega o resultado da query
	//	$result = mysqli_query($conn, $sql);
	//	
	//	//Busca um único resultado em formato de vetor
	//	$pizza = mysqli_fetch_assoc($result);
	//	
	//	mysqli_free_result($result);
	//	mysqli_close($conn);
	//}
	//
	//
	//print_r($pizza);


?>


<!DOCTYPE html>
<html lang="pt-br">
    <?php include('templates/header2.php')?>

    <div calss="containter justify">
        <div class="row">

            <div class="col s12 card large">
                    <div class="card-image z-depth-0">
                        <img src="https://source.unsplash.com/random" alt="show01"/>
                        <span class="card-title bold">Banda</span>
                    </div>
                    <div class="card-content">
                        <p>Descrição do show</p>
                        <p>Local:</p>
						<p>Capacidade:</p>
                    </div>
                    <div class="card-action center">
                        <a href="#">Editar</a>
						<a href="#">Remover</a>
						<a href="#">Datas/ Horários/ Valores</a>
                    </div>
            </div>         


        
        </div>
    </div>


    <?php include('templates/footer.php')?>


</html>