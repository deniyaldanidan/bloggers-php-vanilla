<?php

namespace App\Controller;

use App\View\View;
use App\Model\MyModel;

class BlogController
{
    public function create()
    {
        echo View::render("create-blog");
    }

    public function post()
    {
        $title_inp = $_POST["title"];
        $excerpt_inp = $_POST["excerpt"];
        $authorname_inp = $_POST["author_name"];
        $body_inp = $_POST["body"];

        $operation = MyModel::create_blog($title_inp, $excerpt_inp, $body_inp, $authorname_inp);

        $operation === true ? true : die("error happened, " . $operation);

        header("Location: /");
    }
}