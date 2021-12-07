<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\CategoryModel;

class CategoryController extends BaseController
{
  protected $categoryModel;

  public function __construct()
  {
    $this->categoryModel = new CategoryModel();
  }

  public function index()
  {
    $data = [
      'pageTitle' => 'Kelola Kategori | ' . SITE_TITLE,
      'categories' => $this->categoryModel->findAll(),
    ];

    return view('admin/kategori/home', $data);
  }

  public function tambahKategori()
  {
    $data = [
      'pageTitle' => 'Tambah Buku | ' . SITE_TITLE,
      'errors' => \Config\Services::validation(),
    ];
    return view('admin/kategori/tambah', $data);
  }

  public function addCategory()
  {
    $rules = $this->categoryModel->getValidationRules();
    $messages = $this->categoryModel->getValidationMessages();

    if (!$this->validate($rules, $messages)) {
      return redirect()->back()->withInput();
    }

    $this->categoryModel->insert($this->request->getPost());
    return redirect()->to('admin/kategori');
  }

  public function ubahKategori($id)
  {
    $data = [
      'pageTitle' => 'Ubah Buku | ' . SITE_TITLE,
      'categoryData' => $this->categoryModel->find($id),
      'errors' => \Config\Services::validation(),
    ];

    return view('admin/kategori/ubah', $data);
  }

  public function changeCategory($id)
  {
    $rules = $this->categoryModel->getValidationRules();
    $messages = $this->categoryModel->getValidationMessages();

    if (!$this->validate($rules, $messages)) {
      return redirect()->back()->withInput();
    }

    $this->categoryModel->update($id, $this->request->getVar());
    return redirect()->to('admin/kategori');
  }
}