<?php include_once './file.php';

?>


<?php

    $errors = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){


        
        $video = $_FILES['vd']['name'];
        $lang = $_POST['lang'];
        $name = $_POST['teacher'];


        // $sql = "INSERT INTO record (`record`,`lang`,'teacher_id') Values('$video','$lang','$name')";
        $sql = "INSERT INTO record ( `record`, `lang`, `teacher_id`) VALUES ( '$video', '$lang', '$name');";
        $result = mysqli_query($conn, $sql);
      

        if($result){

            redirect('category.php');
        }else {
            redirect('recordupload.php');
        }
    }
    
?>


<div class="container">
    <div class="row mt-3">
        <div class="col-5">

            <form action="" method="post" enctype="multipart/form-data">



                <input type="file" name="vd" class="form-control"><br>
                <input type="text" name="lang" class="form-control" placeholder="Write a Language for Record Upload"><br>

                <select name="teacher" class="form-control rounded-pill">
                           

                            <option value="" selected disabled> Teacher Name for Upload </option>
                                <?php 
                               
                                    $sql = "SELECT id,name FROM teacher";
                                    $result = mysqli_query($conn, $sql);
                                    while($ans = mysqli_fetch_assoc($result)):  

                                        $id = $ans['id'];
                                        $name = $ans['name'];

                                ?>

                                <option value="<?php echo $id?>" ><?php echo $name ?></option>

                                <?php endwhile ?>

                               

                        </select><br>

                <button class="btn btn-primary" type="submit"> Upload <i class="fa-solid fa-cloud-arrow-up"></i></button>

            </form>

        </div>
    </div>

    <div class="row mt-4">
        <div class="col">

            <table class="table table-hover">

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

                $i =1;

                $sql = "SELECT * FROM record INNER JOIN teacher on record.teacher_id = teacher.id;";

                $result = mysqli_query($conn,$sql);

                while($ans = mysqli_fetch_assoc($result)):

                    $lang = $ans['lang'];
                    $record = $ans['record'];
                    $teacher = $ans['name'];
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
                    <td><?php echo $teacher ?></td>
                    <td><?php echo date("j/M/Y")?></td>
                    <td><?php echo date('l')?></td>
                    <td><a href="" class="btn btn-danger">Delete <i class="fa-solid fa-trash"></i></a></td>
                </tr>

                <?php endwhile ?>

            </table>



        </div>
    </div>

</div>

<?php include_once '../footer.php' ?>
