<!DOCTYPE html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<meta charset="UTF-8" />
<title>Account page</title>

<?php include("view/navigation/menu-links.php"); ?>

<body class="d-flex flex-column min-vh-100">
    <section class="mt-3 mt-md-5 mb-5">
    <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-10 col-md-2">
                    <h1 class=" mb-4 me-3">Account settings</h1>
                    <h4 class="fw-normal mb-5" >Welcome <span class="text-warning" ><?= User::getName() ?></span></h4>
                </div>
                <div class="col-9 col-sm-4">
                    <ul>
                        <li class="h5" >Name: <span class="text-info"><?= User::getName() ?></span></li>
                    </ul>
                    <form class="mb-5"action="<?= BASE_URL . "changeName" ?>" method="post">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="h4 fw-normal  mb-3">Change name</p>
                        </div>
                        <div class="form-outline mb-2">
                            <input type="text" class="form-control" value="<?= $user["name"] ?>"
                            placeholder="New Name" name="name" maxlength="30"/>
                            <span class="text-danger">  <?= $errors["name"] ?></span>
                        </div>
                        <div>
                            <label class="form-check-label me-3 small">Would you like to change name? <input class="form-check-input" 
                                type="checkbox" name="name_confirmation"/></label>
                            <button class="btn btn-primary btn-md">Change</button>
                            <p class="text-danger"><?= $errors["name_confirmation"] ?></p>
                        </div>
                    </form>
                    <ul>
                        <li class="h5" >Username: <span class="text-info"><?= User::getUsername() ?></span></li>
                    </ul>
                    <form action="<?= BASE_URL . "changeUsername" ?>" method="post">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="h4 fw-normal  mb-3">Change username</p>
                        </div>
                        <div class="form-outline mb-2">
                            <input type="text" class="form-control" value="<?= $user["username"] ?>"
                                placeholder="New Username" name="username" minlength="3" maxlength="30"/>
                                <span class="text-danger">  <?= $errors["username"] ?></span>
                        </div>
                        <div>
                            <label class="form-check-label me-3 small">Would you like to change username? <input class="form-check-input" 
                                type="checkbox" name="username_confirmation"/></label>
                            <button class="btn btn-primary btn-md">Change</button>
                            <p class="text-danger"><?= $errors["username_confirmation"] ?></p>
                        </div>
                    </form>
                </div>
                <div class="col-9 col-sm-4 mx-5">
                    <ul>
                        <li class="h5" >Email: <span class="text-info"><?= User::getEmail() ?></span></li>
                    </ul>
                    <form class="mb-5" action="<?= BASE_URL . "changeEmail" ?>" method="post">
                        <div class="d-flex flex-row justify-content-center justify-content-lg-start">
                            <p class="h4 fw-normal mb-3">Change email</p>
                        </div>
                        <div class="form-outline mb-2">
                            <input type="email" class="form-control" value="<?= $user["email"] ?>"
                            placeholder="New Email" name="email" maxlength="30"/>
                            <span class="text-danger">  <?= $errors["email"] ?></span>
                        </div>
                        <div>
                            <label class="form-check-label me-3 small">Would you like to change email? <input class="form-check-input" 
                                type="checkbox" name="email_confirmation"/></label>
                            <button class="btn btn-primary btn-md">Change</button>
                            <p class="text-danger"><?= $errors["email_confirmation"] ?></p>
                        </div>
                    </form>
                    <form action="<?= BASE_URL . "changePassword" ?>" method="post">
                        <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                            <p class="h4 fw-normal  mb-3">Change passowrd</p>
                        </div>
                        <div class="form-outline mb-2">
                            <input type="password" class="form-control"
                            placeholder="New password" name="password1" minlength="8" maxlength="20"/>
                            <span class="text-danger"></span>
                        </div>

                        <!-- Password retype -->
                        <div class="form-outline mb-2">
                            <input type="password" class="form-control"
                            placeholder="Repeat password" name="password2" minlength="8" maxlength="20"/>
                            <span class="text-danger">  <?= $errors["password"] ?></span>
                        </div>
                        <div>
                            <label class="form-check-label me-3 small">Would you like to change password? <input class="form-check-input" 
                                type="checkbox" name="password_confirmation"/></label>
                            <button class="btn btn-primary btn-md">Change</button>
                            <p class="text-danger"><?= $errors["password_confirmation"] ?></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

<?php include("view/navigation/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 