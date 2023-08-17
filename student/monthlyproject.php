<?php

include_once './foobar.php';


error_reporting(0);

if(!isset($_SESSION['auth'])){

    redirect('login.php');
}






?>

<div class="container ">
    <div class="row mt-4">
        <div class="col">

            <table class="table table-hover">
                <tr>
                    <th>No</th>
                    <th>Project</th>
                    <th>Subject</th>
                    <th>Deatline</th>
                    <th>See More</th>
                </tr>

            <?php 





        $id = $_SESSION['auth']['id'];

        $sql = "SELECT * FROM student where `id` = $id ";
        $result = mysqli_query($conn, $sql);
        $ans = mysqli_fetch_assoc($result);
 
            $st_id = $ans['id'];
    
     

            $sql = "SELECT * FROM `student` INNER JOIN project on student.class = project.classpj_id inner join category on project.classpj_id = category.cat_id WHERE student.id = '$id'";
            $result = mysqli_query($conn,$sql);

            
            $i = 1;

            while($ans = mysqli_fetch_assoc($result)):

                $no = $i++;
                $project = $ans['project_name'];
                $subject = $ans['cat_name'];
                $id = $ans['pj_id'];
                

            ?>

            <tr>
                <td><?php echo $no ?></td>
                <td><img src="../admin/upload-photo/<?php echo $project ?>" alt="" width="130" height="70"></td>
                <td><?php echo $subject ?></td>
                <td><?php echo "1Week" ?></td>
                <td><a href="seeproject.php?id= <?php echo $id ?>" class="btn btn-success" type="submit">Show Info</a></td>
            </tr>

            <?php endwhile ?>


            </table>
         


        </div>
    </div>
</div>

<?php include_once '../footer.php' ?>