<?php

namespace App\Filters;

use App\Models\UserModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AutoAuth implements FilterInterface
{
  protected $userModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
    helper('cookie');
  }

  public function before(RequestInterface $request, $arguments = null)
  {
    if (!(session()->isLoggedIn) && has_cookie('auth_user')){
      $user = $this->UserModel->find(get_cookie('auth_user'));

      if ($user != null && $user['password'] == get_cookie('auth_password')){
        session()->set('isLoggedIn', true);
        session()->set('userData', [
          'user_id' => $user['user_id'],
          'role' => $user['role'],
        ]);
      }
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
  }
}