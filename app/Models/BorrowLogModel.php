<?php

namespace App\Models;

use CodeIgniter\Model;

class BorrowLogModel extends Model
{
  protected $table = 'borrow_log';
  protected $primaryKey = 'borrow_log_id';
  protected $useAutoIncrement = true;
  protected $createdField = 'reservation_date';

  protected $allowedFields = ['book_id', 'user_id ', 'borrowing_date', 'returning_date', 'status'];

  public function getBorrowLogData($id)
  {
    return $this->join('user_profile', 'borrow_log.user_id = user_profile.user_id', 'left')
                ->select('user_profile.name as name, borrowing_date, returning_date, borrow_log.status as status')
                ->where(['book_id' => $id, 'borrow_log.status !=' => 'DECLINED'])
                ->findAll();
  }
}