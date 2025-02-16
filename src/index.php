<?php

session_start();

require_once("controller/UserController.php");
require_once("controller/ProjectController.php");

define("BASE_URL", $_SERVER["SCRIPT_NAME"] . "/");
define("IMAGES_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/images/");
define("CSS_URL", rtrim($_SERVER["SCRIPT_NAME"], "index.php") . "static/css/");

$path = isset($_SERVER["PATH_INFO"]) ? trim($_SERVER["PATH_INFO"], "/") : "";

ProjectController::setAllVotes();

$urls = [
    "about" => function () {
        ProjectController::about();
    },
    "account-success" => function () {
        UserController::updateSuccess();
    },
    "changePassword" => function () {
        UserController::changePassword();
    },
    "changeEmail" => function () {
        UserController::changeEmail();
    },
    "changeUsername" => function () {
        UserController::changeUsername();
    },
    "changeName" => function () {
        UserController::changeName();
    },
    "register" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::register();
        } else {
            UserController::registerForm();
        }
    },
    "login" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            UserController::login();
        } else {
            UserController::loginForm();
        }
    },
    "logout" => function () {
        UserController::logout();
    },
    "account" => function () {
        ProjectController::accountPage();
    },
    "project" => function () {
        ProjectController::getProject();
    },
    "project/application" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            ProjectController::projectApply();
        } else {
            ProjectController::projectApplyForm();
        }
        
    },
    "project/allProjects" => function () {
        ProjectController::index();
    },
    # API for project search
    "api/project/search" => function () {
        ProjectController::searchApi();
    },
    # API for project order
    "api/project/order" => function () {
        ProjectController::orderApi();
    },
    # API for project vote
    "api/project/vote" => function () {
        ProjectController::voteApi();
    },
    "project/myProjects" => function () {
        ProjectController::myProjects();
    },
    "project/add" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            ProjectController::add();
        } else {
            ProjectController::addForm();
        }
    },
    "project/edit" => function () {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            ProjectController::edit();
        } else {
            ProjectController::editForm();
        }
    },
    "project/delete" => function () {
        ProjectController::delete();
    },
    "" => function () {
        ViewHelper::redirect(BASE_URL . "project/allProjects");
    },
];

try {
    if (isset($urls[$path])) {
       $urls[$path]();
    } else {
        echo "No controller for '$path'";
    }
} catch (Exception $e) {
    echo "An error occurred: <pre>$e</pre>";
    // ViewHelper::error404();
} 
