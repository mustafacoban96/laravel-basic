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

        
        $validationFails = false;
        $user = $request->validate([
            'kimlik_numarası' => ['required', 'numeric' , 'digits:11', 'unique:personels,tc_num'],
            'cinsiyet' =>['required','string'],
            'isim'=>['required','string','max:255'],
            'soyisim'=>['required','string','max:255'],
            'kan_grubu'=>['required','string','max:255'],
            'telefon'=>['required','numeric','digits:10','unique:personels,telefon'],
            'baba_adı'=>['required','string','max:255'],
            'dogum_tarihi'=>['required','date','date_format:Y-m-d'],
            'adres'=>['required','string','max:255'],
            'is_yeri_tipi'=>['required'],
            'birim_id'=>['required'],
            'meslek_id'=>['required'],
            'is_giris'=>['required'],
            'maas'=>['required','integer'],
            'maas_tipi'=>['required','string'],
            'ssk_sicil'=>['required','numeric','digits:7']
        ]);

        $birim_adı=Birim::all()->where('id',$request->birim_id)->first()->name;
        dd($birim_adı);

        if($validationFails){
            return redirect()->back()->withInput();
        }

        else{
            dd($user);
        }

        
        dd('selam');

        
    }
}
