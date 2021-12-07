<?php

namespace App\Controllers;
use App\Models\BookModel;
use App\Models\BorrowLogModel;
use App\Models\CategorizationModel;

class BookController extends BaseController
{
  protected $bookModel;
  protected $borrowLogModel;
  protected $categorizationModel;

  public function __construct()
  {
    $this->bookModel = new BookModel();
    $this->borrowLogModel = new BorrowLogModel();
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
    $data['bookData']['categories'] = $this->categorizationModel->getCategoryNames($id);
    return view('buku/detail', $data);
  }

  public function pinjam($id)
  {
    $bookData = $this->bookModel->find($id);
    if (!$bookData || $bookData['status'] == 'UNAVAILABLE' || $bookData['status'] == 'BORROWED')
      return view('errors/html/error_404');

    $borrowData = $this->borrowLogModel
                       ->where(['book_id' => $id, 
                                'user_id' => session()->userData['user_id'],
                                'status' => 'BOOKED'
                              ])
                       ->findAll();

    if ($borrowData) return redirect()->back()->with('error', 'Kamu telah memesan buku ini!');

    $this->borrowLogModel->insert([
      'book_id' => $id,
      'user_id' => session()->userData['user_id'],
      'status' => 'BOOKED',
    ]);
    $this->bookModel->update($id, ['status' => 'BOOKED']);

    return redirect()->back()->with('success', 'Berhasil memesan buku!');
  }
};