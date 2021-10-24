<?php

namespace App\Controllers;

class AuthController extends BaseController
{
  public function masuk()
  {
    $data = [
      'pageTitle' => 'Masuk | SPPO',
      'disableNavbar' => true,
    ];
    return view('auth/masuk', $data);
  }

  public function login()
  {
    dd($this->request->getPost());
  }

  public function daftar()
  {
    $data = [
      'pageTitle' => 'Daftar | SPPO',
      'disableNavbar' => true,
    ];
    return view('auth/daftar', $data);
  }

  public function signup()
  {
    dd($this->request->getPost());
  }
}