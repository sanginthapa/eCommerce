<?php
echo "current session status".session_status()."<br>";
ob_start();
session_start();
echo "current session status".session_status()."<br>";
// session_destroy();
// echo "current session status".session_status()."<br>";
$_SESSION['test']="Test Session start";
echo "hello session ".$_SESSION['test'];
echo "<br>session email :".$_SESSION['email']."<br>";

if(isset($_POST['logout'])){
    ?>
    <script>
        function logout(){
        alert("ok");
    }
    logout();   </script>
    <?php
    session_abort();
    if(isset($_SESSION['test'])){
        echo "session yet not destroyed : ".$_SESSION['test']."<br>";
    }
    else{
        echo "session test has no value<br>";
    }
}


?>
<form action="" method="POST">
<button onclick='submit' name="logout">Logout</button>    
</form>
