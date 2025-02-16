<!DOCTYPE html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<meta charset="UTF-8" />
<title>Register form</title>

<?php include("view/navigation/menu-links.php"); ?>

<body class="d-flex flex-column min-vh-100">
    <section class="mt-3 mb-5">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center">
        <div class="col-sm-8 col-md-5 col-lg-4  mx-lg-5">
			<svg class="img-fluid" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
			  <!-- Decorative circles creating a flowing pattern -->
			  <circle cx="100" cy="100" r="60" fill="none" stroke="#808080" stroke-width="2"/>
			  <circle cx="100" cy="100" r="45" fill="none" stroke="#808080" stroke-width="2"/>
			  <path d="M70,70 Q100,40 130,70 T130,130 Q100,160 70,130 T70,70" fill="none" stroke="#808080" stroke-width="2"/>
			</svg>
        </div>
        <div class="col-10 col-sm-6 col-md-5 col-lg-3 mx-lg-5">
            <form action="<?= BASE_URL . $formAction ?>" method="post">
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                <p class="h2 mb-4 mt-3 me-3 h1">Create an account</p>
            </div>

            <!-- Name input -->
            <div class="form-outline mb-2">
                <input type="text" class="form-control form-control-lg" value="<?= $user["name"] ?>"
                placeholder="Your Name" name="name"autofocus required maxlength="30"/>
                <span class="text-danger">  <?= $errors["name"] ?></span>
            </div>

            <!-- Username input -->
            <div class="form-outline mb-2">
                <input type="text" class="form-control form-control-lg" value="<?= $user["username"] ?>"
                    placeholder="Your Username" name="username" required minlength="3" maxlength="30"/>
                    <span class="text-danger">  <?= $errors["username"] ?></span>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" class="form-control form-control-lg" value="<?= $user["email"] ?>"
                placeholder="Your Email" name="email" required maxlength="30"/>
                <span class="text-danger">  <?= $errors["email"] ?></span>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-2">
                <input type="password" class="form-control form-control-lg"
                placeholder="Password" name="password1" required minlength="8" maxlength="20"/>
                <span class="text-danger">  <?= $errors["password1"] ?></span>
            </div>

            <!-- Password retype -->
            <div class="form-outline mb-2">
                <input type="password" class="form-control form-control-lg"
                placeholder="Repeat your password" name="password2" required minlength="8" maxlength="20"/>
                <span class="text-danger">  <?= $errors["password2"] ?></span>
            </div>

            <div class="text-center text-lg-start mb-4 mt-4 pt-2">
                <button class="btn btn-primary btn-lg mb-2"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
                <p class="small fw-bold mt-3 pt-1 mb-0">Have already an account? 
                    <a href="<?= BASE_URL . "login" ?>" class="link-danger">Log-in here</a></p>
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
