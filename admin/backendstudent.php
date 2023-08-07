

<?php include_once './file.php' ?>
 




<div class="container">
    <div class="row mt-5">

    <!-- start teacher list show -->


    <!-- start list group  -->
                <div class="col-sm-3 mb-3">
                    <div class="list-group">
                        <a href="#" class="list-group-item bg-secondary" aria-current="true">
                        The current link item
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">Add School</a>
                        <a href="#" class="list-group-item list-group-item-action">School info</a>
                        <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a href="#" class="list-group-item list-group-item-action">Add School</a>
                        <a href="#" class="list-group-item list-group-item-action">School info</a>
                        <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                        <a href="#" class="list-group-item list-group-item-action">Add School</a>
                        <a href="#" class="list-group-item list-group-item-action">School info</a>
                        <a href="#" class="list-group-item list-group-item-action">A fourth link item</a>
                        <a class="list-group-item list-group-item-action disabled">A disabled link item</a>
                    </div>
                </div>
              
    <!-- end list group -->

        

            <div class="col-md-9 mb-3">

                <table class="table table-hover">

                <tr>
                    <th>NO</th>  
                    <th>Name</th>  
                    <th>Class</th>
                    <th>Register_Date</th>
                    <th colspan="2">Action</th>
                    

                </tr>

                <?php 

                $sql = "SELECT * FROM student where class = '4' ";
                $result = mysqli_query($conn, $sql);
                $ans = mysqli_fetch_assoc($result);

                $class_id = $ans['class'];

                ?>

               <?php 

                $sql = "SELECT * FROM student INNER JOIN category on student.class = category.cat_id where category.cat_id = $class_id";
                $result = mysqli_query($conn, $sql);
             
                $i = 1;
               while($ans = mysqli_fetch_assoc($result)):

                    $name = $ans['name'];
                    $class = $ans['cat_name'];
                    $date = $ans['register_date'];
                    $no = $i++;
                   
                   
               ?>
                 <tr>

                 <td><?php echo $no ?></td>
                 <td><?php echo $name ?></td>
                 <td><?php echo $class ?></td>
                 <td><?php echo $date ?></td>
                 <td><a href="backendsendcode.php?id=<?php echo $ans['id'] ?> &stid=0" class="btn btn-info"> Send Code <i class="fa-regular fa-message"></i> </i></a>
                 <a href="#" class="btn btn-danger"> Kick Out <i class="fa-solid fa-right-to-bracket"></i> </i></a></td>
                  
                  
                   
                </tr>

               <?php endwhile ?>

             

                </table>
            
            </div>

            

    <!-- start teacher list show -->


    </div>
</div>

<?php include_once '../footer.php' ?>
