<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BorrowLogModel;

class Home extends BaseController
{
  protected $borrowLogModel;

  public function __construct()
  {
    $this->borrowLogModel = new BorrowLogModel();
  }

  public function index()
  {
    $data = [
      'pageTitle' => SITE_TITLE,
    ];
    
    return view('admin/home', $data);
  }

  public function daftarSemuaPeminjaman()
  {
    $data = [
      'pageTitle' => 'Daftar Semua Peminjaman' .  SITE_TITLE,
      'borrowData' => $this->borrowLogModel->getAllBorrowLogData(),
      'pager' => $this->borrowLogModel->pager,
    ];

    return view('admin/peminjaman', $data);
  }
}