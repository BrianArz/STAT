<?php
    session_start();
    if(empty($_SESSION["nameUser"]))
    {
        header("Location: ../login.php");
    }

    include '../controllers/myCommunitiesController.php';
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
                        <h1>Checkout your Communities</h1>
                        <h6>Create and edit communities for the rest of the world to see!</h6>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-12 col-md-6 d-flex justify-content-end">
                        <a href="newCommunity.php" class="btn btn-primary col-lg-2" role="button">New Community</a>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-12 col-md-6 d-flex">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Author</th>
                                <!--<th scope="col">Year</th>
                                <th scope="col">School</th> -->
                                </tr>
                            </thead>

                            <tbody>
                                <?php

                                    $registerCounter = 0;

                                    try
                                    {
                                        $sql = mysqli_query($dbConn, "select c.* from communities as c inner join userscommunities as uc on c.idCommunity = uc.idCommunity where uc.idUser = '$userId'");

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
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <script src="../resources/vendors/bootstrap/bootstrap.bundle.min.js"></script>
    </body>
</html>