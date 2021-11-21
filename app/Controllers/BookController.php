<?php

namespace App\Controllers;
use App\Models\BookModel;

class BookController extends BaseController
{
  protected $bookModel;

  public function __construct()
  {
    $this->bookModel = new BookModel();
  }

  public function katalog()
  {
    $data = [
      'pageTitle' => 'Katalog | ' . SITE_TITLE,
      'books' => $this->bookModel->findAll(),
    ];

    return view('buku/katalog', $data);
  }

  public function detail($id)
  {
    $bookData = $this->bookModel->find($id);
    if (!$bookData) return view('errors/html/error_404');

    $data = [
      'bookData' => $bookData,
      'pageTitle' => $bookData['name'] . ' | ' . SITE_TITLE,
    ];
    return view('buku/detail', $data);
  }
};