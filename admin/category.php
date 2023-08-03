<?php include_once './file.php' ?>



<?php

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['category'];

    if (!$name) {
        $errors['name'] = 'Class Category is required';
    }

    if (count($errors) == 0) {

        $sql = "INSERT INTO category(`name`) Values('$name')";
        $result = mysqli_query($conn, $sql);

        if ($result) {

            echo "<script>window.alert('insert succcessfully')</script>";
        } else {

            echo "<script>window.alert('insert failed')</script>";
        }
    }
}
?>



<div class="container">
    <div class="row justify-content-center align-items-center mt-5">
        <div class="col-4">

            <form action="" method="post">
                <label for="">
                    <h5>New Class</h5>
                </label>
                <input type="text" name="category" class="form-control rounded-pill <?php if (isset($errors['name'])) : ?> is-invalid<?php endif ?>">
                <?php if (isset($errors['name'])) : ?>
                    <div class="invalid-feedback"> <?php echo $errors['name'] ?></div>
                <?php endif ?>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <hr>

        </div>

        <div class="col-6">
            <table class="table table-hover">

                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th colspan="2">Action</th>

                </tr>

                <?php

                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql);

                while ($ans = mysqli_fetch_assoc($result)) :

                    $cat_id = $ans['cat_id'];
                    $cat_name = $ans['cat_name'];
                ?>

                    <tr>
                        <td><?php echo $cat_id ?></td>
                        <td><?php echo $cat_name ?></td>
                        <td><a href="" class="btn btn-info"> <i class="fa-solid fa-pen-to-square"></i> Edit</a></td>
                        <td><a href="" class="btn btn-danger"> <i class="fa-solid fa-trash"></i>Delete</a></td>
                    </tr>



                <?php endwhile ?>





            </table>
        </div>

    </div>

</div>


<?php include_once '../footer.php' ?>