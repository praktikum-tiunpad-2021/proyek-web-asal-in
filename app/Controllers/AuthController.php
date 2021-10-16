<?php

namespace App\Controllers;

class AuthController extends BaseController
{
  public function masuk()
  {
    $data = [
      'pageTitle' => 'Masuk | SPPO',
    ];
    return view('auth/masuk', $data);
  }

  public function daftar()
  {
    $data = [
      'pageTitle' => 'Daftar | SPPO',
    ];
    return view('auth/daftar', $data);
  }
}