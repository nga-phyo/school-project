
<?php 

    include_once './file.php';

    $id = $_GET['id'];
    $student_id = $_GET['stid'];

    $code = rand('2000','30000');


   if($student_id == 0){

       

        $sql = "UPDATE student set `student_id` = 'BKD-$code' where `id` = '$id' ";
        $result = mysqli_query($conn, $sql);

        if($result){

            echo "<script>window.alert('code sent success')</script>";
        }else {
            echo "<script>window.alert('code sent fail')</script>";
        }


   }

    

?>