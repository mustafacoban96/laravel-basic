<?php

namespace App\Http\Controllers;

use App\Models\BirimModel;
use App\Models\FileModel;
use App\Models\MeslekModel;
use App\Models\PersonelModel;
use App\Models\PersonelStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class SuperAdminController extends Controller
{
    public function superIndex(){
        $personelStatus = PersonelStatus::all();
        $personels = PersonelModel::all();
        
        return view('superadmin.super-index',compact('personels','personelStatus'));
    }

    public function showIndividual(Request $request, $id){

        $personel = PersonelModel::find($id);
        $birimler = BirimModel::all();
        $meslekler = MeslekModel::all();
        $files = FileModel::where('personel_id',$id)->get();
        return view('superadmin.super-approve-update',compact('birimler','meslekler','personel','files'));
    }




    public function approveOrUpdatePersonel(Request $request,$id){
        
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
        //dd($request->all());

       
        if($validationFails){
            
            return redirect()->back()->withInput();
        }

        else{
            // dd('selam');
            $personel->update($user);
            //
            $personel->status_id = 1;
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
        return view('superadmin.super-approve-list',compact('personels','personelStatus'));
    }
}
