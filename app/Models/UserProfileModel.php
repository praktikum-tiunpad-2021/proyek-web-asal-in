<?php

namespace App\Models;

use CodeIgniter\Model;

class UserProfileModel extends Model
{
  protected $table = 'user_profile';
  protected $primaryKey = 'user_id';

  protected $allowedFields = ['user_id', 'name', 'gender', 'date_of_birth', 'address', 'status', 'institution_name', 'phone_number'];
  protected $beforeInsert = ['setNulls'];
  protected $beforeUpdate = ['setNulls'];

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

  public function setNulls($data)
  {
    if (!isset($data['data']['gender'])) $data['data']['gender'] = null;
    if ($data['data']['date_of_birth'] == "") $data['data']['date_of_birth'] = null;
    if ($data['data']['address'] == "") $data['data']['address'] = null;
    if ($data['data']['status'] == "") $data['data']['status'] = null;
    if ($data['data']['institution_name'] == "") $data['data']['institution_name'] = null;
    if ($data['data']['phone_number'] == "") $data['data']['phone_number'] = null;

    return $data;
  }

  public function createUserProfile($id, $data)
  {
    $data['user_id'] = $id;
    $this->insert($data);
  }

  protected $validationRules = [
    'name' => 'required',
    'gender' => 'required',
    'date_of_birth' => 'required|valid_date',
    'address' => 'required',
    'status' => 'required',
    'institution_name' => 'required',
    'phone_number' => 'required'
  ];
}