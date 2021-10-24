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

  public function login()
  {
    dd($this->request->getPost());
  }

  public function daftar()
  {
    $data = [
      'pageTitle' => 'Daftar | SPPO',
    ];
    return view('auth/daftar', $data);
  }

  public function signup()
  {
    dd($this->request->getPost());
  }
}