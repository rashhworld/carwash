<?php

namespace App\Models;

use CodeIgniter\Model;

class Users_Model extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'uid';
    protected $allowedFields = ['email_id', 'phone_number', 'password'];
}
