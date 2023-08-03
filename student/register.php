<?php include_once './foobar.php'  ?>

<?php 

    $errors =[];

    

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];
        $nrc = $_POST['nrc'];
        $address = $_POST['address'];
        $grade = $_POST['grade'];
        $class = $_POST['class'];


        $pass = md5($password);
        $pass = sha1($pass);
        $pass = crypt($pass, $pass);
      
      
       
    

    if(!$name){
        $errors['name'] = 'Name is Required';

    }
    if(strlen($name) < 6){
        $errors['name'] = 'Name must be as least 6 character';
    }


    if(!$email){
        $errors['email'] = 'Email is Required';

    }else if($email){

        $sql = " SELECT * FROM student where `email` = '$email' ";
        $result = mysqli_query($conn, $sql);
        $ans = mysqli_num_rows($result);

        if($ans > 0){
            $errors['email'] = "Email is already used";
        }
    }
    

    if(!$password){
        $errors['password'] = 'Password is Required';

    }else if(strlen($password) < 6){
        $errors['password'] = 'Pasword as least 6 character';
    }


    if(!$confirm){
        $errors['confirm'] = 'Confirm-password is Required';

    }else if($confirm != $password){
        $errors['confirm'] = 'Confirm-password must be same';
    }

    if(!$address){
        $errors['address'] = 'Address is Required';
    }

    if(!$nrc){
        $errors['nrc'] = 'Nrc-no is Required';

    }else if($nrc){

        $sql = " SELECT * FROM student where `nrc-no` = '$nrc' ";
        $result = mysqli_query($conn, $sql);
        $ans = mysqli_num_rows($result);

        if($ans > 0){
            $errors['nrc'] = "Check your Nrc-no";
        }
  
    }

    if(!$grade){
        $errors['grade'] = 'Grade is Required';
    }
   

    if(count($errors) == 0){

        $sql  = "INSERT INTO student (`name`, `email`, `password`, `confirm`, `nrc-no`, `address`, `grade`,`class`) VALUES ( '$name', '$email', '$pass', '$confirm', '$nrc', '$address', '$grade', '$class')";

        $result = mysqli_query($conn ,$sql);
        

        if($result) {

            redirect('course.php');

        }else{

            redirect('register.php');
        }
    }
}

?>


<div class="container">
    <div class="row justify-content-center align-items-center vh-100 mt-5">
        <div class="col-5">

            <div class="card">
                <div class="card-header" style="background-color:royalblue;">
                    <h3 class="text-center"> Student Register Form</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">

                        
                        <input type="text" name="name" class="form-control rounded-pill <?php if(isset($errors['name'])): ?>  is-invalid <?php endif ?>" placeholder="Enter Your Name">
                        <?php if(isset($errors['name'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['name'] ?></div>
                        <?php endif ?><br>


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

                        
                        <input type="password" name="confirm" class="form-control rounded-pill <?php if(isset($errors['confirm'])): ?> is-invalid <?php endif ?>" placeholder="Enter Your Confirm Password">
                            <?php if(isset($errors['confirm'])): ?>
                                <div class="invalid-feedback"><?php echo $errors['confirm'] ?></div>
                            <?php endif ?>
                            <br>

                        
                        <input type="text" name="nrc" class="form-control rounded-pill <?php if(isset($errors['nrc'])): ?> is-invalid <?php endif ?>" placeholder="Enter Your Nrc-no">
                            <?php if(isset($errors['nrc'])): ?>
                                <div class="invalid-feedback"><?php echo $errors['nrc'] ?></div>
                            <?php endif ?>
                            <br>

                      
                        <input type="text" name="address" class="form-control rounded-pill <?php if(isset($errors['address'])): ?> is-invalid <?php endif ?>" placeholder="Enter Your Address" >
                            <?php if(isset($errors['address'])): ?>
                                <div class="invalid-feedback"><?php echo $errors['address'] ?></div>
                            <?php endif ?>
                            <br>

                        
                        <input type="text" name="grade" class="form-control rounded-pill <?php if(isset($errors['grade'])): ?> is-invalid <?php endif ?>" placeholder="Enter Your Grade">
                            <?php if(isset($errors['grade'])): ?>
                                <div class="invalid-feedback"><?php echo $errors['grade'] ?></div>
                            <?php endif ?>
                            <br>
                            
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
                            <button class="btn btn-primary" type="submit"> Register </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

<?php include_once '../footer.php' ?>


