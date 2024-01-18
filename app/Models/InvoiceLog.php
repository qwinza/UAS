<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'invoice_id',
        'qty',
        'total'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function save(array $options = [])
    {
        // Hapus validasi batasan qty
        // if ($this->qty > 1000) {
        //     throw new \Exception('Jumlah barang tidak boleh lebih dari 1000.');
        // }

        parent::save($options);
    }
}
