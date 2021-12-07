<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BookModel;
use App\Models\CategorizationModel;
use App\Models\CategoryModel;

class BookController extends BaseController
{
  protected $bookModel;
  protected $categoryModel;
  protected $categorizationModel;

  public function __construct()
  {
    $this->bookModel = new BookModel();
    $this->categoryModel = new CategoryModel();
    $this->categorizationModel = new CategorizationModel();
  }

  public function katalog()
  {
    $data = [
      'pageTitle' => 'Katalog | ' . SITE_TITLE,
      'books' => $this->bookModel->paginate(20),
      'pager' => $this->bookModel->pager
    ];

    if ($this->request->getGet('keyword')){
      $data['books'] = $this->bookModel->getBookDataByKeyword($this->request->getGet('keyword'));
      $data['keyword'] = $this->request->getGet('keyword');
    }


    return view('admin/buku/katalog', $data);
  }

  public function tambahBuku()
  {
    $data = [
      'pageTitle' => 'Tambah Buku | ' . SITE_TITLE,
      'categories' => $this->categoryModel->findAll(),
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

    $id = $this->bookModel->insert($this->request->getPost());
    $this->categorizationModel->insertCategories($id, $this->request->getPost('categories'));
    return redirect()->to('admin/buku/katalog');
  }

  public function ubahBuku($id)
  {
    $data = [
      'pageTitle' => 'Ubah Buku | ' . SITE_TITLE,
      'bookData' => $this->bookModel->find($id),
      'categories' => $this->categoryModel->findAll(),
      'errors' => \Config\Services::validation(),
    ];
    $data['bookData']['categories'] = $this->categorizationModel->getCategories($id);

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
    $this->categorizationModel->insertCategories($id, $this->request->getVar('categories'));
    return redirect()->to('admin/buku/katalog');
  }
}