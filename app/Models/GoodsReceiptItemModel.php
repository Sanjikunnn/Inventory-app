<?php

namespace App\Models;

use CodeIgniter\Model;

class GoodsReceiptItemModel extends Model
{
    protected $table      = 'goods_receipt_items';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'grn_id',
        'item_id',
        'warehouse_id',
        'qty'
    ];

    // Timestamps nggak dipake karena migrasi lo cuma ada created_at di goods_receipts
    protected $useTimestamps = false;
}
