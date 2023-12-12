<?php

require_once "DBInit.php";

class ProjectDB {

    public static function getByUserId($user_id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, title, author, description, image_name, category, votes, date FROM projects
            WHERE author_id = :user_id");
        $statement->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public static function getAll() {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, title, author, description, image_name, category, votes, date FROM projects");
        $statement->execute();

        return $statement->fetchAll();
    }
    public static function insert($title, $author, $author_id, $description, $image_name, $category, $date) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("INSERT INTO projects (title, author, author_id, description, image_name, category, date)
            VALUES (:project_title, :project_autor, :project_author_id, :project_description, :project_image_name, :project_category, :project_date)");
        $statement->bindParam(":project_title", $title);
        $statement->bindParam(":project_autor", $author);
        $statement->bindParam(":project_author_id", $author_id);
        $statement->bindParam(":project_description", $description);
        $statement->bindParam(":project_image_name", $image_name);
        $statement->bindParam(":project_category", $category);
        $statement->bindParam(":project_date", $date);
        $statement->execute();
    }
    public static function get($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT id, title, author, author_id, description, image_name, category, votes, date FROM projects 
            WHERE id =:id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
    public static function getImageName($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT image_name FROM projects 
            WHERE id =:id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }
    
    public static function delete($id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("DELETE FROM projects WHERE id = :id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }
    public static function update($id, $title, $description, $image_name, $category, $date) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("UPDATE projects SET title = :project_title, description = :project_description, 
            category = :project_category, image_name = :project_image_name, date = :project_date WHERE id =:id");
        $statement->bindParam(":project_title", $title);
        $statement->bindParam(":project_description", $description);
        $statement->bindParam(":project_category", $category);
        $statement->bindParam(":project_image_name", $image_name);
        $statement->bindParam(":project_date", $date);
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->execute();
    }
    public static function search($query) {
    $db = DBInit::getInstance();

    $statement = $db->prepare("SELECT id, title, author, description, image_name, category, votes, date FROM projects 
        WHERE author LIKE :query OR title LIKE :query");
    
    $statement->bindValue(":query", '%' . $query . '%');
    $statement->execute();

    return $statement->fetchAll();
    } 
    public static function updateVotes($proj_id, $votes) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("UPDATE projects SET votes = :project_votes WHERE id =:id");
        $statement->bindParam(":project_votes", $votes);
        $statement->bindParam(":id", $proj_id, PDO::PARAM_INT);
        $statement->execute();

    }
}

