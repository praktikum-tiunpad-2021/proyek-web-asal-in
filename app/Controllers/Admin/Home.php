<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Home extends BaseController
{
  public function index()
  {
    $data = [
      'pageTitle' => SITE_TITLE,
    ];
    
    return view('admin/home', $data);
  }
}