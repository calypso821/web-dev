<?php

require_once("model/UserDB.php");
require_once("model/User.php");
require_once("ViewHelper.php");

class UserController {
    public static function updateSuccess(){
        ViewHelper::render("view/account-success.php");
    }
    public static function changePassword(){
        if (!User::isLoggedIn()) {
            throw new Exception("Login required.");
        }
        $rules = [
            "password1" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "password2" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "password_confirmation" => ["filter" => FILTER_VALIDATE_BOOLEAN]
        ];
        

        $data = filter_input_array(INPUT_POST, $rules);

        $errors["password_confirmation"] = $data["password_confirmation"] === null ? "Forgot to check the delete box?" : "";
        $errors["password"] =  empty($data["password1"]) || empty($data["password2"])  ? "Invalid password" : "";

        
        if (!empty($data["password1"]) && !empty($data["password2"])) {
            $pass = $data["password1"];
            if(strlen($pass) < 8) {
                $errors["password"] = "Password too short! (minimum 8 characters)";
            }
            elseif(strlen($pass) > 20) {
                $errors["password"] = "Password too long! (maximum 20 characters)";
            }
            elseif($pass !== $data["password2"]){
                $errors["password"] = "Password does not match!";
            }
        }
        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        if ($isDataValid) {
            $user_id = User::getId();
            // update name
            UserDB::updatePassword($user_id, $pass);
            ViewHelper::redirect(BASE_URL . "account-success");
        }
        $errors["email_confirmation"] = "";
        $errors["email"] = "";
        $errors["name_confirmation"] = "";
        $errors["name"] = "";
        $errors["username_confirmation"] = "";
        $errors["username"] = "";
        $data["email"] ="";
        $data["name"] ="";
        $data["username"] ="";

        
        ViewHelper::render("view/account.php", ["user" => $data, "errors" => $errors]);
    }
    public static function changeEmail(){
        if (!User::isLoggedIn()) {
            throw new Exception("Login required.");
        }
        $rules = [
            "email" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "email_confirmation" => ["filter" => FILTER_VALIDATE_BOOLEAN]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        $errors["email_confirmation"] = $data["email_confirmation"] === null ? "Forgot to check the delete box?" : "";
        $errors["email"] =  empty($data["email"]) ? "Invalid email" : "";

        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        if ($isDataValid) {
            $user_id = User::getId();
            // update name
            UserDB::updateEmail($user_id, $data["email"]);
            User::setEmail($data["email"]);
            ViewHelper::redirect(BASE_URL . "account-success");
        }
        $errors["name_confirmation"] = "";
        $errors["name"] = "";
        $errors["username_confirmation"] = "";
        $errors["username"] = "";
        $errors["password_confirmation"] = "";
        $errors["password"] = "";
        $data["name"] ="";
        $data["username"] ="";

        
        ViewHelper::render("view/account.php", ["user" => $data, "errors" => $errors]);
    }
    public static function changeUsername(){
        if (!User::isLoggedIn()) {
            throw new Exception("Login required.");
        }
        $rules = [
            "username" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "username_confirmation" => ["filter" => FILTER_VALIDATE_BOOLEAN]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        $errors["username_confirmation"] = $data["username_confirmation"] === null ? "Forgot to check the delete box?" : "";
        $errors["username"] =  empty($data["username"]) ? "Invalid username" : "";

        if (empty($errors["username"])) {
            $user = UserDB::getUsername($data["username"]);
            $errors["username"] = $user !== false ? "Username taken!" : "";
        }

        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        if ($isDataValid) {
            $user_id = User::getId();
            // update name
            UserDB::updateUserName($user_id, $data["username"]);
            User::setUsername($data["username"]);
            ViewHelper::redirect(BASE_URL . "account-success");
        }
        $errors["name_confirmation"] = "";
        $errors["name"] = "";
        $errors["email_confirmation"] = "";
        $errors["email"] = "";
        $errors["password_confirmation"] = "";
        $errors["password"] = "";
        $data["name"] ="";
        $data["email"] ="";

        
        ViewHelper::render("view/account.php", ["user" => $data, "errors" => $errors]);
    }
    public static function changeName(){
        if (!User::isLoggedIn()) {
            throw new Exception("Login required.");
        }
        $rules = [
            "name" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "name_confirmation" => ["filter" => FILTER_VALIDATE_BOOLEAN]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        $errors["name_confirmation"] = $data["name_confirmation"] === null ? "Forgot to check the delete box?" : "";
        $errors["name"] =  empty($data["name"]) ? "Invalid name" : "";

        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        if ($isDataValid) {
            $user_id = User::getId();
            // update name
            UserDB::updateName($user_id, $data["name"]);
            User::setName($data["name"]);
            ViewHelper::redirect(BASE_URL . "account-success");
        }
        $errors["username_confirmation"] = "";
        $errors["username"] = "";
        $errors["email_confirmation"] = "";
        $errors["email"] = "";
        $errors["password_confirmation"] = "";
        $errors["password"] = "";
        $data["username"] ="";
        $data["email"] ="";

        
        ViewHelper::render("view/account.php", ["user" => $data, "errors" => $errors]);
    }
    public static function registerForm($data = [], $errors = []) {
        if (empty($data)) {
            $data = [
                "name" => "",
                "email" => "",
                "username" => "",
                "password1" => "",
                "password2" => ""
            ];
        }
        if (empty($errors)) {
            foreach ($data as $key => $value) {
                $errors[$key] = "";
            }
        }
        
        ViewHelper::render("view/user-register-form.php", [
            "user" => $data, 
            "errors" => $errors,
            "formAction" => "register"
        ]);
    }

    public static function register() {
        $rules = [
            "name" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "email" => ["filter" => FILTER_SANITIZE_EMAIL],
            "username" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "password1" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "password2" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        $errors["name"] = empty($data["name"]) ? "Invalid name!" : "";
        $errors["email"] = empty($data["email"]) ? "Invalid email!" : "";

        // Username check
        $errors["username"] = empty($data["username"]) ? "Invalid username!" : "";

        if (empty($errors["username"])) {
            $user = UserDB::getUsername($data["username"]);
            $errors["username"] = $user !== false ? "Username taken!" : "";
        }

        // Password check
        $errors["password1"] = empty($data["password1"]) ? "Invalid password!" : "";
        $errors["password2"] = empty($data["password2"]) ? "Invalid password!" : "";

        if (!empty($data["password1"]) && !empty($data["password2"])) {
            $pass = $data["password1"];
            if(strlen($pass) < 8) {
                $errors["password1"] = "Password too short! (minimum 8 characters)";
            }
            elseif(strlen($pass) > 20) {
                $errors["password1"] = "Password too long! (maximum 20 characters)";
            }
            elseif($pass !== $data["password2"]){
                $errors["password2"] = "Password does not match!";
            }
        }
        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        if ($isDataValid) {
            UserDB::register($data["name"], $data["email"], $data["username"], $pass);
            $vars = [
                "name" => $data["name"],
                "email" => $data["email"],
                "username" => $data["username"],
                "password" => $pass
            ];
            ViewHelper::render("view/user-register-success.php", $vars);
        } else {
            ViewHelper::render("view/user-register-form.php", [
                "user" => ["name" => $data["name"], 
                           "email" => $data["email"], 
                           "username" => $data["username"]], 
                "errors" => $errors,
                "formAction" => "register"
            ]);
        }
    }

    public static function loginForm() {
        ViewHelper::render("view/user-login-form.php", ["formAction" => "login"]);
    }

    public static function login() {
        if (User::isLoggedIn()) {
            throw new Exception("Already logged-in");
        }
        $rules = [
            "username" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "password" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        $errorMessage =  empty($data["username"]) || empty($data["password"]) ? "Invalid username or password." : "";

        if($errorMessage == ""){
            $user = UserDB::getUser($data["username"], $data["password"]);
            $errorMessage = $user == null ? "Invalid username or password." : "";
        }

        if (empty($errorMessage)) {
            User::login($user);

            $vars = [
                "name" => $user["name"],
                "username" => $data["username"],
                "password" => $data["password"]
            ];
            
            ViewHelper::render("view/user-login-success.php", $vars);
        } else {
            ViewHelper::render("view/user-login-form.php", [
                "errorMessage" => $errorMessage,
                "formAction" => "login"
            ]);
        }
    }

    public static function logout() {
        User::logout();

        ViewHelper::redirect(BASE_URL . "project");
    }
}