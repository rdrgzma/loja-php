<?php


namespace App\Controllers\Site;


use App\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $dados = [
            'titulo' => 'Lojinha'
        ];

        echo $this->twig->render('site_home.html', $dados);

    }
}