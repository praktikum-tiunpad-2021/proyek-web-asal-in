<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BookModel;
use App\Models\BorrowLogModel;
use CodeIgniter\I18n\Time;

class BorrowController extends BaseController
{
  protected $borrowLogModel;
  protected $bookModel;

  public function __construct()
  {
    $this->borrowLogModel = new BorrowLogModel();
    $this->bookModel = new BookModel();
  }

  public function index()
  {
    $data = [
      'pageTitle' => 'Daftar Semua Peminjaman | ' .  SITE_TITLE,
      'borrowData' => $this->borrowLogModel->getAllBorrowLogData(),
      'pager' => $this->borrowLogModel->pager,
    ];

    return view('admin/peminjaman', $data);
  }

  public function borrow($id)
  {
    $borrowItem = $this->borrowLogModel->find($id);
    if (!$borrowItem || $borrowItem['status'] != 'BOOKED') return view('errors/html/error_404');

    $book = $this->bookModel->find($borrowItem['book_id']);
    if ($book) {
      if ($book['status'] == 'BORROWED') return redirect()->back()->with('error', 'Buku sedang dipinjam!');
      if ($book['status'] == 'UNAVAILABLE') return redirect()->back()->with('error', 'Buku sedang tidak tersedia!');
    }

    $this->borrowLogModel->update($id, ['status' => 'IN_PROGRESS', 'borrowing_date' => Time::now()]);
    $this->bookModel->update($book['book_id'], ['status' => 'BORROWED']);
    return redirect()->back()->with('success', 'Berhasil meminjamkan buku!');
  }

  public function cancel($id)
  {
    $borrowItem = $this->borrowLogModel->find($id);
    if (!$borrowItem || $borrowItem['status'] != 'BOOKED') return view('errors/html/error_404');
    $this->borrowLogModel->update($id, ['status' => 'DECLINED']);

    $bookBorrowData = $this->borrowLogModel->where(['book_id' => $borrowItem['book_id'], 'status' => 'BOOKED'])->first();
    if ($bookBorrowData) $this->bookModel->update($borrowItem['book_id'], ['status' => 'BOOKED']);
    else $this->bookModel->update($borrowItem['book_id'], ['status' => 'AVAILABLE']);

    return redirect()->back()->with('success', 'Berhasil membatalkan pemesanan buku!');
  }

  public function return($id)
  {
    $borrowItem = $this->borrowLogModel->find($id);
    if (!$borrowItem || $borrowItem['status'] != 'IN_PROGRESS') return view('errors/html/error_404'); 

    $this->borrowLogModel->update($id, ['status' => 'RETURNED', 'returning_date' => Time::now()]);

    $bookBorrowData = $this->borrowLogModel->where(['book_id' => $borrowItem['book_id'], 'status' => 'BOOKED'])->first();
    if ($bookBorrowData) $this->bookModel->update($borrowItem['book_id'], ['status' => 'BOOKED']);
    else $this->bookModel->update($borrowItem['book_id'], ['status' => 'AVAILABLE']);

    return redirect()->back()->with('success', 'Berhasil mengembalikan buku!');
  }
}