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
            @if ($errors->has('kimlik_numarası'))
                <span class="text-danger">{{ $errors->first('kimlik_numarası') }}</span>
            @endif
           </div>
            <div style="margin-left: 30px;">
                @if ($errors->has('cinsiyet'))
                    <span class="text-danger">{{ $errors->first('cinsiyet') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <input type="text" class="form-control" placeholder="TC Kimlik Numarası" name="kimlik_numarası" value={{old('kimlik_numarası')}}>
            </div>
            <div class="custom-control custom-radio" style="margin-left: 30px; margin-top:5px;">
                <input class="custom-control-input" type="radio" id="customRadio1" name="cinsiyet" value="Kadın" value="{{old('cinsiyet')}}">
                <label for="customRadio1" class="custom-control-label">Kadın</label>
              </div>
              <div class="custom-control custom-radio" style="margin-left: 30px; margin-top:5px;">
                <input class="custom-control-input" type="radio" id="customRadio2" name="cinsiyet" value="Erkek" value="{{old('cinsiyet')}}">
                <label for="customRadio2" class="custom-control-label">Erkek</label>
              </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                @if ($errors->has('isim'))
                    <span class="text-danger">{{ $errors->first('isim') }}</span>
                @endif
            </div>
            <div class="col-4">
                @if ($errors->has('soyisim'))
                    <span class="text-danger">{{ $errors->first('soyisim') }}</span>
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
                <input type="text" class="form-control" placeholder="İsim" name="isim" value="{{old('isim')}}">
            </div>
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Soyisim" name="soyisim" value="{{old('soyisim')}}">
            </div>
            <label for="blood" style="margin-left:25px; margin-top:5px">Kan Grubu:</label>
            <div class="col-2">
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
            <div class="col-3" style="margin-left:20px;">
                @if ($errors->has('dogum_tarihi'))
                    <span class="text-danger">{{ $errors->first('dogum_tarihi') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <input type="text" class="form-control" placeholder="5xx xxx xx xx" name="telefon" value="{{old('telefon')}}">
            </div>
            <div class="col-4">
                <input type="text" class="form-control" placeholder="Baba adı" name="baba_adı" value="{{old('baba_adı')}}">
            </div>
            <!-- Date -->
            <label style="margin-left:25px; margin-top:5px">Doğum Tarihi:</label>
            <div class="col-2">
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
                <textarea class="form-control" rows="3" placeholder="Adres Bilgilerini Giriniz" name="adres" value="{{old('adres')}}"></textarea>
              </div>
            </div>
        </div>
        <br>
        <h5>İş Yeri ve Çalışma Bilgileri</h5>
        <hr>
        <div class="row">
            <div class="col-3" style="margin-left:80px">
                @if ($errors->has('is_yeri_tipi'))
                    <span class="text-danger">{{ $errors->first('is_yeri_tipi') }}</span>
                @endif
            </div>
            <div class="col-3" style="margin-left:50px">
                @if ($errors->has('birim_id'))
                    <span class="text-danger">{{ $errors->first('birim_id') }}</span>
                @endif
            </div>
            <div class="col-3" style="margin-left:105px">
                @if ($errors->has('meslek_id'))
                    <span class="text-danger">{{ $errors->first('meslek_id') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <label for="is_yeri_tipi" style="margin-top:5px">İşyeri Tipi:</label>
            <div class="col-3">
                <select class="form-control" name="is_yeri_tipi">
                    <option></option>
                    <option value="BELEDİYE" {{ old('is_yeri_tipi') == 'BELEDİYE' ? 'selected' : '' }}>BELEDİYE</option>
                    <option value="GASKİ" {{ old('is_yeri_tipi') == 'GASKİ' ? 'selected' : '' }}>GASKİ</option>
                    <option value="ŞUBE" {{ old('is_yeri_tipi') == 'ŞUBE' ? 'selected' : '' }}>ŞUBE</option>
                </select>
            </div>
            <label for="birim" style="margin-top:5px">Birimi:</label>
            <div class="col-3">
                <select class="form-control" name="birim_id">
                    {{-- buraya birimleri yerleştir --}}
                    <option></option>
                    @foreach ($birimler as $birim)
                        <option value="{{$birim->id}}" {{ old('birim_id') == $birim->name ."/".$birim->is_yeri_type  ? 'selected' : '' }}>{{$birim->name ."/".$birim->is_yeri_type }}</option>
                    @endforeach
                </select>
            </div>
            <label for="meslek" style="margin-top:5px">Mesleği/Görevi:</label>
            <div class="col-3">
                <select class="form-control" name="meslek_id" value="{{old('meslek_id')}}">
                    {{-- meslekleri yerleştir --}}
                    <option></option>
                    @foreach ($meslekler as $meslek)
                        <option value="{{$meslek->id}}">{{$meslek->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-2" style="margin-left:110px">
                @if ($errors->has('is_giris'))
                    <span class="text-danger">{{ $errors->first('is_giris') }}</span>
                @endif
            </div>
            <div style="margin-left:50px;">
                @if ($errors->has('maas'))
                    <span class="text-danger">{{ $errors->first('maas') }}</span>
                @endif
            </div>
            <div style="margin-left:70px;">
                @if ($errors->has('maas_tipi'))
                    <span class="text-danger">{{ $errors->first('maas_tipi') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <!-- Date -->
            <label style="margin-top:7px">İşe Giriş Tarihi:</label>
            <div class="col-2">
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate" name="is_giris" value="{{old('is_giris')}}"/>  
                </div>
            </div>
            <label style="margin-left:7px;margin-top:7px">Maaş:</label>
            <div class="col-2">
                <input type="number" class="form-control" placeholder="0" name="maas" value="{{old('maas')}}">
            </div>
            <div class="custom-control custom-radio" style="margin-left: 20px; margin-top:5px;">
                <input class="custom-control-input" type="radio" id="customRadio3" name="maas_tipi" value="Net" value="{{old('maas_tipi')}}">
                <label for="customRadio3" class="custom-control-label">Net</label>
              </div>
              <div class="custom-control custom-radio" style="margin-left:20px; margin-top:5px;">
                <input class="custom-control-input" type="radio" id="customRadio4" name="maas_tipi" value="Brüt" value="{{old('maas_tipi')}}">
                <label for="customRadio4" class="custom-control-label">Brüt</label>
              </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4" style="margin-left:90px">
                @if ($errors->has('ssk_sicil'))
                    <span class="text-danger">{{ $errors->first('ssk_sicil') }}</span>
                @endif
            </div>
        </div>
        <div class="row">
            <label style="margin-top:7px">SSK Sicil No:</label>
            <div class="col-4">
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
            <div class="col-1">
                <button type="submit" class="btn btn-app" style="margin-top:20px;"><i class="fas fa-save"></i>Kaydet</button>
            </div>
            
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
@endsection