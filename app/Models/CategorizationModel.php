<?php

namespace App\Models;

use CodeIgniter\Model;

class CategorizationModel extends Model
{
  protected $table = 'categorization';

  protected $allowedFields = ['category_id', 'book_id'];

  public function insertCategories($bookId, $categoryIds)
  {
    $this->where('book_id', $bookId)->delete();

    foreach($categoryIds as $categoryId){
      $this->insert(['book_id' => $bookId, 'category_id' => $categoryId]);
    }
  }

  public function getCategories($bookId)
  {
    return $this->where('book_id', $bookId)->findColumn('category_id');
  }

  public function getCategoryNames($bookId)
  {
    $arr = $this->join('category', 'category.category_id = categorization.category_id', 'left')
                ->select('category.name')
                ->where('book_id', $bookId)
                ->findAll();

    $string = '';
    foreach ($arr as $index => $item){
      $string .= ', ' . $item['name'];
    }

    return substr($string, 2);
  }
}