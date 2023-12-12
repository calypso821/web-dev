<?php

require_once("model/ProjectDB.php");
require_once("model/VoteDB.php");
require_once("model/User.php");
require_once("ViewHelper.php");
require_once("phpmailer1/Mail.php");

class ProjectController {
    public static function about() {
        ViewHelper::render("view/about.php");
    }
    public static function accountPage($user = [], $errors = []) {
        if (!User::isLoggedIn()) {
            throw new Exception("Login required.");
        }
        
        if (empty($user)) {
            $user = [
                "name" => "",
                "username" => "",
                "email" => ""
            ];
        }

        if (empty($errors)) {
            foreach ($user as $key => $value) {
                $errors[$key] = "";
            }
            $errors["password"] = "";
            $errors["name_confirmation"] = "";
            $errors["username_confirmation"] = "";
            $errors["email_confirmation"] = "";
            $errors["password_confirmation"] = "";
        }
        $vars = ["user" => $user, "errors" => $errors];
        ViewHelper::render("view/account.php", $vars);
    }
    public static function projectApply() {
        $rules = [
            "name" => FILTER_UNSAFE_RAW,
            "email" => FILTER_UNSAFE_RAW,
            "description" => FILTER_UNSAFE_RAW
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        $errors["name"] = empty($data["name"]) ? "Invalid name!" : "";
        $errors["email"] = empty($data["email"]) ? "Invalid email!" : "";
        $errors["description"] = empty($data["description"]) ? "Invalid description!" : "";

        // Is there an error?
        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        if ($isDataValid) {
            // SEND EMAIL
            $author_email = UserDB::getEmail($_POST["author_id"])["email"];
            $info = [
                "name" => $data["name"],
                "title" => $_POST["title"],
                "email" => $data["email"],
                "description" => $data["description"]
            ];
            $mail_error = Mail::sendMail($author_email, $info);
            ViewHelper::render("view/project-apply-success.php", $mail_error);
        } else {
            self::AddForm($data, $errors);
        }
    }
    public static function projectApplyForm($data = [], $errors = []) {
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
        // If $data is an empty array, let's set some default values
            if (empty($data)) {
                $data = [
                    "name" => "",
                    "email" => "",
                    "description" => ""
                ];
            }

            // If $errors array is empty, let's make it contain the same keys as
            // $data array, but with empty values
            if (empty($errors)) {
                foreach ($data as $key => $value) {
                    $errors[$key] = "";
                }
            }
        }
        $vars = ["project" => ProjectDB::get($_GET["id"]), "errors" => $errors];
        ViewHelper::render("view/project-application.php", $vars);
    }
    public static function myProjects() {
        if (!User::isLoggedIn()) {
            throw new Exception("Login required.");
        }
        $user_id = User::getId();
        ViewHelper::render("view/project-myProjects-list.php", [
            "projects" => ProjectDB::getByUserId($user_id)
        ]);
    }
    public static function orderApi() {
        if (isset($_GET["order"]) && !empty($_GET["order"])) {
            $list = ProjectDB::getAllOrdered($_GET["order"]);
            header('Content-type: application/json; charset=utf-8');
            echo json_encode($list);
        }
    
    }
    public static function getProject() {
        if (isset($_GET["id"]) && !empty($_GET["id"])) {
            if(!User::isLoggedIn()) {
                $user_id = "null";
            }
            else {
                $user_id = User::getId();
            }
            ViewHelper::render("view/project-detail.php", [
                "project" => ProjectDB::get($_GET["id"]),
                "userId" => $user_id
            ]);
        }
        else {
            $vars = ["category" => "all", "loggedIn" => User::isLoggedIn()];
            ViewHelper::render("view/project-list.php", $vars);
        }
    }
    public static function index() {
        $vars = ["category" => "all", "loggedIn" => User::isLoggedIn()];
        if(isset($_GET["category"]) && !empty($_GET["category"])) {
            $vars["category"] = $_GET["category"];
        }
        ViewHelper::render("view/project-list.php", $vars);  
    }
    public static function addForm($data = [], $errors = []) {
        // If $data is an empty array, let's set some default values
        if (empty($data)) {
            $data = [
                "title" => "",
                "category" => "",
                "description" => "",
                "image" => ""
            ];
        }

        // If $errors array is empty, let's make it contain the same keys as
        // $data array, but with empty values
        if (empty($errors)) {
            foreach ($data as $key => $value) {
                $errors[$key] = "";
            }
        }

        $vars = ["project" => $data, "errors" => $errors];
        ViewHelper::render("view/project-add.php", $vars);
    }
    public static function addImage() {
        $error = "not set";
        $new_img_name = "";
        if (isset($_FILES["my_image"])) {
            $img_name = $_FILES["my_image"]["name"];
            $img_size = $_FILES["my_image"]["size"];
            $tmp_name = $_FILES["my_image"]["tmp_name"];
            $error = $_FILES["my_image"]["error"];

            $data = filter_var($img_name, FILTER_SANITIZE_SPECIAL_CHARS);
        
            if($error === 0 && empty($data["img_name"])) {
                if($img_size > 1250000) {
                    $error = "Image size is too large to upload! (1.25MB)";
                }
                else{
                    $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                    $img_ex_lc = strtolower($img_ex);
        
                    $allowed_exs = array("jpg", "jpeg", "png");
        
                    if(in_array($img_ex_lc, $allowed_exs)){
                        $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc; // unique ID
                        $img_upload_path = 'static/images/project2/'.$new_img_name; // make path
                        move_uploaded_file($tmp_name, $img_upload_path);
        
                        // insert into databse
        
                    } else {
                        $error = "You can't upload files of this type";
                    }
                }
            } 
            else {
                $error = "Unknown error occurred! (Select new image or keep old one)";
            }
        }
        $vars = ["error" => $error, "image_name" => $new_img_name];
        return $vars;
    }
    

