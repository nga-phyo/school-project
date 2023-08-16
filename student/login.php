<?php 

    
    include_once './foobar.php'; 


        $errors =[];

      

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
            $email = $_POST['email'];
            $password = $_POST['password'];
            $class = $_POST['class'];
            $code = $_POST['code'];

            $pass = md5($password);
            $pass = sha1($pass);
            $pass = crypt($pass, $pass);
           
       


        if(!$email){
            $errors['email'] = 'Email is Required';
        }
        
        if(!$password){
            $errors['password'] = 'Password is Required';
        }

        if(!$class){
            $errors['class'] = 'Class is Required';
        }

        if(!$code){
            $errors['code'] = 'Code is Required';
        }

      

        if(count($errors) == 0){
           
        
            $sql =  "SELECT * from student where `email` = '$email' and `password` = '$pass' and `student_id` = '$code' and `class` = '$class' ";
            $result = mysqli_query($conn,$sql);
            // $student = mysqli_fetch_assoc($result);
            // dd($student);
        
        if($student = mysqli_fetch_assoc($result)){

          
           $_SESSION['auth'] = [
            'id' => $student['id'],
            'name' => $student['name'],
            'class' => $student['class'],
            'email' => $student['email'],
            'student_id' => $student['student_id']
            
         
           ];

      redirect('course.php');

        
    } 
    else if($result){

        echo "<script>window.alert('bla bla ')</script>";
    }
   
    }




    }

?>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100 mt-5">
        <div class="col-5">

            <div class="card">
                <div class="card-header" style="background-color:lightslategrey;">
                    <h3 class="text-center"> Student Login Form</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">

                       
                        <input type="email" name="email" class="form-control rounded-pill <?php if(isset($errors['email'])): ?> is-invalid <?php endif ?>" placeholder="Enter Your Email">
                            <?php if(isset($errors['email'])): ?>
                                <div class="invalid-feedback"><?php echo $errors['email'] ?></div>
                            <?php endif ?>
                            <br>
                      
                        <input type="password" name="password" class="form-control rounded-pill <?php if(isset($errors['password'])): ?> is-invalid <?php endif ?>" placeholder="Enter Your Password" >
                            <?php if(isset($errors['password'])): ?>
                                <div class="invalid-feedback"><?php echo $errors['password'] ?></div>
                            <?php endif ?>
                            <br>

                        <select name="class" class="form-control rounded-pill <?php if(isset($errors['class'])): ?> is-invalid <?php endif ?>"">
                            
                           
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

                       </select>
                            <?php if(isset($errors['class'])): ?>
                                <div class="invalid-feedback"><?php echo $errors['class'] ?></div>
                            <?php endif ?>
                            <br>
                       
                      
                       <input type="text" name="code" class="form-control rounded-pill <?php if(isset($errors['code'])): ?> is-invalid <?php endif ?>" placeholder="Enter Your Student code" >
                            <?php if(isset($errors['code'])): ?>
                                <div class="invalid-feedback"><?php echo $errors['code'] ?></div>
                            <?php endif ?>
                            <br>

                        <div class="float-end">
                           
                            <a href="./getcode.php" class="btn btn-success">Get Code</a>
                            <button class="btn btn-secondary" type="Submit">Login </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>