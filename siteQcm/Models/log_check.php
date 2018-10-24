<?php
    function log_check(&$db,$email,$pw){
        $query = "SELECT ID, pseudo, status, pic FROM users WHERE email = :email AND pw = :pw";
        $query_params = array(':email' => $email,
    ':pw' => $pw);
        
        try {
            $stmt = $db->prepare($query);
            $result = $stmt->execute($query_params);
        }   catch (PDOException $ex){
            die("Failed to connect to the database: " . $ex->getMessage());
        }
        $result = $stmt->fetch();
        return $result;
    }    
?>

