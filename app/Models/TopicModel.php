<?php
namespace App\Models;

use CodeIgniter\Model;

class TopicModel extends Model
{
    protected $table = 'topics';
    protected $primaryKey = 'id';
    protected $allowedFields = ['title', 'category', 'is_done'];
    protected $useTimestamps = false;
}