<?php

require_once "DBInit.php";

class VoteDB {
    public static function insert($type, $proj_id, $user_id) {
        $db = DBInit::getInstance();
        $value = $type === "upvote" ? 1 : -1;

        $statement = $db->prepare("INSERT INTO votes (project_id, user_id, value)
                VALUES (:project_id, :user_id, :value)");

        $statement->bindParam(":project_id", $proj_id, PDO::PARAM_INT);
        $statement->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $statement->bindParam(":value", $value);
        $statement->execute();
    }
    public static function getUserVote($user_id, $proj_id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT value FROM votes
            WHERE project_id = :project_id AND user_id = :user_id");
        $statement->bindParam(":project_id", $proj_id, PDO::PARAM_INT);
        $statement->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $statement->execute();
        $vote = $statement->fetch();
        return $vote;
    }
    public static function update($type, $proj_id, $user_id) {
        $db = DBInit::getInstance();
        $value = $type === "upvote" ? 1 : -1;

        $statement = $db->prepare("UPDATE votes SET value = :vote_value 
                WHERE project_id =:project_id AND user_id = :user_id");
        $statement->bindParam(":project_id", $proj_id, PDO::PARAM_INT);
        $statement->bindParam(":user_id", $user_id, PDO::PARAM_INT);
        $statement->bindParam(":vote_value", $value);
        $statement->execute();

    }
    public static function countVotes($proj_id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("SELECT COUNT(*) FROM votes WHERE project_id = :project_id AND value = 1");
        $statement->bindParam(":project_id", $proj_id, PDO::PARAM_INT);
        $statement->execute();
        $count["positive"] = $statement->fetch()["COUNT(*)"];

        $statement = $db->prepare("SELECT COUNT(*) FROM votes WHERE project_id = :project_id AND value = -1");
        $statement->bindParam(":project_id", $proj_id, PDO::PARAM_INT);
        $statement->execute();
        $count["negative"] = $statement->fetch()["COUNT(*)"];
        
        return $count;

    }
    public static function delete($proj_id) {
        $db = DBInit::getInstance();

        $statement = $db->prepare("DELETE FROM votes WHERE project_id = :proj_id");
        $statement->bindParam(":proj_id", $proj_id, PDO::PARAM_INT);
        $statement->execute();
    }

   
}
