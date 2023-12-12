<!DOCTYPE html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<meta charset="UTF-8" />
<title>Registered</title>

<?php 
    if(User::isLoggedIn()){
        User::logout();
    }
?>

<?php include("view/navigation/menu-links.php"); ?>

<body class="d-flex flex-column min-vh-100">
    <section class="mt-3 mt-md-5 mb-5">
    <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-10">
                    <h2>Successfull register</h2>
                    <h6>Welcome <b class="text-primary"><?= $name ?></b><h6>
                    <p>You can create new project.</p>
                    <ul>
                        <li><b>Username:</b> <code class="highlight"><?= $username ?></code></li>
                        <li><b>Email:</b> <code class="highlight"><?= $email ?></code></li>
                    </ul>
                    <p class="h6 fw-bold mt-2 pt-1 mb-0">Click 
                        <a id="login" href="<?= BASE_URL . "login" ?>"class="link-danger">here</a> to login</p>
                </div>
            </div>
        </div>
    </section>
</body>

<?php include("view/navigation/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
<script>
    $(document).ready(function(){

    });
</script>