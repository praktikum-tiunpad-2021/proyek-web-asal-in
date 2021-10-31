<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Admin implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if (!session()->isLoggedIn){
      return redirect()->to(base_url('login'));
    }

    if (session()->userData['role'] != 'ADMIN'){
      return redirect()->to(base_url());
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
  }
}