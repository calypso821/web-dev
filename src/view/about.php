<!DOCTYPE html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<meta charset="UTF-8" />
<title>About</title>

<?php include("view/navigation/menu-links.php"); ?>

<body class="d-flex flex-column min-vh-100">
    <section class="mt-3 mt-md-5 mb-5">
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-6 col-sm-2 me-5">
                    <h1 class=" mb-4 me-3">Account settings</h1>
                </div>
                <div class="col-8 col-sm-4">
                    <h3 class="mb-4 text-primary">Technologys used for building website</h3>
                    <ul>
                        <li>HTML, CSS, JS</li>
                        <li>PHP</li>
                        <li>MySQL</li>
                        <li>Bootstrap</li>
                        <li>Vue</li>
                        <li>jQuery</li>
                        <li>phpmailer (sending emails)</li>
                    </ul>
                </div>
                <div class="col-8 col-sm-4">
                    <h2 class="text-primary">Functions</h2>
                    <p class="fw-bold">Normal user</p>
                    <ul>
                        <li>project list</li>
                        <li>serach project (by name, author)</li>
                        <li>order project (by rating, date, name)</li>
                        <li>filter by category (GameDev, Data mining, MobileDev...)</li>
                        <li>submit application if interested in project</li>
                    </ul>
                    <p class="fw-bold">Registered user</p>
                    <ul>
                        <li>all of the above</li>
                        <li>create your own project (edite, delete)</li>
                        <li>own project collection</li>
                        <li>rate other users's projects</li>
                        <li>change account settings</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</body>

<?php include("view/navigation/footer.php"); ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        
