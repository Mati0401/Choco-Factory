<?php

    include("conexion.php");

    $id = $_GET['id'];

    mysqli_query($conexion, "DELETE FROM producto WHERE id='$id'");

?>