<?php

namespace App\Models;

use CodeIgniter\Model;

class Admin_Model extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'aid';
    protected $allowedFields = ['password'];
}
