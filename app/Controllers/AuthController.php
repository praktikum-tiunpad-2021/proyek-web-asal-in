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
    d($this->request->getPost());
    session()->set('isLoggedIn', true);
    session()->set('userData', [
      'role' => 'user',
    ]);
    return redirect()->to(base_url());
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

  public function logout()
  {
    // d($this->request->getPost());
    session()->remove('isLoggedIn');
    session()->remove('userData');
    return redirect()->to(base_url());
  }
}