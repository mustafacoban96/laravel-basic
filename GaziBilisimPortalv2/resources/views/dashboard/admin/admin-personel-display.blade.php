@extends('dashboard.admin.layout.admin-dash-layout')

@section('title','Personel Bilgisi')




@section('content')
<div class="card card-danger" style="margin:20px">
    <div class="card-header" style="background-color:rgb(161, 90, 228)">
      <h3 class="card-title">Personel Bilgileri</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form action="{{route('editPersonel',$personel->id)}}" method="POST">
        @csrf
        @method('PUT')
        <h5>Genel Bilgiler</h5>
        <hr>
        <div class="row">
           <div class="col-4">
            @if ($errors->has('tc_num'))
                <span class="text-danger">{{$errors->first('tc_num')}}</span>
            @endif
           </div>
            <div>
                @if ($errors->has('cinsiyet'))
                    <span class="text-danger">{{$errors->first('cinsiyet')}}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="tc_num">TC Kimlik Numarası</label>
                <input type="text" class="form-control" placeholder="TC Kimlik Numarası" name="tc_num" value={{$personel->tc_num}}>
            </div>
            <div class="col-1" style="margin-top:5px;">
                <label for="cinsiyet">Cinsiyet</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio1" name="cinsiyet" value="Kadın" {{$personel->cinsiyet == 'Kadın' ? 'checked' : '' }}>
                    <label for="customRadio1" class="custom-control-label">Kadın</label>
                  </div>
            </div>
            <div class="col-1" style="margin-top:14px">
                <label for="cinsiyet"></label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio2" name="cinsiyet" value="Erkek" {{$personel->cinsiyet == 'Erkek' ? 'checked' : '' }}>
                    <label for="customRadio2" class="custom-control-label">Erkek</label>
                  </div>
            </div>
            
              
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="col-4">
                @if ($errors->has('surname'))
                    <span class="text-danger">{{ $errors->first('surname') }}</span>
                @endif
            </div>
            <div class="col-2" style="margin-left:25px;">
                @if ($errors->has('kan_gurubu'))
                    <span class="text-danger">{{ $errors->first('kan_gurubu') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="isim">İsim</label>
                <input type="text" class="form-control" placeholder="İsim" name="name" value="{{$personel->name}}">
            </div>
            <div class="col-4">
                <label for="isim">Soyisim</label>
                <input type="text" class="form-control" placeholder="Soyisim" name="surname" value="{{$personel->surname}}">
            </div>
            <div class="col-2">
                <label for="blood">Kan Grubu</label>
                <select class="form-control" name="kan_grubu">
                    <option>-</option>
                    <option value="A Rh+" {{ $personel->kan_grubu == 'A Rh+' ? 'selected' : '' }}>A Rh+</option>
                    <option value="A Rh-" {{ $personel->kan_grubu == 'A Rh-' ? 'selected' : '' }}>A Rh-</option>
                    <option value="AB Rh+" {{ $personel->kan_grubu == 'AB Rh+' ? 'selected' : '' }}>AB Rh+</option>
                    <option value="AB Rh-" {{ $personel->kan_grubu == 'AB Rh-' ? 'selected' : '' }}>AB Rh-</option>
                    <option value="B Rh+" {{ $personel->kan_grubu == 'B Rh+' ? 'selected' : '' }}>B Rh+</option>
                    <option value="B Rh-" {{ $personel->kan_grubu == 'B Rh-' ? 'selected' : '' }}>B Rh-</option>
                    <option value="0 Rh+" {{ $personel->kan_grubu == '0 Rh+' ? 'selected' : '' }}>0 Rh+</option>
                    <option value="0 Rh-" {{ $personel->kan_grubu == '0 Rh-' ? 'selected' : '' }}>0 Rh-</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                @if ($errors->has('telefon'))
                    <span class="text-danger">{{ $errors->first('telefon') }}</span>
                @endif
            </div>
            <div class="col-4">
                @if ($errors->has('baba_adı'))
                    <span class="text-danger">{{ $errors->first('baba_adı') }}</span>
                @endif
            </div>
            <div class="col-3" style="margin-left:20px;">
                @if ($errors->has('dogum_tarihi'))
                    <span class="text-danger">{{ $errors->first('dogum_tarihi') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="telefon">Telefon</label>
                <input type="text" class="form-control" placeholder="5xx xxx xx xx" name="telefon" value="{{$personel->telefon}}">
            </div>
            <div class="col-4">
                <label for="baba_adı">Baba adı</label>
                <input type="text" class="form-control" placeholder="Baba adı" name="baba_adı" value="{{$personel->baba_adi}}">
            </div>
            <!-- Date -->
            
            <div class="col-2">
                <label for="dogum_tarihi">Doğum Tarihi</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" name="dogum_tarihi" value="{{$personel->dogum_tarihi}}"/>  
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">
                @if ($errors->has('adres'))
                    <span class="text-danger">{{ $errors->first('adres') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
              <!-- textarea -->
              <div class="form-group">
                <label>Adres</label>
                <textarea class="form-control" rows="3" placeholder="Adres Bilgilerini Giriniz" name="adres">{{$personel->adres}}</textarea>
              </div>
            </div>
        </div>
        <br>
        <h5>İş Yeri ve Çalışma Bilgileri</h5>
        <hr>
        <div class="row">
            <div class="col-3">
                @if ($errors->has('is_yeri_tipi'))
                    <span class="text-danger">{{ $errors->first('is_yeri_tipi') }}</span>
                @endif
            </div>
            <div class="col-3">
                @if ($errors->has('birim_id'))
                    <span class="text-danger">{{ $errors->first('birim_id') }}</span>
                @endif
            </div>
            <div class="col-3">
                @if ($errors->has('meslek_id'))
                    <span class="text-danger">{{ $errors->first('meslek_id') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label for="is_yeri_tipi">İşyeri Tipi</label>
                <select class="form-control" name="is_yeri_tipi">
                    <option></option>
                    <option value="BELEDİYE" {{$personel->is_yeri_tipi == 'BELEDİYE' ? 'selected' : '' }}>BELEDİYE</option>
                    <option value="GASKİ" {{ $personel->is_yeri_tipi == 'GASKİ' ? 'selected' : '' }}>GASKİ</option>
                    <option value="ŞUBE" {{ $personel->is_yeri_tipi == 'ŞUBE' ? 'selected' : '' }}>ŞUBE</option>
                </select>
            </div>
            
            <div class="col-3">
                <label for="birim">Birimi</label>
                <select class="form-control" name="birim_id">
                    {{-- buraya birimleri yerleştir --}}
                    <option></option>
                    @foreach ($birimler as $birim)
                        <option value={{$birim->id}} {{$personel->birim->name.'/'.$personel->is_yeri_tipi == $birim->name.'/'.$birim->is_yeri_type  ? 'selected' : '' }}>{{$birim->name.'/'.$birim->is_yeri_type}}</option>
                    @endforeach
                </select>
            </div>
           
            <div class="col-3">
                <label for="meslek">Mesleği/Görevi</label>
                <select class="form-control" name="meslek_id">
                    {{-- meslekleri yerleştir --}}
                    <option></option>
                    @foreach ($meslekler as $meslek)
                        <option value={{$meslek->id}} {{ $personel->meslek->name == $meslek->name  ? 'selected' : '' }}>{{$meslek->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-3">
                @if ($errors->has('is_giris'))
                    <span class="text-danger">{{ $errors->first('is_giris') }}</span>
                @endif
            </div>
            <div class="col-3">
                @if ($errors->has('maas'))
                    <span class="text-danger">{{ $errors->first('maas') }}</span>
                @endif
            </div>
            <div class="col-3">
                @if ($errors->has('maas_tipi'))
                    <span class="text-danger">{{ $errors->first('maas_tipi') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <!-- Date -->
            <div class="col-3">
                <label for="is_giris">İşe Giriş Tarihi</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" name="is_giris" value="{{$personel->is_giris}}"/>  
                </div>
            </div>
            <div class="col-3">
                <label for="maas">Maaş</label>
                <input type="number" class="form-control" placeholder="0" name="maas" value="{{$personel->maas}}">
            </div>
            <div class="col-1" style="margin-left:30px;margin-top:5px;">
                <label for="maas">Maaş</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio3" name="maas_tipi" value="Net" {{$personel->maas_tipi == 'Net' ? 'checked' : '' }}>
                    <label for="customRadio3" class="custom-control-label">Net</label>
                  </div>
            </div>
            <div class="col-1" style="margin-top:5px;">
                <label for="maas">Tipi</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio4" name="maas_tipi" value="Brüt" {{$personel->maas_tipi == 'Brüt' ? 'checked' : '' }}>
                    <label for="customRadio4" class="custom-control-label">Brüt</label>
                  </div>
            </div>
            
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                @if ($errors->has('ssk_sicil'))
                    <span class="text-danger">{{ $errors->first('ssk_sicil') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <label for="ssk_sicil" style="margin-top:7px">SSK Sicil No</label>
                <input type="text" class="form-control" placeholder="SSK Sicil No" name="ssk_sicil" value="{{$personel->ssk_sicil}}">
            </div>
            <!-- Date -->
            
            <div class="col-3">
                <label for="isten_ayrilma_tarihi" style="margin-top:7px">İşten Ayrılma Tarihi</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" name="is_ayrilma_tarihi" value="{{$personel->is_ayrilma_tarihi}}" disabled/>  
                </div>
            </div>
            <div class="col-4">
                <label for="isten_ayrilma_nedeni"  style="margin-top:7px">İşten Ayrılma Nedeni</label>
                <input type="text" class="form-control" placeholder="İşten Ayrılma Nedeni" name="isten_ayrilma_nedeni" value={{$personel->isten_ayrilma_nedeni}}>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-3">
                <label style="margin-top:7px">Kıdem Tazminatı</label>
                <input type="number" class="form-control" placeholder="Kıdem Tazminatı" name="kidem_tazminati" value={{$personel->kidem_tazminati}}>
            </div>
            <div class="col-3">
                <label style="margin-top:7px">İhbar Tazminatı</label>
                <input type="number" class="form-control" placeholder="İhbar Tazminatı" name="ihbar_tazminati" value={{$personel->yıllık_izin_ücreti}}>
            </div>
            <div class="col-3">
                <label style="margin-top:7px">Yıllık İzin Ücreti</label>
                <input type="number" class="form-control" placeholder="Yıllık İzin Ücreti" name="yıllık_izin_ücreti" value={{$personel->ihbar_tazminati}}>
            </div>
            
        </div>
        <br>
        <div class="row">
            <label for="exampleInputFile">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
        </div>
        <div class="row" style="justify-content: right;">
            <div class="col-1" style="margin-top:20px; margin-right:5px;">
                <button type="submit" class="btn btn-success swalDefaultSuccess">Güncelle</button>
            </div>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
@endsection