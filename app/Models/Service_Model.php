<?php

namespace App\Models;

use CodeIgniter\Model;

class Service_Model extends Model
{
    protected $table = 'service';
    protected $primaryKey = 'sid';
    protected $allowedFields = ['email_id', 'center_name', 'center_address', 'phone_no', 'washing_price', 'workers_name'];
}
