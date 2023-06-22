<?php
    include "../controllers/editExamController.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Exam</title>

        <link rel="stylesheet" href="../resources/vendors/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="../resources/css/style.css">

    </head>

    <body>

        <header>
            <?php
                include "../utils/navbar.php";
            ?>
        </header>


        <div class="wrapper">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <h4>Edit your new exam</h4>
                    </div>
                </div>

                <div class="row">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row mt-4">
                            <div class="col-lg-6 col-md-6 mb-3">
                                <label for="examTitle" class="form-label">Exam Title</label>
                                <input type="text" class="form-control" id="examTitle" required name="title" value="<?php echo $examTitle;?>">
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <label for="examSubject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="examSubject" required name="subject" value="<?php echo $examSubject;?>">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-4 col-md-4 mb-3">
                                <label for="examSchool" class="form-label">School</label>
                                <input type="text" class="form-control" id="examSchool" required name="school" value="<?php echo $examSchool;?>">
                            </div>
                            <div class="col-lg-4 col-md-4 mb-3">
                                <label for="examProfessor" class="form-label">Professor</label>
                                <input type="text" class="form-control" id="examProfessor" required name="professor" value="<?php echo $examProfessor;?>">
                            </div>
                            <div class="col-lg-4 col-md-4 mb-3">
                                <label for="examYear" class="form-label">Year</label>
                                <input type="number" class="form-control" id="examYear" required name="year" value="<?php echo $examYear;?>">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Archivo en PDF</label>
                                <input class="form-control" type="file" id="formFile" accept=".pdf" name="pdf">
                            </div>
                        </div>

                        <!-- <div class="row mt-2">
                            <div class="col-lg-12 col-md-12 mb-3">
                                <label for="examDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="examDescription" rows="3" required name="description"></textarea>
                            </div>
                        </div> -->

                        <?php echo $errorMessage;?>

                        <div class="row mt-4">
                            <div class="col-lg-6 col-md-6 mb-3 d-flex justify-content-center">
                                <button name="btnSaveExam" class="btn btn-md btn-primary col-lg-8" type="submit">Save Changes</button> 
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3 d-flex justify-content-center">
                                <a href="myExams.php" class="btn btn-md btn-danger col-lg-8" role="button">Cancel</a>
                            </div>
                        </div>

                    </form>
                    
                </div>

                


            </div>
        </div>

        <script src="../resources/vendors/jquery/jquery.min.js"></script> 
        <script src="../resources/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>