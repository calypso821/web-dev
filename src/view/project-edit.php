<!DOCTYPE html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<meta charset="UTF-8" />
<title>Edit project</title>

<?php include("view/navigation/menu-links.php"); ?>

<body class="d-flex flex-column min-vh-100">
    <section class="mt-3 mb-5">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-6 col-xl-5">
                <form action="<?= BASE_URL . "project/edit" ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $project["id"] ?>" />
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                    <p class="h2 mb-4 mt-3 me-3">Edit project</p>
                </div>
                <p>Author: <b><?= User::getName() ?></b></p>

                <!-- Title input -->
                <div class="form-outline mb-2">
                    <input type="text" class="form-control form-control-md"
                    placeholder="Project title" name="title" value="<?= $project["title"] ?>"autofocus required maxlength="80"/>
                    <span class="text-danger">  <?= $errors["title"] ?></span>
                </div>

                <div class="form-outline mb-2">
                    <label for="category">Choose a category: </label>
                    <select id="category" name="category" class="form-select form-select-md  w-50" aria-label="Default select example" required>
                        <option value="" disabled selected>Select your option</option>
                        <option value="WebDev">Web development</option>
                        <option value="MobileApp">Mobile app</option>
                        <option value="Hardware">Hardware</option>
                        <option value="GameDev">Game development</option>
                        <option value="DataMining">Data Mining</option>
                        <option value="Other">Other</option>
                    </select>
                    <span class="text-danger"><?= $errors["category"] ?></span>
                </div>

                <div class="form-outline mb-3">
                    <label>Description: <span class="text-danger"><?= $errors["description"] ?></span><br />
                    <textarea class="form-control form-control-md" name="description" rows="8" cols="80" 
                    placeholder="Write something about project..." required maxlength="3000"><?= $project["description"] ?></textarea></label>
                </div>
                
                <div class="form-outline mb-3">
                    <label for="image">Change picture: </label>
                    <input class="form-control-file form-control-file-md" id="image" type="file" name="my_image"><br>
                    <p class="text-danger"><?= $errors["image"] ?></p>
                    <label class="form-check-label mt-2">I would like to keep old picture
                        <input class="form-check-input" type="checkbox" name="keep_image" checked="checked"/></label>
                </div>

                <div class="text-center text-lg-start pt-2">
                    <button class="btn btn-primary btn-md mb-2 me-5"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Edit</button>
                </div>
                </form>
                <form action="<?= BASE_URL . "project/delete" ?>" method="get">
                    <input type="hidden" name="id" value="<?= $project["id"] ?>"  />
                    <label class="form-check-label me-3">Would you like to delete project? <input class="form-check-input" 
                        type="checkbox" name="delete_confirmation"/></label>
                    <button class="btn btn-danger btn-md">Delete</button>
                    <p class="text-danger"><?= $errors["delete_confirmation"] ?></p>
                </form>
            </div>
        </div>
    </div>
    </section>
</body>

<?php include("view/navigation/footer.php"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>