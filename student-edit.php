<?php
session_start();
require 'dbcon.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
            rel="stylesheet">
        <title>Student View</title>
    </head>

    <body>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Student Detail</h4>
                            <a href="index.php" class="btn btn-secondary float-end">Back</a>
                        </div>
                        <div class="card-body">
                            <?php
                            if(isset($_GET['id'])){
                                $student_id=mysqli_real_escape_string($con,$_GET['id']);
                                $query="SELECT * FROM students WHERE id='$student_id'";
                                $query_run=mysqli_query($con,$query);

                                if(mysqli_num_rows($query_run)>0){
                                    $student=mysqli_fetch_array($query_run);
                                    ?>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="student_id" value="<?=$student['id'];?>"/>
                                <div class="mb-3">
                                    <label>Student Name</label>
                                    <input type="text" name="name" value="<?=$student['name'];?>"/>
                                </div>
                                <div class="mb-3">
                                    <label>Student Email</label>
                                    <input type="text" name="email" value="<?=$student['email'];?>"/>
                                </div>
                                <div class="mb-3">
                                    <label>Student Phone Number</label>
                                    <input type="text" name="phone" value="<?=$student['phone'];?>"/>
                                </div>
                                <div class="mb-3">
                                    <label>Student Course</label>
                                    <input type="text" name="course" value="<?=$student['course'];?>"/>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_student" class="btn btn-primary">
                                        Update Student</button>
                                </div>
                            </form>
                        <?php
                                }
                                else{
                                    echo "<h4>No such ID Found</h4>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>