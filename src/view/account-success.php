<!DOCTYPE html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<meta charset="UTF-8" />
<title>Apply success</title>

<?php include("view/navigation/menu-links.php"); ?>

<body class="d-flex flex-column min-vh-100">
    <section class="mt-3 mt-md-5 mb-5">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-10">
                    <h2 class="text-success mb-4">Account info successfuly updated!</h2>
                    <p class="h6 fw-bold mt-2 pt-1 mb-0">Back to
                        <a href="<?= BASE_URL . "account" ?>" class="link-danger">account</a> page.</p>
                </div>
            </div>
        </div>
    </section>
</body>

<?php include("view/navigation/footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        
