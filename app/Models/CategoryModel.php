<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
  protected $table = 'category';
  protected $primaryKey = 'category_id';
  protected $useAutoIncrement = true;

  protected $allowedFields = ['name'];

  protected $validationRules = [
    'name' => 'required',
  ];

  protected $validationMessages = [
    'name' => [
      'required' => 'Nama kategori harus diisi!',
    ],
  ];
}