<?php

namespace App\Model;

class FormManager extends AbstractManager
{
    public const TABLE = 'contact';
    public array $credentialsForm;

    public function insert(array $credentialsForm, $userId): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (firstname, 
        lastname, age, email, message, user_id) VALUES (:firstname, 
        :lastname, :email, :message, NULL)");
        $statement->bindValue(':firstname', $credentialsForm['firstname']);
        $statement->bindValue(':lastname', $credentialsForm['lastname']);
        $statement->bindValue(':email', $credentialsForm['email']);
        $statement->bindValue(':age', $credentialsForm['age']);
        $statement->bindValue(':message', $credentialsForm['message']);
        $statement->bindValue(':message', $userId);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
