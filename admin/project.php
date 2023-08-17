
<?php

include_once './file.php';

error_reporting(0);

    
    $errors = [];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $project = $_FILES['project']['name'];
        $class = $_POST['class'];


        $sql = "INSERT INTO project (`project_name`, `classpj_id`) Values('$project','$class')";

       if($_FILES['project']['error'] == 0){
        
        
        move_uploaded_file($_FILES['project']['tmp_name'],'upload-photo/'.$project);
       }
       
        $result = mysqli_query($conn, $sql);

        


        if($result){

            redirect('project.php');
        }else {

            echo "<script>window.alert('falil')</script>";
        }


    }


?>


    <div class="container">

        <div class="rwo">
            <div class="col-8 mt-4">

               <form action="" method="POST" enctype="multipart/form-data">

                    <input type="file" name="project" class="form-control rounded-pill"><br>

                    <select name="class" class="form-control rounded-pill">
                           

                            <option value="" selected disabled> Category Name for Upload </option>
                                <?php 
                               
                                    $sql = "SELECT * FROM category";
                                    $result = mysqli_query($conn, $sql);
                                    while($ans = mysqli_fetch_assoc($result)):  

                                        $id = $ans['cat_id'];
                                        $name = $ans['cat_name'];

                                ?>

                                <option value="<?php echo $id?>" ><?php echo $name ?></option>

                                <?php endwhile ?>

                               

                        </select><br>


                    <button type="submit" class="btn btn-primary">Upload</button>

               </form>

            </div>
        </div>

        <div class="row">
            <div class="col-12 mt-3">

                <table class="table table-hover">
                    <tr>
                        <th>No</th>
                        <th>Project</th>
                        <th>Class</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>

                    <?php 
                        $i =1;
                        $sql = "SELECT * FROM project inner join category on project.classpj_id = category.cat_id";

                        $result = mysqli_query($conn, $sql);

                        while($ans = mysqli_fetch_assoc($result)):
                            
                            $id = $ans['id'];
                            $photo = $ans['project_name'];
                            $class = $ans['cat_name'];
                            $date = $ans['date'];
                            $no = $i++;
                    ?>

                    <tr>
                        <td><?php echo $no ?></td>
                        <td><img src="./upload-photo/<?php echo $photo ?>" alt="" width="130" height="90"></td>
                        <td><?php echo $class ?></td>
                        <td><?php echo $date ?></td>
                        <td> <a href="#" class="btn btn-info" type="submit">See More</a></td>
                       
                    </tr>

                    <?php endwhile ?>

                </table>

            </div>
        </div>


    </div>




<?php include_once '../footer.php' ?>




