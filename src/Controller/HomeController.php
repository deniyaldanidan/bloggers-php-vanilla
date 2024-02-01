<?php

namespace App\Controller;

use App\Model\MyModel;
use App\View\View;

class HomeController
{
    public function index()
    {
        $blogs = MyModel::get_all_blogs();
        echo View::render("home", ["blogs" => $blogs]);
    }
}