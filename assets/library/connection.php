<?php

function connectdb()
{
  $localhost = 'localhost';
  $root = 'root';
  $password = '';
  $dbname = 'storage';
  $con = mysqli_connect($localhost, $root, $password, $dbname);
  //   server user name 
  //  $servername = 'localhost';
  //  $username = 'ultima_client';
  //  $password = 'Ultima@2022';
  //  $dbname = 'ultima_ultima';
// $con = mysqli_connect($servername, $username, $password, $dbname);
  // ==============================connect database now=======================




  // echo "db connection in progresss";
  if (!$con) {
    echo "unable to connect";
    die();
    //  header("location:preload.php");
  } else {
    //  header("location:../../index.php");
    // echo "Connected";
    return $con;
  }
}
?>