    public static function add() {
        if (!User::isLoggedIn()) {
            throw new Exception("Login required.");
        }
        $vars = ProjectController::addImage();

        $img_error = $vars["error"];
        $img_name = $vars["image_name"];
        $errors["image"] = $img_error !== 0 ? $img_error : "";

        $rules = [
            "title" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "author" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "category" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "description" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        $errors["title"] = empty($data["title"]) ? "Invalid title!" : "";
        $errors["author"] = empty($data["author"]) ? "Invalid author!" : "";
        $errors["category"] = empty($data["category"]) ? "Invalid category!" : "";
        $errors["description"] = empty($data["description"]) ? "Invalid description!" : "";

        // Is there an error?
        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        if ($isDataValid) {
            $file_path = self::saveToFile($data["description"]);
            ProjectDB::insert($data["title"], $data["author"], User::getId(), $file_path, $img_name, $data["category"], date("Y-m-d H:i:s"));
            ViewHelper::redirect(BASE_URL . "project/myProjects");
        } else {
            self::AddForm($data, $errors);
        }
    }
    public static function saveToFile($description) {
        $file_name = uniqid("INFO-", true).'.txt'; // unique ID
        $file_path = 'static/files/'.$file_name; // make path
        file_put_contents($file_path, $description);
        return $file_name;
    }

    public static function editForm($data = [], $errors = []) {
        
        if(isset($_GET["id"]) && !empty($_GET["id"])) {
            $project = ProjectDB::get($_GET["id"]);
            if ($project["author_id"] != User::getId()) {
                throw new Exception("You have NO premission to edit this post!");
            }
            $file_path = 'static/files/'. $project["description"];
            $myfile = fopen($file_path, "r") or die("Unable to open file!");
            $description = fread($myfile, filesize($file_path));
            fclose($myfile);
            $data = $project;
            $data["description"] = $description;
        }
        if (empty($data)) {

            $data = [
                "id" => $project["id"],
                "title" => $project["title"],
                "category" => $project["category"],
                "description" => $description
            ];
        }

        if (empty($errors)) {
            foreach ($data as $key => $value) {
                $errors[$key] = "";
            }
            $errors["delete_confirmation"] = "";
            $errors["image"] = "";
        }
        
        ViewHelper::render("view/project-edit.php", ["project" => $data, "errors" => $errors]);
    }    

    public static function edit() {
        if (!User::isLoggedIn()) {
            throw new Exception("Login required.");
        }

        $rules = [
            "title" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "category" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "description" => ["filter" => FILTER_SANITIZE_SPECIAL_CHARS],
            "id" => ["filter" => FILTER_VALIDATE_INT, "options" => ["min_range" => 1]],
            "keep_image" => ["filter" => FILTER_VALIDATE_BOOLEAN]
        ];

        $data = filter_input_array(INPUT_POST, $rules);

        $errors["title"] = empty($data["title"]) ? "Invalid title!" : "";
        $errors["description"] = empty($data["description"]) ? "Invalid description!" : "";
        $errors["category"] = empty($data["category"]) ? "Invalid category!" : "";
        $errors["id"] = empty($data["id"]) ? "ID is missing." : "";
        $errors["delete_confirmation"] = "";

        $project = ProjectDB::get($data["id"]);
        if ($project["author_id"] != User::getId()) {
            throw new Exception("You have NO premission to edit this post!");
        }
        if($data["keep_image"] === true){
            // get old image 
            $img_name = ProjectDB::getImageName($data["id"])["image_name"];
            $img_error = 0;
        }
        else {
            $vars = ProjectController::addImage();
            $img_error = $vars["error"];
            $img_name = $vars["image_name"];
            
        }
        $errors["image"] = $img_error !== 0 ? $img_error : "";

        // Is there an error?
        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }
        

        if ($isDataValid) {
            $file_path = self::saveToFile($data["description"]);
            ProjectDB::update($data["id"], $data["title"], $file_path, $img_name, $data["category"], date("Y-m-d H:i:s"));
            ViewHelper::redirect(BASE_URL . "project/myProjects");
        } else {
            self::EditForm($data, $errors);
        }
    }
    public static function delete() {
        $rules = [
            "id" => ["filter" => FILTER_VALIDATE_INT, "options" => ["min_range" => 1]],
            "delete_confirmation" => ["filter" => FILTER_VALIDATE_BOOLEAN]
        ];

        $data = filter_input_array(INPUT_GET, $rules);

        $errors["id"] = $data["id"] === null ? "Cannot delete without a valid ID." : "";
        $errors["delete_confirmation"] = $data["delete_confirmation"] === null ? "Forgot to check the delete box?" : "";
        $errors["title"] = "";
        $errors["description"] = "";
        $errors["category"] = "";
        $errors["image"] = "";

        $project = ProjectDB::get($data["id"]);
        if ($project["author_id"] != User::getId()) {
            throw new Exception("You have NO premission to edit this post!");
        }

        $isDataValid = true;
        foreach ($errors as $error) {
            $isDataValid = $isDataValid && empty($error);
        }

        if ($isDataValid) {
            // delete votes
            VoteDB:: delete($data["id"]);
            // delete project
            ProjectDB::delete($data["id"]);
            ViewHelper::redirect(BASE_URL . "project/myProjects");
        } else {
            if ($data["id"] !== null) {

                self::EditForm($project, $errors);
            } else {
                ViewHelper::redirect(BASE_URL . "project");
            }
        }
    }
    public static function searchApi() {
        if (isset($_GET["query"]) && !empty($_GET["query"])) {
            $hits = ProjectDB::search($_GET["query"]);
        } else {
            $hits = ProjectDB::getAll();
        }
        $vars = ["hits" => $hits, "votes" => 0];
        if(User::isLoggedIn()){
            $votes =[];
            $user_id = User::getId();
            foreach ($hits as $project) {
                $proj_id = $project["id"];
                $vote = VoteDB::getUserVote($user_id, $proj_id);
                array_push($votes, $vote);
            }
            $vars["votes"] = $votes;
        }

    
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($vars);
    }
    
