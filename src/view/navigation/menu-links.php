<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-sm-start">
            <a href="<?= BASE_URL . "project/allProjects" ?>" 
            class="text-start mb-3 mb-md-2 me-sm-auto  text-white text-decoration-none">
            <span class="fs-1">Web project</span></a>

            <ul class="nav col-12 col-sm-auto me-sm-auto mb-2 mb-sm-2 justify-content-center h5">
              <li><a href="<?= BASE_URL . "project/allProjects" ?>" class="nav-link px-2 text-white">Home</a></li>
                <li><a href="<?= BASE_URL . "about" ?>" class="nav-link px-2 text-white">About</a></li>
            </ul>

            <div class="text-end">
              <?php if (!User::isLoggedIn()): ?>
                <a href="<?= BASE_URL . "login" ?>"><button class="btn btn-outline-light me-2 btn-lg">Login</button></a>
              <?php else: ?>
                  <a class="btn btn-light me-2 dropdown-toggle btn-lg" 
                    href="" 
                    role="button" 
                    id="dropdownMenuButton1" 
                    data-bs-toggle="dropdown" 
                    aria-expanded="false">
                    <?= User::getName() ?>
                    </a>
                
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="<?= BASE_URL . "project/myProjects" ?>">My projects</a></li>
                    <li><a class="dropdown-item" href="<?= BASE_URL . "project/add" ?>">Create project</a></li>
                    <li><a class="dropdown-item" href="<?= BASE_URL . "account" ?>">Account settings</a></li>
                        <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="<?= BASE_URL . "logout" ?>">Sign out</a></li>
                    </ul>
              <?php endif; ?>
              <a href="<?= BASE_URL . "register" ?>"><button class="btn btn-outline-warning btn-lg">Sign-up</button></a>
            </div>
        </div>
    </div>
</header>
