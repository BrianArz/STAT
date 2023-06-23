<?php
    session_start();
    if(empty($_SESSION["nameUser"]))
    {
        header("Location: ../login.php");
    }

    include '../controllers/communityController.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>My Communities</title>

        <link rel="stylesheet" href="../resources/vendors/bootstrap/bootstrap.min.css">

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
                        <h1>Community - <?php echo $commTitle;?></h1>
                    </div>
                </div>

                <?php 
                    if($isEditUser)
                    {
                        ?>
                        <div class="row mt-4">
                            <form method="post" action="" enctype="multipart/form-data">
                                <div class="row mt-4">
                                    <div class="col-lg-6 col-md-6 mb-3">
                                        <label for="title" class="form-label">Community Title</label>
                                        <input type="text" class="form-control" id="title" required name="title" value="<?php echo $commTitle;?>">
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
                                            <option value="Mexico" <?php if ($commCountry == "Mexico") echo "selected"; ?>>Mexico</option>
                                            <option value="Canada" <?php if ($commCountry == "Canada") echo "selected"; ?>>Canada</option>
                                            <option value="France" <?php if ($commCountry == "France") echo "selected"; ?>>France</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 col-md-4 mb-3">
                                        <label for="language" class="form-label">Language</label>
                                        <select class="form-select" id="language" aria-label="Default select example" name="language">
                                            <option value="Spanish" <?php if ($commLanguage == "Spanish") echo "selected"; ?>>Spanish</option>
                                            <option value="English" <?php if ($commLanguage == "English") echo "selected"; ?>>English</option>
                                            <option value="French" <?php if ($commLanguage == "French") echo "selected"; ?>>French</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row mt-2">
                                    <div class="col-lg-12 col-md-12 mb-3">
                                        <label for="examDescription" class="form-label">Description</label>
                                        <textarea class="form-control" id="examDescription" rows="3" required name="description"><?php echo $commDescription?></textarea>
                                    </div>
                                </div>

                                <?php echo $errorMessage; ?>

                                <div class="row mt-4 d-flex justify-content-end">
                                    <div class="col-lg-3 col-md-3 mb-3 d-flex justify-content-center">
                                        <button name="btnSaveCommunity" class="btn btn-md btn-primary col-lg-12" type="submit" id="btnSave">Save Changes</button> 
                                    </div>
                                </div>

                                <div class="row col-lg-9 mt-4 d-flex justify-content-start">
                                    <form method="post" action="">
                                        <div class="col-lg-8 col-md-8 mb-3">
                                            <label for="myExams" class="form-label">My Exams</label>
                                            <select class="form-select" id="myExams" name="myExams">
                                                <?php

                                                $sql = mysqli_query($dbConn, "select * from exams where idUser ='$idUser'");

                                                while($myExamsData = mysqli_fetch_assoc($sql)):
                                                ?>
                                                <option><?php echo $myExamsData["title"];?></option>

                                                <?php endwhile;?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-2 mb-2">
                                            <label for="btnAddExam" class="form-label">&nbsp;</label>
                                            <button name="btnAddExam" class="btn btn-md btn-success col-lg-12" type="submit" id="btnAddExam">Add</button> 
                                        </div>
                                    </form>
                                </div>

                                
                            </form>
                        </div>
                    <?php    
                    }
                ?>

                <?php 
                    if(!$isEditUser)
                    {
                        ?>
                        <div class="row mt-4">
                            <h4 class="mt-3"><?php echo $commDescription;?></h4>
                            <h6 style="color: grey;">Author: <?php echo $commAuthor?> | <?php echo $commCountry?> | <?php echo $commLanguage?> </h6>
                        </div>
                    <?php    
                    }
                ?>


                

                <div class="row mt-5">
                    <div class="col-lg-12 col-md-6 d-flex">
                        <!-- <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Author</th>
                                <th scope="col">Year</th>
                                <th scope="col">School</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                    $registerCounter = 0;

                                    try
                                    {
                                        $sql = mysqli_query($dbConn, "select c.* from communities as c inner join userscommunities as uc on c.idCommunity = uc.idCommunity where uc.idUser = '$idUser'");

                                        while($communityData = mysqli_fetch_assoc($sql)):
                                        
                                            $registerCounter++;
                                        ?>
                                            <tr>
                                                <th scope="row"><?php echo $registerCounter;?></th>
                                                <td><a href="../views/community.php?idCommunity=<?php echo $communityData["idCommunity"]?>" style="color: black;"><strong><?php echo $communityData["title"];?></strong></a></td>
                                                <td><?php echo $communityData["description"];?></td>
                                                <td><?php echo $communityData["author"];?></td>
                                            </tr>


                                    <?php endwhile;    
                                    }
                                    catch(Exception $e)
                                    {
                                        $errorMessage = "<div class='alert alert-danger d-grid gap-2 mb-3' role='alert'>" . $e -> getMessage() . "</div>";
                                    }
                                ?>
                                    
                            </tbody>
                        </table> -->
                    </div>
                </div>
            </div>
        </div>

        <script src="../resources/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>