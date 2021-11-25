<?php

namespace App\Controllers;
use App\Models\BookModel;
use App\Models\BorrowLogModel;

class BookController extends BaseController
{
  protected $bookModel;
  protected $borrowLogModel;

  public function __construct()
  {
    $this->bookModel = new BookModel();
    $this->borrowLogModel = new BorrowLogModel();
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
      'pageTitle' => $bookData['title'] . ' | ' . SITE_TITLE,
      'borrowData' => $this->borrowLogModel->getBorrowLogData($id),
    ];
    return view('buku/detail', $data);
  }

  public function pinjam($id)
  {
    $this->borrowLogModel->insert([
      'book_id' => $id,
      'user_id' => session()->userData['user_id'],
      'status' => 'BOOKED',
    ]);
    $this->bookModel->update($id, ['status' => 'BOOKED']);

    return redirect()->back();
  }
};