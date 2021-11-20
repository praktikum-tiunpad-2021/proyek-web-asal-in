<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
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

    return view('admin/buku/katalog', $data);
  }

  public function tambahBuku()
  {
    $data = [
      'pageTitle' => 'Tambah Buku | ' . SITE_TITLE,
      'errors' => \Config\Services::validation(),
    ];
    return view('admin/buku/tambah', $data);
  }

  public function addBook()
  {
    $rules = $this->bookModel->getValidationRules();
    $messages = $this->bookModel->getValidationMessages();

    if (!$this->validate($rules, $messages)) {
      return redirect()->back()->withInput();
    }

    $this->bookModel->insert($this->request->getPost());
    return redirect()->to('admin/buku/katalog');
  }

  public function ubahBuku($id = 1)
  {
    $data = [
      'pageTitle' => 'Ubah Buku | ' . SITE_TITLE,
      'bookData' => $this->bookModel->find($id),
      'errors' => \Config\Services::validation(),
    ];

    return view('admin/buku/ubah', $data);
  }

  public function changeBook($id)
  {
    $rules = $this->bookModel->getValidationRules();
    $messages = $this->bookModel->getValidationMessages();

    if (!$this->validate($rules, $messages)) {
      return redirect()->back()->withInput();
    }

    $this->bookModel->update($id, $this->request->getVar());
    return redirect()->to('admin/buku/katalog');
  }
}