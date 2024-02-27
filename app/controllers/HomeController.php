<?php
namespace App\Controllers;

use App\Models\Home;

class HomeController extends BaseController{
    public function index()
    {
        return $this->render('home');
    }
}