<?php 

    
    include_once './foobar.php'; 
    error_reporting(0);


    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $class = $_POST['class'];


        $sql =  "SELECT * from student where `email` = '$email' and `name` = '$name' and `class` = '$class' ";
        $result = mysqli_query($conn, $sql);
        $ans = mysqli_num_rows($result);
        $dd= mysqli_fetch_assoc($result);
        
        $code = $dd['student_id'];
        
        

        if($ans == 1){

           
            echo "<script>window.alert('$code')</script>";
         
        }else {
            echo "fail";
        }


    }


?>



<div class="container">
    <div class="row justify-content-center align-items-center vh-100 mt-5">
        <div class="col-5">

            <div class="card">
                <div class="card-header" style="background-color:mediumseagreen;">
                    <h3 class="text-center"> Get Code </h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">

                    <input type="text" name="name" class="form-control rounded-pill" placeholder="Enter your Name"><br>
                    <input type="text" name="email" class="form-control rounded-pill" placeholder="Enter your Email" ><br>
                    <select name="class" class="form-control rounded-pill">
                           

                           <option value="" selected> Click && Choice your Class </option>
                               <?php 
                              
                                   $sql = "SELECT * FROM category";
                                   $result = mysqli_query($conn, $sql);
                                   while($ans = mysqli_fetch_assoc($result)):  

                                       $cat_id = $ans['cat_id'];
                                       $cat_name = $ans['cat_name'];

                               ?>

                               <option value="<?php echo $cat_id ?>" ><?php echo $cat_name ?></option>

                               <?php endwhile ?>

                              

                       </select><br>
                      
                        <div class="float-end">
                         
                            <button class="btn btn-success" type="Submit">Confirm </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>