<?php

namespace App\Controllers;
use App\Models\UserModel;

class AuthController extends BaseController
{
  protected $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
  }

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
    $this->userModel->setDynamicRules('login');
    $rules = $this->userModel->getValidationRules();
    $messages = $this->userModel->getValidationMessages();

    if (!$this->validate($rules, $messages)) {
      return redirect()->to(base_url('masuk'))->withInput();
    }

    $user = $this->userModel->find($this->request->getPost('user_id'));
    if (!$user || $user['password'] != $this->request->getPost('password')){
      return redirect()->to(base_url('masuk'));
    }

    session()->set('isLoggedIn', true);
    session()->set('userData', [
      'user_id' => $user['user_id'],
      'role' => $user['role'],
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
    // $this->userModel->setDynamicRules('signup');
    // $rules = $this->userModel->getValidationRules();
    // $messages = $this->userModel->getValidationMessages();

    // if (!$this->validate($rules, $messages)) {
    //   return redirect()->to(base_url('masuk'))->withInput();
    // }
  }

  public function logout()
  {
    session()->remove('isLoggedIn');
    session()->remove('userData');
    return redirect()->to(base_url());
  }
}