<?php

namespace App\Models;

use CodeIgniter\Model;

class Center_Model extends Model
{
    protected $table = 'center';
    protected $primaryKey = 'cid';
    protected $allowedFields = ['center_name', 'center_address', 'phone_no', 'washing_price', 'workers_name'];
}
