<?php

namespace App\Http\Controllers;

use App\Models\Birim;
use App\Models\Meslek;
use App\Models\Personel;
use App\Models\PersonelStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SuperAdminController extends Controller
{
    public function index(){
        $personelStatus = PersonelStatus::all();
        $personels = Personel::all();
        return view('dashboard.superadmin.index',compact('personels','personelStatus'));
    }


    public function showIndividual(Personel $personel){
        $personel_id = $personel->id;
        $personel = Personel::find($personel_id);
        $birimler = Birim::all();
        $meslekler = Meslek::all();
        return view('dashboard.superadmin.personel-display',compact('birimler','meslekler','personel'));
    }

    public function approveOrUpdate(Request $request, $id){
        $personel = Personel::find($id);
        $validationFails = false;
        $user = $request->validate([
            'tc_num' => ['required', 'numeric' , 'digits:11', Rule::unique('personels')->ignore($personel->id, 'id')],
            'cinsiyet' =>['required','string'],
            'name'=>['required','string','max:255'],
            'surname'=>['required','string','max:255'],
            'kan_grubu'=>['required','string','max:255'],
            'telefon'=>['required','numeric','digits:10',Rule::unique('personels')->ignore($personel->id, 'id')],
            'baba_adı'=>['required','string','max:255'],
            'dogum_tarihi'=>['required','date'],
            'adres'=>['required','string','max:255'],
            'is_yeri_tipi'=>['required'],
            'birim_id'=>['required'],
            'meslek_id'=>['required'],
            'is_giris'=>['required'],
            'maas'=>['required','integer'],
            'maas_tipi'=>['required','string'],
            'ssk_sicil'=>['required','numeric','digits:7',Rule::unique('personels')->ignore($personel->id, 'id')],
            'is_ayrilma_tarihi' => ['nullable','date'],
            'isten_ayrilma_nedeni' => ['nullable','string'],
            'kidem_tazminati' => ['nullable','integer'],
            'ihbar_tazminati' => ['nullable','integer'],
            'yıllık_izin_ücreti' => ['nullable','integer'],
        ],[],[
            'tc_num' => 'kimlik numarası',
            'name' => 'isim',
            'surname' => 'surname'
        ]);
        

        if($validationFails){
            return redirect()->back()->withInput();
        }

        $personel->update($user);
        $personel->status_id = 1;
        
        $personel->save();
        
        return back()->with('success', 'İşlem başarılıdır');
    }


    public function approvedPersonal(){
        $personels = Personel::all();
        $personelStatus = PersonelStatus::all();
        
        return view('dashboard.superadmin.super-personal-table',compact('personels','personelStatus'));
    }
}
