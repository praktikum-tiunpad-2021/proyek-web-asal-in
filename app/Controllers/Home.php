<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index()
  {
    $data = [
      'pageTitle' => SITE_TITLE,
    ];
    return view('home', $data);
  }

  public function hubungi()
  {
    $data = [
      'pageTitle' => 'Hubungi | ' . SITE_TITLE,
    ];
    return view('hubungi', $data);
  }
}
