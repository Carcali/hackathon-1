<?php

namespace App\controller;

use App\Model\formManager;
use App\Controller\AbstractController;

class formController extends AbstractController
{
    public function from(): string
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $$credentialsForm = array_map('trim', $_POST);

            if (!isset($credentialsForm['age']) || empty($credentialsForm['age'])) {
                $errors['age'] = 'champ obligatoire';
            }


            if (!isset($credentialsForm['email']) || empty($credentialsForm['email'])) {
                $errors['email'] = 'champ obligatoire';
            }

            if (!isset($credentialsForm['firstname']) || empty($credentialsForm['firstname'])) {
                $errors['firstname'] = 'champ obligatoire';
            }

            if (!isset($credentialsForm['lastname']) || empty($credentialsForm['lastname'])) {
                $errors['lastname'] = 'champ obligatoire';
            }

            if (!isset($credentialsForm['message']) || empty($credentialsForm['message'])) {
                $errors['message'] = 'champ obligatoire';
            }

            if (empty($errors)) {
                $userId = $_SESSION['user_id'];
                $fromManager = new fromManager();
                $fromManager->insert($credentialsForm, $userId);
            }
        }
        return $this->twig->render('form/form.html.twig', ['errors' => $errors]);
    }
}
