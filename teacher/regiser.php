<?php


include_once './bar.php';

$errors = [];


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $framework = $_POST['framework'];
    $class = $_POST['class'];

    if (!$name) {
        $errors['name'] = "Name is required";
    }

    // if(strlen($name) < 6){
    //     $errors['name'] = "Name must be as least 6 character";
    // }

    if (!$subject) {
        $errors['subject'] = "Subject is required";
    }
    if (!$framework) {
        $errors['framework'] = "Framework is required";
    }
    if (!$class) {
        $errors['class'] = "class is required";
    }

    if(count($errors) == 0) {

        $sql = "INSERT INTO teacher(`name`,`subject`,`framework`,`class`) Values('$name','$subject','$framework','$class')";
        $result = mysqli_query($conn, $sql);

        if ($result) {

            echo "<script>window.alert('Success')</script>";
        } else {
            redirect('register.php');
        }
    }
}

?>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
        <div class="col-5">

            <div class="card">

                <div class="card-header" style="background-color:royalblue;">
                    <h3 class="text-center"> Student Register Form</h3>
                </div>

                <div class="card-body">
                    <form action="" method="POST">

                        
                        <input type="text" name="name" class="form-control rounded-pill <?php if(isset($errors['name'])): ?> is-invalid <?php endif ?>" placeholder="Enter Your Name">
                            <?php if(isset($errors['name'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['name'] ?></div>
                            <?php endif ?><br>
                        
                        <input type="text" name="subject" class="form-control rounded-pill <?php if(isset($errors['subject'])): ?> is-invalid <?php endif ?>" placeholder="Enter Your Subject">
                            <?php if(isset($errors['subject'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['subject'] ?></div>
                            <?php endif ?><br>
                        
                        <input type="text" name="framework" class="form-control rounded-pill <?php if(isset($errors['framework'])): ?> is-invalid <?php endif ?>" placeholder="Enter Your framework Language">
                            <?php if(isset($errors['framework'])): ?>
                            <div class="invalid-feedback"><?php echo $errors['framework'] ?></div>
                            <?php endif ?><br>
                        
                            <select name="class" class="form-control rounded-pill">
                           

                           <option value="" selected> Enter your Class </option>
                               <?php 
                              
                                   $sql = "SELECT * FROM category";
                                   $result = mysqli_query($conn, $sql);
                                   while($ans = mysqli_fetch_assoc($result)):  

                                       $cat_id = $ans['id'];
                                       $cat_name = $ans['name'];

                               ?>

                               <option value="<?php echo $cat_name ?>" ><?php echo $cat_name ?></option>

                               <?php endwhile ?>

                              

                       </select><br>

                            <div class="float-end">
                                <button class="btn btn-primary" type="submit">Register </button>
                            </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>

<?php include_once '../footer.php' ?>