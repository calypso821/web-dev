<!DOCTYPE html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<meta charset="UTF-8" />
<title>Project application</title>

<?php include("view/navigation/menu-links.php"); ?>

<body class="d-flex flex-column min-vh-100">
    <section class="mt-3 mt-md-5 mb-5">
    <div class="container-fluid h-custom">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-10 col-sm-9 col-md-8 col-lg-7 col-xl-6">
                <form action="<?= BASE_URL . "project/application" ?>" method="post">
                <input type="hidden" name="title" value=<?= $project["title"] ?>/>
                <input type="hidden" name="author_id" value=<?= $project["author_id"] ?>/>
                <div class="d-flex flex-row">
                    <p class="h2 mb-4 mt-3 me-3 h1">Application</p>
                </div>
                <div class="d-flex flex-row">
                    <h2>Project: <span class="text-info"><?= $project["title"] ?></span></h2>
                </div>
                

                <!-- Name input -->
                <div class="form-outline mb-3 mt-2 w-75">
                    <input type="text" class="form-control form-control-lg"
                    placeholder="Your name" name="name" required autofocus/>
                    <span class="text-danger">  <?= $errors["name"] ?></span>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-3 w-75">
                    <input type="email" class="form-control form-control-lg"
                    placeholder="Your Email" name="email" required autofocus/>
                    <span class="text-danger">  <?= $errors["email"] ?></span>
                </div>

                <div class="form-outline mb-3">
                    <label>Description: <span class="text-danger"><?= $errors["description"] ?></span><br />
                    <textarea class="form-control" name="description" rows="8" cols="80" 
                    placeholder="Write something about yourselfe..."></textarea></label>
                </div>

                <div class="text-center text-lg-start mb-4 mt-4 pt-2">
                    <button id="apply" class="btn btn-primary btn-lg mb-2"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">Submit</button>
                    <span class="h5 text-success px-3" id ="sending" hidden>Sending...</span>
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
<script>
    $(document).ready(function(){
        $('#apply').click(function(){ 
            $('#sending').attr("hidden", false);
        });
    });
</script>

