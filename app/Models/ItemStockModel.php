<?php

namespace App\Models;

use CodeIgniter\Model;

class ItemStockModel extends Model
{
    protected $table      = 'item_stocks';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'item_id',
        'warehouse_id',
        'qty'
    ];

    // Nggak pakai timestamps karena di migrasi nggak ada created_at/updated_at
    protected $useTimestamps = false;
}
