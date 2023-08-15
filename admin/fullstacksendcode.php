
<?php


include_once './file.php';


$id = $_GET['id'];
$student_id = $_GET['stid'];

    $code = rand('5000', '6000');

    $sql = "SELECT * FROM student where `id` = '$id'";
    $result = mysqli_query($conn, $sql);
    $ans = mysqli_fetch_assoc($result);
     $dat = $ans['student_id'];

     


     if($student_id == 0){

        $sql = "UPDATE student set `student_id` = 'FSD-$code' where `id` = '$id' ";
        $result = mysqli_query($conn, $sql);

        if ($result) {

            echo "<script>window.alert('code sent success')</script>";
            redirect('fullstackstudent.php');
        } else {
            echo "<script>window.alert('code sent fail')</script>";
        }

     }else if($student_id == $dat){

        echo "<script>window.alert('bla bla')</script>";
     }

?>