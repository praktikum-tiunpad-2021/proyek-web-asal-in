<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index()
  {
    $data = [
      'pageTitle' => 'SPPO',
    ];
    return view('home', $data);
  }

  public function hubungi()
  {
    $data = [
      'pageTitle' => 'Hubungi | SPPO',
    ];
    return view('hubungi', $data);
  }
}
