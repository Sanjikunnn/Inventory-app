<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{
    protected $table = 'suppliers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'contact', 'address', 'phone', 'email'];
    protected $useTimestamps = true; // otomatis handle created_at dan updated_at
}
