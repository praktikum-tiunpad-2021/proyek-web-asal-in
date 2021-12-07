<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\UserProfileModel;

class UserController extends BaseController
{
  protected $userModel;
  protected $userProfileModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
    $this->userProfileModel = new UserProfileModel();
  }

  public function user()
  {
    $data = [
      'pageTitle' => 'Daftar User | ' . SITE_TITLE,
      // 'users' => $this->userModel->findAll(),
      'users' => $this->userModel->paginate(5), 
      'user_profiles' => $this->userProfileModel->paginate(5),
      'pager' => $this->userModel->pager,
      'pager' => $this->userProfileModel->pager
    ];

    return view('admin/kelola-user/user', $data);
  }

  public function tambahUser()
  {
    $data = [
      'pageTitle' => 'Tambah User | ' . SITE_TITLE,
      'errors' => \Config\Services::validation(),
    ];
    return view('admin/kelola-user/tambah', $data);
  }

  public function addUser()
  {
    $rules = $this->userModel->getValidationRules();
    $messages = $this->userModel->getValidationMessages();

    if (!$this->validate($rules, $messages)) {
      return redirect()->back()->withInput();
    }

    $this->userModel->insert($this->request->getPost());
    return redirect()->to('admin/kelola-user/user');
  }

  public function ubahUser($id)
  {
    $data = [
      'pageTitle' => 'Ubah User | ' . SITE_TITLE,
      'userData' => $this->userModel->find($id),
      'errors' => \Config\Services::validation(),
    ];

    return view('admin/kelola-user/ubah', $data);
  }

  public function changeUser($id)
  {
    $rules = $this->userModel->getValidationRules();
    $messages = $this->userModel->getValidationMessages();

    if (!$this->validate($rules, $messages)) {
      return redirect()->back()->withInput();
    }

    $this->userModel->update($id, $this->request->getVar());
    return redirect()->to('admin/kelola-user/user');
  }
}