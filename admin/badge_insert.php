<?php

if (isset($_POST["nome_badge"]) && ($_POST["nome_badge"] != "")) {

    $nome_badge = $_POST["nome_badge"];

    require_once ("../connections/connection.php");

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "INSERT INTO badge (nome_badge) VALUES (?)";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, "s", $nome_badge);


        if (!mysqli_stmt_execute($stmt)) {
            echo "Error:" . mysqli_stmt_error($stmt);
        }

    } else {
        echo("Error description: " . mysqli_error($link));
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);
}

header("Location: badges.php");