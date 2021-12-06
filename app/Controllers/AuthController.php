<?php

namespace App\Controllers;
use CodeIgniter\Cookie\Cookie;
use CodeIgniter\Cookie\CookieStore;
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
      'pageTitle' => 'Masuk | ' . SITE_TITLE,
      'disableNavbar' => true,
      'errors' => \Config\Services::validation(),
    ];
    return view('auth/masuk', $data);
  }

  public function login()
  {
    $this->userModel->setDynamicRules('login');
    $rules = $this->userModel->getValidationRules();
    $messages = $this->userModel->getValidationMessages();

    if (!$this->validate($rules, $messages)) {
      return redirect()->back()->withInput();
    }

    $user = $this->userModel->where('email', $this->request->getPost('email'))->first();
    if (!$user || !password_verify($this->request->getPost('password'), $user['password'])){
      return redirect()->back()->withInput()->with('form-errors', 'Email atau password salah!');
    }

    if ($this->request->getPost('stay_logged_in') == 'on'){
      $store = new CookieStore([
        new Cookie(
          'auth_user',
          $user['user_id'],
          [ 
            'expire' => (10 * 365 * 24 * 60 * 60),
          ]
        ),
  
        new Cookie(
          'auth_password',
          $user['password'],
          [ 
            'expire' => (10 * 365 * 24 * 60 * 60),
          ]
        ),
      ]);
      $store->dispatch();
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
      'pageTitle' => 'Daftar | ' . SITE_TITLE,
      'disableNavbar' => true,
      'errors' => \Config\Services::validation(),
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
      return redirect()->back()->withInput();
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
    $store = new CookieStore([
      new Cookie(
        'auth_user',
        '',
        [ 
          'expire' => 1,
        ]
      ),

      new Cookie(
        'auth_password',
        '',
        [ 
          'expire' => 1,
        ]
      ),
    ]);
    $store->dispatch();

    session()->remove('isLoggedIn');
    session()->remove('userData');
    return redirect()->to(base_url());
  }
}