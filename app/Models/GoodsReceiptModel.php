<?php

namespace App\Models;

use CodeIgniter\Model;

class GoodsReceiptModel extends Model
{
    protected $table = 'goods_receipts';
    protected $primaryKey = 'id';
    protected $allowedFields = ['grn_number', 'po_id', 'approved_by', 'status', 'created_at'];
    protected $useTimestamps = false;
}
