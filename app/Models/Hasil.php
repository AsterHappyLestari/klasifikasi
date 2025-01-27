<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    // use HasFactory;

    protected $table = 'tb_hasil';
    protected $primaryKey = 'id_hasil';
    public $timestamps = false;
    protected $fillable = [
        'data_id', 'nama','tanggungan','pekerjaan','penghasilan','pengeluaran','pendidikan','status'
    ];

    public function data()
    {
        return $this->belongsTo(Data::class, 'data_id','id_data');
    }
}
