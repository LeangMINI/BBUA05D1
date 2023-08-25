<?php
    include("Functions.php");
    if (isset($_POST["tag"]) && $_POST["tag"] != "") {
    $tag = $_POST["tag"];
    $db = new Functions();

    if ($tag == "getuser") {
        $db->getAllUsers();
    } else {
        echo "Retrieve users failed...";
    }
    } else {
    echo "Access denied!";
    }
?>
