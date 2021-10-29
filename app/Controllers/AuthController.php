<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\UserProfileModel;

class AuthController extends BaseController
{
  protected $userModel;
  protected $userProfileModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
    $this->userProfileModel = new UserProfileModel();
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
    $this->userModel->setDynamicRules('signup');
    $this->userProfileModel->setDynamicRules('signup');

    $rules = array_merge($this->userModel->getValidationRules(), $this->userProfileModel->getValidationRules());
    $messages = array_merge($this->userModel->getValidationMessages(), $this->userProfileModel->getValidationMessages());

    if (!$this->validate($rules, $messages)) {
      return redirect()->to(base_url('daftar'))->withInput();
    }

    $id = $this->userModel->createUser($this->request->getPost());
    $this->userProfileModel->createUserProfile($id, $this->request->getPost());

    session()->set('isLoggedIn', true);
    session()->set('userData', [
      'user_id' => $id,
      'role' => 'USER',
    ]);
    return redirect()->to(base_url());
  }

  public function logout()
  {
    session()->remove('isLoggedIn');
    session()->remove('userData');
    return redirect()->to(base_url());
  }
}