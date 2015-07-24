<?php
/**
 * Created by PhpStorm.
 * User: amanu
 * Date: 7/22/15
 * Time: 9:03 PM
 */

namespace App\Http\Controllers;


class ArticleController extends Controller
{
    public function getCreate()
    {
        return view('article.create');
    }

    public function getUpdate()
    {
        return view('article.update');
    }

    public function postUpdate()
    {
        return view('article.update');
    }
}