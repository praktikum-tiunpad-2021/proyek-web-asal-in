<?php

namespace App\Controllers;

use App\Models\BorrowLogModel;
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
    $this->borrowLogModel = new BorrowLogModel();
  }

  public function index()
  {
    $data = [
      'pageTitle' => 'Profil | ' . SITE_TITLE,
      'userData' => array_merge($this->userProfileModel->find(session()->userData['user_id']), 
                    ['email' => $this->userModel->find(session()->userData['user_id'])['email']]),
      'borrowData' => $this->borrowLogModel->getBorrowLogDataByUser(session()->userData['user_id']),
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

    if (!$this->validate($rules, $messages))
      return redirect()->back()->withInput();

    $this->userProfileModel->update(session()->userData['user_id'], $this->request->getVar());
    return redirect()->to(base_url('profil'))->with('success', 'Data berhasil diubah!');
  }

  public function ubahPassword()
  {
    $data = [
      'pageTitle' => 'Ubah Email dan Password | ' . SITE_TITLE,
      'email' => $this->userModel->find(session()->userData['user_id'])['email'],
      'errors' => \Config\Services::validation(),
    ];
    return view('profil/ubah-password', $data);
  }

  public function savePassword()
  {
    $this->userModel->setDynamicRules('update');

    $rules = $this->userModel->getValidationRules();
    $messages = $this->userModel->getValidationMessages();

    if (!$this->validate($rules, $messages))
      return redirect()->back()->withInput();

    if (!password_verify($this->request->getVar('old_password'), $this->userModel->find(session()->userData['user_id'])['password']))
      return redirect()->back()->withInput()->with('form-errors', 'Password lama salah!');

    $saveData = [];
    if ($this->request->getVar('password') != "") $saveData['password'] = $this->request->getVar('password');
    if ($this->request->getVar('email') != "") $saveData['email'] = $this->request->getVar('email');

    if ($saveData) $this->userModel->update(session()->userData['user_id'], $saveData);
    return redirect()->to(base_url('profil'))->with('success', 'Data berhasil diubah!');
  }
}