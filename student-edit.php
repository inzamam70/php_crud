<?php 
include('dbcon.php');

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Insert data into PHP PDO</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mat-4">

                <div class="card">
                    <div class="card-header">
                        <h1>Edit data
                            <a href="index.php" class="btn btn-danger float-end">Back</a>
                        </h1>
                    </div>
                    <div class="card-body">
                        <?php 
                        if(isset($_GET['id'])){
                            $student_id = $_GET['id'];
                            $query = "SELECT * FROM students WHERE id=:stud_id LIMIT 1";
                            $statement = $conn->prepare($query);
                            $data = [':stud_id'=> $student_id];
                            $statement->execute($data);

                            $result = $statement->fetch(PDO::FETCH_OBJ);

                        }
                        ?>
                        <form action="code.php" method="POST">  
                        <div class="mb-3">
                                <label>Id</label>
                                <input type="hidden" name="student_id" value="<?=$result->id?>" class="form-control" />
                            </div>                         
                            <div class="mb-3">
                                <label>Full name</label>
                                <input type="text" name="fullname" value="<?=$result->fullname?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email"  value="<?=$result->email?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <input type="text" name="phone"  value="<?=$result->phone?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Course</label>
                                <input type="text" name="course"  value="<?=$result->course?>" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="update_student_btn" class="btn btn-primary">Update Student</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>