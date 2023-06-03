<?php session_start();
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

    <title>PHP PDO CURD</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mat-4">
                <?php if (isset($_SESSION['message'])) : ?>
                    <h5 class="alert alert-success"><?= $_SESSION['message']; ?></h5>
                <?php
                    unset($_SESSION['message']);
                endif; ?>
                <div class="card">
                    <div class="card-header">
                        <h1>PHP PDO CURD
                            <a href="student-add.php" class="btn btn-primary float-end">Add Student</a>
                        </h1>

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone No</th>
                                    <th>Course</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM students";
                                $statement = $conn->prepare($query);
                                $statement->execute();
                                $statement->setFetchMode(PDO::FETCH_OBJ);
                                $result = $statement->fetchAll();
                                if ($result) {
                                    foreach ($result as $row) {
                                ?>
                                        <tr>
                                            <td><?= $row->id ?></td>
                                            <td><?= $row->fullname?></td>
                                            <td><?= $row->email?></td>
                                            <td><?= $row->phone?></td>
                                            <td><?= $row->course?></td>
                                            <td>
                                                <a href="student-edit.php?id=<?=$row->id?>" class="btn btn-primary">Edit</a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="5">No Recorded Found</td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>