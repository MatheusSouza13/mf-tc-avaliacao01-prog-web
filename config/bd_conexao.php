<?php
    $conn = mysqli_connect('%', 'mftc', '123456', 'shows');

    if(!$conn)
    {
        echo 'Erro na conexão: '.mysqli_connect_error();
    }
?>