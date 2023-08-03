<?php include_once './foobar.php'  ?>

<div class="container">
    <div class="row justify-content-center align-items-center vh-100 mt-5">
        <div class="col-5">

            <div class="card">
                <div class="card-header" style="background-color:lightslategrey;">
                    <h3 class="text-center"> Student Login Form</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">

                       
                        <label for="">Email</label>
                        <input type="email" name="email" class="form-control"><br>

                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control"><br>

                        <label for="">Class</label>
                        <input type="text" name="class" class="form-control"><br>

                        <div class="float-end">
                            <button class="btn btn-secondary " type="Submit">Login </button>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</div>