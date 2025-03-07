<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $table = 'scores';
    protected $primaryKey = 'sbd'; // Đặt sbd làm khóa chính nếu cần
    public $incrementing = false; // Vì sbd không phải số tự động tăng

    protected $fillable = [
        'sbd', 'toan', 'ngu_van', 'ngoai_ngu', 'vat_li', 'hoa_hoc', 'sinh_hoc',
        'lich_su', 'dia_li', 'gdcd', 'ma_ngoai_ngu'
    ];
}
