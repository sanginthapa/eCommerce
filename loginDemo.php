<?php include "header.php" ?>
<?php
if (isset($_SESSION['session_start_status'])) {
    echo "sesson already started<br>";
    echo "Session Started". $_SESSION['email'] ;
    if ($_SESSION['session_start_status'] != 'started') {
        session_start();
        echo "sesson started<br>";
    }
} else {
    session_start();
}
if (isset($_SESSION['email'])) {
    echo '<div class="text-white">' . $_SESSION['email'] . '<br></div>';
    if ($_SESSION['email'] != '') {
    echo "Session Started". $_SESSION['email'] ;
    }
    else{
        ?>
      <script>
    window.location.href = 'login.php';</script>
<?php  
    }
   
?>
<script>
    window.location.href = 'login.php';</script>
<?php
}
?>
<?php include "footer.php" ?>