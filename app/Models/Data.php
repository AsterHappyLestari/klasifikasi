<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'tb_data';
    protected $primaryKey = 'id_data';
    protected $fillable = ['nama','tanggungan','pekerjaan','penghasilan','pengeluaran','pendidikan'];
    public $timestamps = false;

    public function hasil()
    {
        return $this->hasOne(Hasil::class, 'data_id', 'id_data');
    }

}
