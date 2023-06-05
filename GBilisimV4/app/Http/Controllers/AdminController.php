<?php

namespace App\Http\Controllers;

use App\Models\BirimModel;
use App\Models\FileModel;
use App\Models\MeslekModel;
use App\Models\PersonelModel;
use App\Models\PersonelStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
    public function adminIndex(){
        $personelStatus = PersonelStatus::all();
        $personels = PersonelModel::all();
        return view('admin.admin-index',compact('personels','personelStatus'));

        
    }
    public function addPersonelPage(){
        $meslekler = MeslekModel::all();
        $birimler = BirimModel::all();
        
        //dd($birimler[0]->name);

        return view('admin.new-record',compact('meslekler','birimler'));
    }


   

    public function newPersonelAdd(Request $request){
        //dd($request->all());
        $validationFails = false;
        $user = $request->validate([
            'tc_num' => ['required', 'numeric' , 'digits:11', 'unique:personels,tc_num'],
            'cinsiyet' =>['required','string'],
            'name'=>['required','string','max:255'],
            'surname'=>['required','string','max:255'],
            'kan_grubu'=>['required','string','max:255'],
            'telefon'=>['required','numeric','digits:10','unique:personels,telefon'],
            'baba_adi'=>['required','string','max:255'],
            'dogum_tarihi'=>['required','date'],
            'adres'=>['required','string','max:255'],
            'isyeri_tipi'=>['required'],
            'birim_id'=>['required'],
            'meslek_id'=>['required'],
            'is_giris'=>['required'],
            'maas'=>['required','integer'],
            'maas_tipi'=>['required','string'],
            'ssk_sicil'=>['required','numeric','digits:7','unique:personels,ssk_sicil'],
            'files' =>['required','array'],
            'files.*' =>['mimes:csv,txt,xls,xlsx,pdf','max:2048']
        ],[],[
            'tc_num' => 'Kimlik Numarası',
            'name' => 'isim',
            'surname' => 'soyisim',
            'files' => 'dosya',
            'files.*' => 'dosya',
            'birim_id' => 'birim',
            'meslek_id' => 'meslek'
        ]);

       
        if($validationFails){
            // dd('selam');
            return redirect()->back()->withInput();
        }
        

        else{
             $personel =PersonelModel::create([
                'tc_num' => $user['tc_num'],
                'cinsiyet' => $user['cinsiyet'],
                'name' => $user['name'],
                'surname' => $user['surname'],
                'kan_grubu' => $user['kan_grubu'],
                'telefon' => $user['telefon'],
                'baba_adi' => $user['baba_adi'],
                'dogum_tarihi' => $user['dogum_tarihi'],
                'adres' => $user['adres'],
                'isyeri_tipi' => $user['isyeri_tipi'],
                'birim_id' => $user['birim_id'],
                'meslek_id' => $user['meslek_id'],
                'is_giris' => $user['is_giris'],
                'maas' => $user['maas'],
                'maas_tipi' => $user['maas_tipi'],
                'ssk_sicil' => $user['ssk_sicil'],
            ]);

            //dd($personel->id);
        
            if($request->hasFile('files')){
                $files = $request->file('files');
                foreach($files as $file){
                    $fileModel = new FileModel;
                    $now = Carbon::now()->timestamp;
                    $fileName = $now.'_'.$file->getClientOriginalName();
                    // $filePath = $file->storeAs('/files/test.',$fileName,'public_path');
                    $fileModel->personel_id = $personel->id;
                    $fileModel->file_name = $fileName;
                    $filePath=Storage::putFileAs('files', $file, $fileName);
                    $fileModel->file_path = $filePath;
                    $fileModel->save();
                }
            }
            return back()->with('success', 'İşlem başarılı');

       
        }
        
    }

    public function showIndividual(Request $request, $id){
        $personel = PersonelModel::find($id);
        $birimler = BirimModel::all();
        $meslekler = MeslekModel::all();
        $files = FileModel::where('personel_id',$id)->get();
        return view('admin.admin-update',compact('birimler','meslekler','personel','files'));
    }

    public function updatePersonel(Request $request,$id){
        $personel = PersonelModel::find($id);
        
        $validationFails = false;
        //dd($request->all());
        $user = $request->validate([
            'tc_num' => ['required', 'numeric' , 'digits:11', Rule::unique('personels')->ignore($personel->id, 'id')],
            'cinsiyet' =>['required','string'],
            'name'=>['required','string','max:255'],
            'surname'=>['required','string','max:255'],
            'kan_grubu'=>['required','string','max:255'],
            'telefon'=>['required','numeric','digits:10',Rule::unique('personels')->ignore($personel->id, 'id')],
            'baba_adi'=>['required','string','max:255'],
            'dogum_tarihi'=>['required','date'],
            'adres'=>['required','string','max:255'],
            'isyeri_tipi'=>['required'],
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
            'yillik_izin_ücreti' => ['nullable','integer'],
            'files' =>['nullable','array'],
            'files.*' =>['mimes:csv,txt,xlx,xlsx,pdf','max:2048']
        ],[],[
            'tc_num' => 'kimlik numarası',
            'name' => 'isim',
            'surname' => 'soyisim',
            'birim_id' => 'birim',
            'meslek_id' => 'meslek',
            'files' => 'dosya',
            'files.*' => 'dosya'
        ]);
        
        
       
        if($validationFails){
            
            return redirect()->back()->withInput();
        }
        else{
            
            $personel->update($user);
            $personel->status_id = 3;
            if($request->hasFile('files')){
                $files = $request->file('files');
                foreach($files as $file){
                    $fileModel = new FileModel;
                    $now = Carbon::now()->timestamp;
                    $fileName = $now.'_'.$file->getClientOriginalName();
                    // $filePath = $file->storeAs('/files/test.',$fileName,'public_path');
                    $fileModel->personel_id = $personel->id;
                    $fileModel->file_name = $fileName;
                    // $fileModel->file_path = $filePath;
                    $filePath = Storage::putFileAs('files', $file, $fileName);
                    $fileModel->file_path = $filePath;
                    $fileModel->save();
                }
            }
            $personel->save();
            return back()->with('success', 'İşlem başarılı');
        }
    }
    public function approvedList(){
        $personels = PersonelModel::all();
        $personelStatus = PersonelStatus::all();
        return view('admin.admin-personel-list',compact('personels','personelStatus'));
    }
}
