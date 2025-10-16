<?php

namespace App\Models;

use CodeIgniter\Model;

class PurchaseOrderItemModel extends Model
{
    protected $table = 'purchase_order_items';
    protected $primaryKey = 'id';
    protected $allowedFields = ['po_id','item_id','warehouse_id','qty','price','subtotal'];
}
