<?php

namespace App\Models;

use CodeIgniter\Model;

class UserProfileModel extends Model
{
  protected $table = 'user_profile';
  protected $primaryKey = 'user_id';

  protected $allowedFields = ['user_id', 'name', 'gender', 'date_of_birth', 'address', 'status', 'institution_name', 'phone_number'];

  protected $dynamicRules = [
    'signup' => [
      'name' => 'required'
    ]
  ];

  protected $validationMessages = [
    'name' => [
      'required' => 'Nama harus diisi!',
    ]
  ];

  public function setDynamicRules(string $rules)
  {
    $this->setValidationRules($this->dynamicRules[$rules]);
  }

  public function createUserProfile($id, $data)
  {
    $data['user_id'] = $id;
    $this->setValidationRules([]);
    $this->insert($data);
  }
}