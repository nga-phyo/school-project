<?php

include_once './foobar.php';
error_reporting(0);

if(!isset($_SESSION['auth'])){

    redirect('login.php');
}





?>

<div class="container ">
    <div class="row mt-4">
        <div class="col bg-secondary-subtle">

            <div style="overflow-x:auto;">
                <table class="table table-hover ">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Lang</th>
                            <th>Record-Video</th>
                            <th>Teacher</th>
                            <th>Date</th>
                            <th>Day</th>
                            <th>Action</th>
                        </tr>
                    </thead>



                    <?php


$id = $_SESSION['auth']['id'];

$sql = "SELECT * FROM student where `id` = $id ";
$result = mysqli_query($conn, $sql);
$ans = mysqli_fetch_assoc($result);



$st_id = $ans['id'];



$i = 1;

                    $sql = "SELECT * FROM record inner join student on record.class_id = student.class where student.id = '$st_id'";
                    $result = mysqli_query($conn, $sql);
                    // $ans = mysqli_fetch_all($result,MYSQLI_ASSOC);
                    // dd($ans);


                    while ($ans = mysqli_fetch_assoc($result)) :

                        $lang = $ans['lang'];
                        $record = $ans['record'];

                        $date = $ans['date'];
                        $no = $i++;

                    ?>

                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $lang ?></td>
                            <td>
                                <video width="150" height="90" controls>
                                    <source src="../admin/upload/day1.mp4" type="video/mp4">
                                </video>
                            </td>
                            <td><?php echo $record ?></td>
                            <td><?php echo date("j/M/Y") ?></td>
                            <td><?php echo date('l') ?></td>
                            <td><a href="" class="btn btn-success btn-sm" download=" <?php echo $record ?>">Download <i class="fa-solid fa-download"></i></a></td>
                        </tr>

                    <?php endwhile ?>


                </table>

            </div>




        </div>
    </div>
</div>

<?php include_once '../footer.php' ?>