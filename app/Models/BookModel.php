<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
  protected $table = 'book';
  protected $primaryKey = 'book_id';
  protected $useAutoIncrement = true;

  protected $allowedFields = ['isbn', 'title', 'author', 'publisher', 'publication_date', 'pages', 'status'];

  protected $validationRules = [
    'isbn' => 'required',
    'title' => 'required',
    'author' => 'required',
    'publisher' => 'required',
    'publication_date' => 'required|valid_date',
    'pages' => 'required|numeric',
    'status' => 'required',
  ];

  protected $validationMessages = [
    'isbn' => [
      'required' => 'ISBN harus diisi!',
    ],
    'title' => [
      'required' => 'Judul buku harus diisi!',
    ],
    'author' => [
      'required' => 'Nama pengarang harus diisi!',
    ],
    'publisher' => [
      'required' => 'Nama penerbit harus diisi!',
    ],
    'publication_date' => [
      'required' => 'Tanggal terbit harus diisi!',
    ],
    'pages' => [
      'required' => 'Jumlah halaman harus diisi!',
    ],
  ];
}