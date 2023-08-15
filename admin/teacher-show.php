

<?php include_once './file.php' ?>
 




<div class="container">
    <div class="row mt-5">

    <!-- start teacher list show -->


    <!-- start list group  -->
                <div class="col-12 col-lg-3 col-md-12 col-sm-12 mb-3">
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

        

            <div class="col-12 col-lg-9 col-md-12 col-sm-12">

                <table class="table table-hover">

                <tr>
                    <th>NO</th>
                    <th>Class</th>
                    <th>Language</th>
                    <th>FrameWork</th>
                    <th>Teacher</th>
                    <th>Action</th>
                    

                </tr>

               <?php 

               $sql = "SELECT * FROM teacher";
               $result = mysqli_query($conn, $sql);
               while($ans = mysqli_fetch_assoc($result)):

                    $no = $ans['id'];
                    $teacher = $ans['name'];
                    $subject = $ans['subject'];
                    $framework = $ans['framework'];
                    $class = $ans['class'];
               ?>
                 <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $teacher ?></td>
                    <td><?php echo $subject ?></td>
                    <td><?php echo $framework ?></td>
                    <td><?php echo $class ?></td>
                    <td><a href="./register.php" class="btn btn-info"> Add Class <i class="fa-solid fa-book"></i></a></td>
                   
                </tr>

               <?php endwhile ?>

             

                </table>
            
            </div>

            

    <!-- start teacher list show -->


    </div>
</div>

<?php include_once '../footer.php' ?>
