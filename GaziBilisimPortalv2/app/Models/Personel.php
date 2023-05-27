<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personel extends Model
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
        'birim_name',
        'job',
        'is_giris',
        'maas',
        'maas_tipi',
        'is_ayrilma_tarihi',
        'isten_ayrilma_nedeni',
        'kidem_tazminati',
        'ihbar_tazminati',
        'yıllık_izin_ücreti',
        'ssk_sicil',
        'status_id'
    ];

    public function status_id(){
        return $this->hasOne(PersonelStatus::class);
    }

    public function meslekler(){
        return $this->hasOne(Meslek::class);
    }

    public function birim_id(){
        return $this->hasOne(Birim::class);
    }
}
