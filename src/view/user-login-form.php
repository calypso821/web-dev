<!DOCTYPE html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<meta charset="UTF-8" />
<title>Login form</title>

<?php include("view/navigation/menu-links.php"); ?>

<body class="d-flex flex-column min-vh-100">
    <section class="mt-3 mb-5">
    <div class="container-fluid h-custom ">
        <div class="row justify-content-center">
            <div class="col-10 col-sm-7 col-md-6 col-lg-5">
                <p>Test account - <code class="highlight">user/pass1234 (guest)</code></p>
            </div>
        </div>
        <div class="row d-flex justify-content-center align-items-center">
        <div class="col-sm-8 col-md-5 col-lg-4  mx-lg-5">
			<svg class="img-fluid" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
			  <!-- Decorative circles creating a flowing pattern -->
			  <circle cx="100" cy="100" r="60" fill="none" stroke="#808080" stroke-width="2"/>
			  <circle cx="100" cy="100" r="45" fill="none" stroke="#808080" stroke-width="2"/>
			  <path d="M70,70 Q100,40 130,70 T130,130 Q100,160 70,130 T70,70" fill="none" stroke="#808080" stroke-width="2"/>
			</svg>
        </div>
        <div class="col-10 col-sm-6 col-md-5 col-lg-3  mx-lg-5">
            <form action="<?= BASE_URL . $formAction ?>" method="post">
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-sm-start">
                <p class="h2 mb-4 mt-3 me-3 h1">Sign in</p>
            </div>

            <!-- Username input -->
            <div class="form-outline mb-2">
                <input type="text" id="form3Example3" class="form-control form-control-lg"
                name="username" placeholder="username"autofocus required/>
            </div>

            <!-- Password input -->
            <div class="form-outline">
                <input type="password" id="form3Example4" class="form-control form-control-lg"
                placeholder="password" name="password" required/>
            </div>

                <?php if (!empty($errorMessage)): ?>
                    <p class="text-danger "><?= $errorMessage ?></p>
                <?php endif; ?>

            <div class="d-flex justify-content-center align-items-center">
                <a href="#!"  hidden class="text-body">Forgot password?</a>
            </div>

            <div class="text-center text-lg-start mb-4 mt-4 pt-2">
                <button class="btn btn-primary btn-lg mb-2"
                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                <p class="small fw-bold mt-3 pt-1 mb-0">Don't have an account? 
                    <a href="<?= BASE_URL . "register" ?>" class="link-danger">Register</a></p>
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
