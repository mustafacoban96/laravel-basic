@extends('dashboard.admin.layout.admin-dash-layout')

@section('title','Personel Listesi')


@section('content')
  <div class="card card-danger" style="margin:20px">
    <div class="card-header" style="background-color:rgb(161, 90, 228)">
      <h3 class="card-title">Personel Bilgileri</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form action="{{route('perEkle')}}" method="POST">
        @csrf
        <h5>Genel Bilgiler</h5>
        <hr>
        <div class="row">
           <div class="col-4">
            @if ($errors->has('tc_num'))
                <span class="text-danger">{{ $errors->first('tc_num') }}</span>
            @endif
           </div>
            <div>
                @if ($errors->has('cinsiyet'))
                    <span class="text-danger">{{ $errors->first('cinsiyet') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="tc_num">TC Kimlik Numarası</label>
                <input type="text" class="form-control" placeholder="TC Kimlik Numarası" name="tc_num" value={{old('tc_num')}}>
            </div>
            <div class="col-1" style="margin-top:5px">
                <label for="cinsiyet">Cinsiyet</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio1" name="cinsiyet" value="Kadın" {{old('cinsiyet') == 'Kadın' ? 'checked' : '' }}>
                    <label for="customRadio1" class="custom-control-label">Kadın</label>
                  </div>
            </div>
            <div class="col-1" style="margin-top:14px">
                <label for="cinsiyet"></label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" type="radio" id="customRadio2" name="cinsiyet" value="Erkek" {{old('cinsiyet') == 'Erkek' ? 'checked' : '' }}>
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
                <input type="text" class="form-control" placeholder="İsim" name="name" value="{{old('name')}}">
            </div>
            <div class="col-4">
                <label for="isim">Soyisim</label>
                <input type="text" class="form-control" placeholder="Soyisim" name="surname" value="{{old('surname')}}">
            </div>
            
            <div class="col-2">
                <label for="blood">Kan Grubu</label>
                <select class="form-control" name="kan_grubu">
                    <option>-</option>
                    <option value="A Rh+" {{ old('kan_grubu') == 'A Rh+' ? 'selected' : '' }}>A Rh+</option>
                    <option value="A Rh-" {{ old('kan_grubu') == 'A Rh-' ? 'selected' : '' }}>A Rh-</option>
                    <option value="AB Rh+" {{ old('kan_grubu') == 'AB Rh+' ? 'selected' : '' }}>AB Rh+</option>
                    <option value="AB Rh-" {{ old('kan_grubu') == 'AB Rh-' ? 'selected' : '' }}>AB Rh-</option>
                    <option value="B Rh+" {{ old('kan_grubu') == 'B Rh+' ? 'selected' : '' }}>B Rh+</option>
                    <option value="B Rh-" {{ old('kan_grubu') == 'B Rh-' ? 'selected' : '' }}>B Rh-</option>
                    <option value="0 Rh+" {{ old('kan_grubu') == '0 Rh+' ? 'selected' : '' }}>0 Rh+</option>
                    <option value="0 Rh-" {{ old('kan_grubu') == '0 Rh-' ? 'selected' : '' }}>0 Rh-</option>
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
            <div class="col-3">
                @if ($errors->has('dogum_tarihi'))
                    <span class="text-danger">{{ $errors->first('dogum_tarihi') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <label for="telefon">Telefon</label>
                <input type="text" class="form-control" placeholder="5xx xxx xx xx" name="telefon" value="{{old('telefon')}}">
            </div>
            <div class="col-4">
                <label for="baba_adı">Baba adı</label>
                <input type="text" class="form-control" placeholder="Baba adı" name="baba_adı" value="{{old('baba_adı')}}">
            </div>
            <!-- Date -->
            
            <div class="col-2">
                <label for="dogum_tarihi">Doğum Tarihi</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" name="dogum_tarihi" value="{{old('dogum_tarihi')}}"/>  
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
                <textarea class="form-control" rows="3" placeholder="Adres Bilgilerini Giriniz" name="adres">{{old('adres')}}</textarea>
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
                    <option value="BELEDİYE" {{ old('is_yeri_tipi') == 'BELEDİYE' ? 'selected' : '' }}>BELEDİYE</option>
                    <option value="GASKİ" {{ old('is_yeri_tipi') == 'GASKİ' ? 'selected' : '' }}>GASKİ</option>
                    <option value="ŞUBE" {{ old('is_yeri_tipi') == 'ŞUBE' ? 'selected' : '' }}>ŞUBE</option>
                </select>
            </div>
            
            <div class="col-3">
                <label for="birim">Birimi</label>
                <select class="form-control" name="birim_id">
                    {{-- buraya birimleri yerleştir --}}
                    <option></option>
                    @foreach ($birimler as $birim)
                        <option value={{$birim->id}} {{(old('birim_id') == $birim->id) ? 'selected' : ''}}>{{$birim->name . "/" . $birim->is_yeri_type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <label for="meslek">Mesleği/Görevi</label>
                <select class="form-control" name="meslek_id">
                    {{-- meslekleri yerleştir --}}
                    <option></option>
                    @foreach ($meslekler as $meslek)
                        <option value={{$meslek->id}} {{ old('meslek_id') == $meslek->id  ? 'selected' : '' }}>{{$meslek->name}}</option>
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
            <div class=col-3>
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
                    <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" name="is_giris" value="{{old('is_giris')}}"/>  
                </div>
            </div>
            
            <div class="col-3">
                <label for="maas">Maaş</label>
                <input type="number" class="form-control" placeholder="0" name="maas" value="{{old('maas')}}">
            </div>
            <div class="col-1">
                <label for="maas" style="margin-left:25px;margin-top:5px;">Maaş</label>
                <div class="custom-control custom-radio" style="margin-left: 20px; margin-top:5px;">
                    <input class="custom-control-input" type="radio" id="customRadio3" name="maas_tipi" value="Net" {{old('maas_tipi') == 'Net' ? 'checked' : '' }}>
                    <label for="customRadio3" class="custom-control-label">Net</label>
                  </div>
            </div>
           <div class="col-1">
            <label for="maas" style="margin-left:25px;margin-top:5px;">Tipi</label>
                <div class="custom-control custom-radio" style="margin-left:20px; margin-top:5px;">
                    <input class="custom-control-input" type="radio" id="customRadio4" name="maas_tipi" value="Brüt" {{old('maas_tipi') == 'Brüt' ? 'checked' : '' }}>
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
            <div class="col-4">
                <label for="ssk_sicil">SSK Sicil No</label>
                <input type="text" class="form-control" placeholder="SSK Sicil No" name="ssk_sicil" value="{{old('ssk_sicil')}}">
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
                <button type="submit" class="btn btn-success swalDefaultSuccess">Kaydet</button>
            </div>
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  
@endsection