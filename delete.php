<?php
    require 'includes/db.inc.php';

    $id = $_GET["id"];
    $sql = "DELETE FROM gallery WHERE id=$id";

    $statement = $con->query($sql);

    header("location: admin.php");
    exit();