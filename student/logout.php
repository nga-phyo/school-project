<?php 

    session_start();
    include_once './foobar.php'; 

    if(isset($_SESSION['auth'])){

        unset($_SESSION['auth']);
    }


    redirect('course.php');
?>