    public static function voteApi() {

        $vars = json_decode(array_key_first($_POST), true);
        $type = $vars["type"];
        $proj_id = $vars["project_id"];
        $vars_out = ["id" => $proj_id, "votes" => 0];
        if (!empty($type) && !empty($proj_id)) {
            if (User::isLoggedIn()) {
                $user_id = User::getId();
                $vote = VoteDB::getUserVote($user_id, $proj_id);
                
                if(!$vote) { // new vote
                    VoteDB::insert($type, $proj_id, $user_id);
                }
                else{ // already voted
                    VoteDB::update($type, $proj_id, $user_id);
                }
                $count = VoteDB::countVotes($proj_id);
                $votes = $count["positive"] - $count["negative"];
                // update project votes
                ProjectDB::updateVotes($proj_id, $votes);
                $vars_out["votes"] = $votes;
                
            }
        }
        header('Content-type: application/json; charset=utf-8');
        echo json_encode($vars_out);
    }
    public static function setAllVotes() {
        $projects = ProjectDB::getAll();
        foreach($projects as $project) {
            $proj_id = $project["id"];
            $count = VoteDB::countVotes($proj_id);
            $votes = $count["positive"] - $count["negative"];
            ProjectDB::updateVotes($proj_id, $votes);
        }
    }
}