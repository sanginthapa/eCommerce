<?php
function dbConnecting()
{
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'storage';
    $conn = mysqli_connect($hostname, $username, $password, $database);


    //   server user name 
    //   $servername = 'localhost';
    //   $username = 'ultima_client';
    //   $password = 'Ultima@2022';
    //   $dbname = 'ultima_ultima';
    //   $conn = mysqli_connect($servername, $username, $password, $dbname);

    // echo "db connection in progresss";
    if (!$conn) {
        echo "unable to connect database";
        die();
    //  header("location:preload.php");
    }
    else {
        //  header("location:../../index.php");
        // echo "Connected";
        return $conn;
    }
}
?>