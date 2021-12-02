<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
  protected $table = 'user';
  protected $primaryKey = 'user_id';
  protected $useAutoIncrement = true;

  protected $allowedFields = ['email', 'password', 'role'];
  protected $beforeInsert = ['hashPassword'];
  protected $beforeUpdate = ['hashPassword'];

  protected $dynamicRules = [
    'login' => [
      'email' => 'required',
      'password' => 'required'
    ],
    'signup' => [
      'email' => 'required|is_unique[user.email]|valid_email',
      'password' => 'required|min_length[8]',
      'confirm_password' => 'required|matches[password]'
    ],
    'update' => [
      'old_password' => 'required|min_length[8]',
      'email' => 'is_unique[user.email]',
      'password' => 'permit_empty|min_length[8]',
      'confirm_password' => 'matches[password]'
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
    'old_password' => [
      'required' => 'Kata sandi lama harus diisi!',
      'min_length' => 'Kata sandi lama minimal 8 karakter!'
    ],
    'password' => [
      'required' => 'Kata sandi harus diisi!',
      'min_length' => 'Kata sandi minimal 8 karakter!'
    ],
    'confirm_password' => [
      'required' => 'Pengulangan kata sandi harus diisi!',
      'matches' => 'Pengulangan kata sandi tidak cocok dengan kata sandi baru!'
    ],
  ];

  public function setDynamicRules(string $rules)
  {
    $this->setValidationRules($this->dynamicRules[$rules]);
  }

  protected function hashPassword(array $data)
  {
    if (isset($data['data']['password']))
      $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

    return $data;
  }

  public function createUser($data)
  {
    $this->setValidationRules([]);
    return $this->insert($data);
  }
}