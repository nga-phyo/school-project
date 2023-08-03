<?php include_once './foobar.php' ?>

<div class="container ">
    <div class="row mt-4">
        <div class="col bg-secondary-subtle">

            <table class="table table-hover ">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Lang</th>
                        <th>Record-Video</th>
                        <th>Teacher</th>
                        <th>Date</th>
                        <th>Day</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <?php

                $i = 1;

                $sql = "SELECT * FROM record INNER JOIN teacher on record.teacher_id = teacher.id;";

                $result = mysqli_query($conn, $sql);

                while ($ans = mysqli_fetch_assoc($result)) :

                    $lang = $ans['lang'];
                    $record = $ans['record'];
                    $teacher = $ans['name'];
                    $date = $ans['date'];
                    $no = $i++;

                ?>

                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $lang ?></td>
                        <td>
                            <video width="150" height="90" controls>
                                <source src="../admin/upload/day1.mp4" type="video/mp4">
                            </video>
                        </td>
                        <td><?php echo $teacher ?></td>
                        <td><?php echo date("j/M/Y") ?></td>
                        <td><?php echo date('l') ?></td>
                        <td><a href="" class="btn btn-success btn-sm">Download <i class="fa-solid fa-download"></i></a></td>
                    </tr>

                <?php endwhile ?>

            </table>





        </div>
    </div>
</div>

<?php include_once '../footer.php' ?>