<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
  protected $table = 'borrow_log';
  protected $primaryKey = 'borrow_log_id';
  protected $useAutoIncrement = true;
  protected $createdField = 'reservation_date';

  protected $allowedFields = ['book_id', 'user_id ', 'borrowing_date', 'returning_date', 'status'];
}