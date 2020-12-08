<?php


namespace App\Controllers;


class BaseController
{
    protected $twig;

    /**
     * @param mixed $twig
     */
    public function setTwig($twig)
    {
        $this->twig = $twig;
    }

}