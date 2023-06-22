<?php
    session_start();
    if(empty($_SESSION["nameUser"]))
    {
        header("Location: ../login.php");
    }

    include "../controllers/newCommunityController.php";

    $userName = $_SESSION["nameUser"];
    $userId = $_SESSION["userId"];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>New Community</title>

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
                        <h4>Register new community</h4>
                    </div>
                </div>

                <div class="row">
                    <form method="post" action="" enctype="multipart/form-data">
                        <div class="row mt-4">
                            <div class="col-lg-6 col-md-6 mb-3">
                                <label for="title" class="form-label">Community Title</label>
                                <input type="text" class="form-control" id="title" required name="title">
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" class="form-control" id="author" required name="author" value="<?php echo $_SESSION["nameUser"];?>">
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-4 col-md-4 mb-3">
                                <label for="country" class="form-label">Country</label>
                                <select class="form-select" id="country" aria-label="Default select example" name="country">
                                    <option value="1">Mexico</option>
                                    <option value="2">Canada</option>
                                    <option value="3">France</option>
                                </select>
                            </div>
                            <div class="col-lg-4 col-md-4 mb-3">
                                <label for="language" class="form-label">Language</label>
                                <select class="form-select" id="language" aria-label="Default select example" name="language">
                                    <option value="1">Spanish</option>
                                    <option value="2">English</option>
                                    <option value="3">French</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-lg-12 col-md-12 mb-3">
                                <label for="examDescription" class="form-label">Description</label>
                                <textarea class="form-control" id="examDescription" rows="3" required name="description"></textarea>
                            </div>
                        </div>

                        <?php echo $errorMessage; ?>

                        <div class="row mt-4">
                            <div class="col-lg-6 col-md-6 mb-3 d-flex justify-content-center">
                                <button name="btnUploadCommunity" class="btn btn-md btn-primary col-lg-8" type="submit">Upload</button> 
                            </div>
                            <div class="col-lg-6 col-md-6 mb-3 d-flex justify-content-center">
                                <a href="myCommunities.php" class="btn btn-md btn-danger col-lg-8" role="button">Cancel</a>
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