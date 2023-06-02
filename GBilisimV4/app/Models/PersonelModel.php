<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonelModel extends Model
{
    use HasFactory;

    protected $table = 'personels';

    protected $fillable = [
        'tc_num',
        'cinsiyet',
        'name',
        'surname',
        'kan_grubu',
        'telefon',
        'baba_adi',
        'dogum_tarihi',
        'adres',
        'isyeri_tipi',
        'birim_id',
        'meslek_id',
        'is_giris',
        'maas',
        'maas_tipi',
        'is_ayrilma_tarihi',
        'isten_ayrilma_nedeni',
        'kidem_tazminati',
        'ihbar_tazminati',
        'yillik_izin_ücreti',
        'ssk_sicil',
        'status_id'
    ];

    public $timestamps = true;
    public function status_id(){
        return $this->hasOne(PersonelStatus::class);
    }

    public function meslek(){
        return $this->belongsTo(Meslek::class, 'meslek_id', 'id');
    }
    public function birim(){
        return $this->belongsTo(Birim::class, 'birim_id','id');
    }

    
}
