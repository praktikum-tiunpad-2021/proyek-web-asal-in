<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\UserProfileModel;

class ProfileController extends BaseController
{
  protected $userModel;
  protected $userProfileModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
    $this->userProfileModel = new UserProfileModel();
  }

  public function index()
  {
    $data = [
      'pageTitle' => 'Profil | ' . SITE_TITLE,
      'userData' => array_merge($this->userProfileModel->find(session()->userData['user_id']), 
                    ['email' => $this->userModel->find(session()->userData['user_id'])['email']])
    ];
    return view('profil/profil', $data);
  }

  public function ubahProfil()
  {
    $data = [
      'pageTitle' => 'Ubah Profil | ' . SITE_TITLE,
      'userData' => $this->userProfileModel->find(session()->userData['user_id']),
      'errors' => \Config\Services::validation(),
    ];
    return view('profil/ubah', $data);
  }

  public function saveProfile()
  {
    $this->userProfileModel->setDynamicRules('signup');

    $rules = $this->userProfileModel->getValidationRules();
    $messages = $this->userProfileModel->getValidationMessages();

    if (!$this->validate($rules, $messages)) {
      return redirect()->back()->withInput();
    }

    $this->userProfileModel->update(session()->userData['user_id'], $this->request->getVar());
    return redirect()->to(base_url('profil'));
  }

  public function ubahPassword()
  {
    $data = [
      'pageTitle' => 'Ubah Email dan Password | ' . SITE_TITLE,
      'email' => $this->userModel->find(session()->userData['user_id'])['email'],
    ];
    return view('profil/ubah-password', $data);
  }
}