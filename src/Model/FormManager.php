<?php

namespace App\Model;

class FormManager extends AbstractManager
{
    public const TABLE = 'lettres';


    public function insert(array $credentialsForm, $user_id): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (firstname, 
        lastname, age, email, message) VALUES (:firstname,  
        :lastname, :age, :email, :message)");
        $statement->bindValue(':firstname', $credentialsForm['firstname']);
        $statement->bindValue(':lastname', $credentialsForm['lastname']);
        $statement->bindValue(':email', $credentialsForm['email']);
        $statement->bindValue(':age', $credentialsForm['age']);
        $statement->bindValue(':message', $credentialsForm['message']);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
