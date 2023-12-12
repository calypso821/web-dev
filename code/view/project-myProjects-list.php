<!DOCTYPE html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<meta charset="UTF-8" />
<title>Internet project database</title>

<?php
$projects1 =[];
$projects2 =[];
for ($i = 1; $i <= sizeof($projects); $i++) {
    if(2 % $i == 0){
        array_push($projects1, $projects[$i-1]);
    }
    else {
        array_push($projects2, $projects[$i-1]);
    }
};
?>

<?php include("view/navigation/menu-links.php"); ?>


<body class="d-flex flex-column min-vh-100">
    <div class="row justify-content-center mt-4">
        <div class="col-8 col-sm-8 col-md-3 col-lg-3 mb-2 px-4">
            <h1 class=" mb-4 me-3">My projects</h1>
            <h4 class="fw-normal">Welcome <span class="text-warning" ><?= User::getName() ?></span></h4>
            <p>You have: <?= sizeof($projects) ?> projects</p>
        </div>
        <div class="col-9 col-sm-5 col-md-4">
            <?php foreach($projects1 as $project): ?>
                <div class="card mb-4">
                    <a href="<?= BASE_URL . "project?id=" . $project["id"] ?>">
                    <img class="card-img-top" src="<?= IMAGES_URL . "project2/" . $project["image_name"] ?>" alt="project picture"></a>
                    <div class="card-body">
                        <a class="card-title text-decoration-none mb-2" href="<?= BASE_URL . "project?id=" . $project["id"] ?>"><h5><b><?= $project["title"] ?></b></h5></a>
                        <p class="card-text"><b>Category: </b><?= $project["category"] ?></p>
                        <div class="row card-text">
                            <div class="h5 fw-normal col-6 col-lg-7 col-xl-8">
                                Rating: 
                                <?php if($project["votes"] < 0): ?>
                                    <span class="h5 px-1 text-danger"><?= $project["votes"] ?></span>
                                <?php elseif($project["votes"] > 0): ?>   
                                    <span class="h5 px-1 text-success"><?= $project["votes"] ?></span>
                                <?php else: ?>  
                                    <span class="h5 px-1"><?= $project["votes"] ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-3">
                                <a class="px-4" href="<?= BASE_URL . "project/edit?id=" . $project["id"] ?>">
                                <button class="btn btn-sm btn-primary" style="padding-left: 1.5rem; padding-right: 1.5rem;">Edit</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">Updated: <?= date("m.d. Y", strtotime($project["date"])) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-9 col-sm-5 col-md-4">
            <?php foreach($projects2 as $project): ?>
                <div class="card mb-4">
                    <a href="<?= BASE_URL . "project?id=" . $project["id"] ?>">
                    <img class="card-img-top" src="<?= IMAGES_URL . "project2/" . $project["image_name"] ?>" alt="project picture"></a>
                    <div class="card-body">
                        <a class="card-title text-decoration-none mb-2" href="<?= BASE_URL . "project?id=" . $project["id"] ?>"><h5><b><?= $project["title"] ?></b></h5></a>
                        <p class="card-text"><b>Category: </b><?= $project["category"] ?></p>
                        <div class="row card-text">
                            <div class="h5 fw-normal col-6 col-lg-7 col-xl-8">
                                Rating: 
                                <?php if($project["votes"] < 0): ?>
                                    <span class="h5 px-1 text-danger"><?= $project["votes"] ?></span>
                                <?php elseif($project["votes"] > 0): ?>   
                                    <span class="h5 px-1 text-success"><?= $project["votes"] ?></span>
                                <?php else: ?>  
                                    <span class="h5 px-1"><?= $project["votes"] ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="col-3">
                                <a class="px-4" href="<?= BASE_URL . "project/edit?id=" . $project["id"] ?>">
                                <button class="btn btn-sm btn-primary" style="padding-left: 1.5rem; padding-right: 1.5rem;">Edit</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">Updated: <?= date("m.d. Y", strtotime($project["date"])) ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

<?php include("view/navigation/footer.php"); ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
