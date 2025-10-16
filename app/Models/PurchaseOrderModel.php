<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseOrderModel extends Model
{
    protected $table = 'purchase_orders';
    protected $primaryKey = 'id';
    protected $allowedFields = ['po_number','supplier_id','user_id','total_amount','status','created_at'];
}
