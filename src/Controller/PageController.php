<?php

namespace App\Controller;

class PageController extends AbstractController
{
    public function quizz(): string
    {
        return $this->twig->render('./quizz.html.twig');
    }

    public function oups(): string
    {
        return $this->twig->render('./oups.html.twig');
    }
}
