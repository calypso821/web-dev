<?php

require_once "DBInit.php";

class UserDB {
    public static function updatePassword($user_id, $pass) {
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE users SET password =:password WHERE id =:id");
        $statement->bindParam(":password", $pass);
        $statement->bindParam(":id", $user_id, PDO::PARAM_INT);
        $statement->execute();
    }
    public static function updateEmail($user_id, $email) {

        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE users SET email =:email WHERE id =:id");
        $statement->bindParam(":email", $email);
        $statement->bindParam(":id", $user_id, PDO::PARAM_INT);
        $statement->execute();
    }
    public static function updateUserName($user_id, $username) {

        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE users SET username =:username WHERE id =:id");
        $statement->bindParam(":username", $username);
        $statement->bindParam(":id", $user_id, PDO::PARAM_INT);
        $statement->execute();
    }
    public static function updateName($user_id, $name) {

        $db = DBInit::getInstance();
        $statement = $db->prepare("UPDATE users SET name =:name WHERE id =:id");
        $statement->bindParam(":name", $name);
        $statement->bindParam(":id", $user_id, PDO::PARAM_INT);
        $statement->execute();
    }
    public static function getEmail($id){
        $dbh = DBInit::getInstance();
        $stmt = $dbh->prepare("SELECT email FROM users
            WHERE id = :id");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }
    public static function getUsername($username) {
        $dbh = DBInit::getInstance();
        $stmt = $dbh->prepare("SELECT username FROM users
            WHERE username = :username");
        $stmt->bindValue(":username", $username);
        $stmt->execute();
        $user = $stmt->fetch();
        return $user;
    }

    public static function getUser($username, $password) {
        /* This function is more secure because
            1) It uses prepared statements and it binds variables;
            2) It does not store passwords in plain-text in the database

            For creating passwords, use: http://php.net/manual/en/function.password-hash.php
            For checking passwords, use: http://php.net/manual/en/function.password-verify.php
            For more information, see: http://php.net/manual/en/ref.password.php
        */
        $dbh = DBInit::getInstance();
        $stmt = $dbh->prepare("SELECT id, username, name, email, password FROM users
            WHERE username = :username");
        $stmt->bindValue(":username", $username);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user !== false && password_verify($password, $user["password"])) {
            unset($user["password"]);
            return $user;
        } else {
            return false;
        }
    }
    public static function register($name, $email, $username, $password) {
        $dbh = DBInit::getInstance();
        $pass = password_hash($password, PASSWORD_DEFAULT);

        $statement = $dbh->prepare("INSERT INTO users (name, email, username, password)
            VALUES (:user_name, :user_email, :user_username, :user_password)");
        $statement->bindParam(":user_name", $name);
        $statement->bindParam(":user_email", $email);
        $statement->bindParam(":user_username", $username);
        $statement->bindParam(":user_password", $pass);
        $statement->execute();
    }
}
