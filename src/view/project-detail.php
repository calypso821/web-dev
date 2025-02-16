<!DOCTYPE html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<meta charset="UTF-8" />
<title>Project detail</title>

<?php
    $file_path = 'static/files/'. $project["description"];
    $myfile = fopen($file_path, "r") or die("Unable to open file!");
    $description = fread($myfile, filesize($file_path));
    fclose($myfile);
?>


<?php include("view/navigation/menu-links.php"); ?>

<body class="d-flex flex-column min-vh-100">
    <section class="mt-3 mb-5 mt-5">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center">
        
            <div class="col-10 col-sm-6 col-md-5 col-lg-3 mx-lg-5">
                <!-- INFO -->
                <h1><?= $project["title"] ?></h1>
                <ul>
                    <li >Author: <b class="text-primary"><?= $project["author"] ?></b></li>
                    <li>Category: <b><?= $project["category"] ?></b></li>
                    <li>Created (updated): <b><?= date("m.d. Y", strtotime($project["date"])) ?></b></li>
                    <li>Score: <?php if($project["votes"] < 0): ?>
                                    <span class="h6 px-1 text-danger"><?= $project["votes"] ?></span>
                                <?php elseif($project["votes"] > 0): ?>   
                                    <span class="h6 px-1 text-success"><?= $project["votes"] ?></span>
                                <?php else: ?>  
                                    <span class="h6 px-1"><?= $project["votes"] ?></span>
                                <?php endif; ?>
                </ul>
                <p><?= $description ?></p>
            </div>

            <!-- Picture -->
            <div class="col-10 col-sm-8 col-md-5 col-lg-4  mx-lg-5">
                <img src="<?= IMAGES_URL . "project2/" . $project["image_name"]?>" alt="project picture"
                class="img-fluid" alt="Sample image">
            </div>
        </div>
        

        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-6">
                


                <?php if ($userId != "null" && $userId == $project["author_id"]): ?>
                    <div class="text-center text-lg-start mt-4">
                        <a href="<?= BASE_URL . "project/edit?id=" . $project["id"] ?>">
                        <button class="btn btn-primary btn-lg"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Edit</button></a>
                    </div>
                <?php else:?>
                    <div class="text-center text-lg-start mt-4">
                        <a href="<?= BASE_URL . "project/application?id=" . $project["id"] ?>">
                        <button class="btn btn-primary btn-lg btn-success"
                        style="padding-left: 2.5rem; padding-right: 2.5rem;">Apply</button></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </section>
</body>
    
<?php include("view/navigation/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>