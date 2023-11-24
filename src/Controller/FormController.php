<?php

namespace App\controller;

use App\Model\FormManager;
use App\Controller\AbstractController;

class FormController extends AbstractController
{
    public function form(): string
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credentialsForm = array_map('trim', $_POST);

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
                $userId = $_SESSION['id'];
                $formManager = new FormManager();
                $formManager->insert($credentialsForm, $userId);
            }
        }
        return $this->twig->render('./form.html.twig', ['errors' => $errors]);
    }
}
