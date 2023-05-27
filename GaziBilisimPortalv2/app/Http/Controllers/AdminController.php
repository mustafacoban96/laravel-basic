<?php

namespace App\Http\Controllers;

use App\Models\Birim;
use App\Models\Meslek;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('dashboard.admin.index');
    }




    public function personelShow(){
        return view('dashboard.admin.personel-table');
    }


    public function personelAddIndex(){

        $birimler = Birim::all();
        $meslekler = Meslek::all();
       

        return view('dashboard.admin.add-personel',compact('birimler','meslekler'));
    }




    public function personelStore(Request $request){
        // dd('selam');
        // $formData = $request->all();
        // dd($formData);
        $user = $request->validate([
            'tc_num' => ['required', 'numeric' , 'size:11', 'unique:personels,tc_num'],
            'cinsiyet' =>['required','string'],
            'name'=>['required','string','max:255'],
            'surname'=>['required','string','max:255'],
            'kan_grubu'=>['required','string','max:255'],
            'telefon'=>['required','numeric','size:12','unique:personels,telefon'],
            'baba_adi'=>['required','string','max:255'],
            'dogum_tarihi'=>['required','date','date_format:Y-m-d'],
            'adres'=>['required','string','max:255'],
            'is_yeri_tipi'=>['required','string','max:255'],
            'birim_id'=>['required','integer'],
            'meslek_id'=>['required','integer'],
            'is_giris'=>['required'],
            'maas'=>['required','integer'],
            'maas_tipi'=>['required','string'],
            'ssk_sicil'=>['required','numeric','size:7']
        ]);

        dd($user);
        dd('selam');

        
    }
}
