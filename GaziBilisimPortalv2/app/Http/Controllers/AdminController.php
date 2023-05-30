<?php

namespace App\Http\Controllers;

use App\Models\Birim;
use App\Models\Meslek;
use App\Models\Personel;
use App\Models\PersonelStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function index(){
        $personelStatus = PersonelStatus::all();
        $personels = Personel::all();
        return view('dashboard.admin.index',compact('personels','personelStatus'));
    }




    public function personelShow(){
        $personelStatus = PersonelStatus::all();
        $personels = Personel::all();
        return view('dashboard.admin.personel-table' ,compact('personels','personelStatus'));
    }


    public function personelAddIndex(){

        $birimler = Birim::all();
        $meslekler = Meslek::all();
        return view('dashboard.admin.add-personel',compact('birimler','meslekler'));
    }




    public function personelStore(Request $request){

        $validationFails = false;
        $user = $request->validate([
            'tc_num' => ['required', 'numeric' , 'digits:11', 'unique:personels,tc_num'],
            'cinsiyet' =>['required','string'],
            'name'=>['required','string','max:255'],
            'surname'=>['required','string','max:255'],
            'kan_grubu'=>['required','string','max:255'],
            'telefon'=>['required','numeric','digits:10','unique:personels,telefon'],
            'baba_adı'=>['required','string','max:255'],
            'dogum_tarihi'=>['required','date'],
            'adres'=>['required','string','max:255'],
            'is_yeri_tipi'=>['required'],
            'birim_id'=>['required'],
            'meslek_id'=>['required'],
            'is_giris'=>['required'],
            'maas'=>['required','integer'],
            'maas_tipi'=>['required','string'],
            'ssk_sicil'=>['required','numeric','digits:7']
        ],[],[
            'tc_num' => 'Kimlik Numarası',
            'name' => 'isim',
            'surname' => 'soyisim'
        ]);
        
       
        if($validationFails){
            return redirect()->back()->withInput();
        }

        else{
            Personel::create([
                'tc_num' => $user['tc_num'],
                'cinsiyet' => $user['cinsiyet'],
                'name' => $user['name'],
                'surname' => $user['surname'],
                'kan_grubu' => $user['kan_grubu'],
                'telefon' => $user['telefon'],
                'baba_adi' => $user['baba_adı'],
                'dogum_tarihi' => $user['dogum_tarihi'],
                'adres' => $user['adres'],
                'is_yeri_tipi' => $user['is_yeri_tipi'],
                'birim_id' => $user['birim_id'],
                'meslek_id' => $user['meslek_id'],
                'is_giris' => $user['is_giris'],
                'maas' => $user['maas'],
                'maas_tipi' => $user['maas_tipi'],
                'ssk_sicil' => $user['ssk_sicil'],
            ]);
            return back()->with('success', 'İşlem başarılıdır');
        }
        
    }

    public function showIndividual(Personel $personel){
        $personel_id = $personel->id;
        $personel = Personel::find($personel_id);
        $birimler = Birim::all();
        $meslekler = Meslek::all();
        return view('dashboard.admin.admin-personel-display',compact('birimler','meslekler','personel'));
    }


    public function updatePersonel(Request $request, $id){
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
        $personel->status_id = 3;
        
        $personel->save();
        
        return back()->with('success', 'İşlem başarılıdır');
    }
}
