<?php
    session_start();
    if(empty($_SESSION["nameUser"]))
    {
        header("Location: ../login.php");
    }

    //Include database connection model
    include $_SERVER['DOCUMENT_ROOT'] . '/STAT/models/dbConnection.php';

    $errorMessage = "";

    //Database connection try
    try
    {
        $dbConn = openConn();
    }
    //Database exception
    catch(Exception $e)
    {
        $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
    }

    $userName = $_SESSION["nameUser"];
    $userId = $_SESSION["userId"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Dashboard</title>

        <link rel="stylesheet" href="../resources/vendors/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="../resources/css/style.css">

    </head>

    <body>

        <header>
            <?php
                include "../utils/navbar.php";
            ?>
        </header>


        <div class="wrapperContainer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <h4>Checkout your exams</h4>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-12 col-md-6 d-flex justify-content-end">
                        <a href="newExam.php" class="btn btn-primary col-lg-2" role="button">New Exam</a>
                    </div>
                </div>

                <?php echo $errorMessage;?>

                <div class="row mt-5">
                    <div class="col-lg-12 col-md-6 d-flex">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Subject</th>
                            <th scope="col">Professor</th>
                            <th scope="col">Year</th>
                            <th scope="col">School</th>
                            <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                                $registerCounter = 0;

                                $sql = mysqli_query($dbConn, "select * from exams where idUser = '$userId'");

                                if(!$sql)
                                {
                                    $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>Query exception</div>";
                                }
        
                                while($examData = mysqli_fetch_assoc($sql)): 
                                    $registerCounter++;
                                    ?>
                                <tr>
                                    <th scope="row"><?php echo $registerCounter;?></th>
                                    <td><?php echo $examData["title"];?></td>
                                    <td><?php echo $examData["subject"];?></td>
                                    <td><?php echo $examData["professor"];?></td>
                                    <td><?php echo $examData["year"];?></td>
                                    <td><?php echo $examData["school"];?></td>
                                    <td>
                                        <a href="../controllers/getPdf.php?idExam=<?php echo $examData['idExam']; ?>" target="_blank"><i class="bi bi-eye-fill me-2"></i></a>
                                        <i class="bi bi-pencil-fill me-2"></i>
                                        <i class="bi bi-trash3-fill me-2" onclick="phpController('deleteExam' , '<?php echo $examData['idExam']; ?>')"></i>
                                    </td>
                                </tr>
                            
                                <?php endwhile;
                                
                                closeConn($dbConn);
                            ?>

                        </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>

        <script src="../resources/vendors/jquery/jquery.min.js"></script> 
        <script src="../jsControllers/myexamsController.js"></script>
        <script src="../resources/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>