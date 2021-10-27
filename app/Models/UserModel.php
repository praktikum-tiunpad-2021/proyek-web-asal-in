<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'user';
  protected $primaryKey = 'user_id';

  protected $allowedFields = ['email', 'password', 'role', 'borrowed_book_count', 'in_progress_count'];

  protected $dynamicRules = [
    'login' => [
      'user_id' => 'required',
      'password' => 'required|min_length[8]'
    ],
    'signup' => [
      'email' => 'required|is_unique[user.email]|valid_email',
      'password' => 'required|min_length[8]',
      'confirm_password' => 'required|matches[password]'
    ]
  ];

  protected $validationMessages = [
    'user_id' => [
      'required' => 'Nomor anggota harus diisi!',
    ],
    'email' => [
      'required' => 'Email harus diisi!',
      'is_unique' => 'Email sudah dipakai!',
      'valid_email' => 'Email harus diisi dengan benar!'
    ],
    'password' => [
      'required' => 'Kata sandi harus diisi!',
      'min_length' => 'Kata sandi minimal 8 karakter!'
    ],
    'confirm_password' => [
      'required' => 'Kata sandi harus diisi!',
      'matches' => 'Pengulangan kata sandi tidak cocok dengan kata sandi baru!'
    ],
  ];

  public function setDynamicRules(string $rules)
  {
    $this->setValidationRules($this->dynamicRules[$rules]);
  }
}