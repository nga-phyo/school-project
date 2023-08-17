 

<?php include_once './file.php' ;


    $id = $_GET['id'];



    $sql = "DELETE FROM student where `id` = '$id'";
    $result = mysqli_query($conn, $sql);

    if($result){

        $delete = "This Student has delete Successfully";

      

        redirect($_SERVER['HTTP_REFERER']);

    }

?>