@extends('layout.admin-layout')

@section('title','Personel')

@section('anasayfa-button')
    <a class="nav-link" href="{{route('superIndex')}}">Anasayfa <span class="sr-only">(current)</span></a>
@endsection

@section('route-button')


<li>
    <a href={{route('superPersonelList')}}>
        <span class="nav-link-text" data-i18n="nav.miscellaneous_fullcalendar">Kayıtlı Personel Listesi</span>
    </a>
</li>
    
@endsection


@section('content')
<div id="panel-2" class="panel">
    <div class="panel-hdr">
        <h2>
            Personel <span class="fw-300"><i>Kayıt</i></span>
        </h2>
        <div class="panel-toolbar">
            <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
            <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
            <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
        </div>
    </div>
    
    <div class="panel-container show">
        <h4 style="margin:5px">Genel Bilgiler</h4> 
           
        <div class="panel-content p-0">
            <form action={{route('updateOrapprove',$personel->id)}} method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="panel-content">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            @if ($errors->has('tc_num'))
                                <span class="text-danger">{{ $errors->first('tc_num') }}</span>
                            @endif
                        </div>
                        <div class="col-md-3 mb-3">
                            @if ($errors->has('kan_grubu'))
                                <span class="text-danger">{{ $errors->first('kan_grubu') }}</span>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            @if ($errors->has('dogum_tarihi'))
                                <span class="text-danger">{{ $errors->first('dogum_tarihi') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="validationCustom01">TC Kimlik Numarası<span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="TC Kimlik numarası" name="tc_num" value={{$personel->tc_num}}>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="validationCustom03">Kan Grubu <span class="text-danger">*</span></label>
                            <select class="custom-select"  name="kan_grubu">
                                <option value=""></option>
                                <option value="A Rh+" {{ $personel->kan_grubu == 'A Rh+' ? 'selected' : '' }}>A Rh+</option>
                                <option value="A Rh-" {{ $personel->kan_grubu == 'A Rh-' ? 'selected' : '' }}>A Rh-</option>
                                <option value="AB Rh+" {{ $personel->kan_grubu == 'AB Rh+' ? 'selected' : '' }}>AB Rh+</option>
                                <option value="AB Rh-" {{ $personel->kan_grubu == 'AB Rh-' ? 'selected' : '' }}>AB Rh-</option>
                                <option value="B Rh+" {{ $personel->kan_grubu == 'B Rh+' ? 'selected' : '' }}>B Rh+</option>
                                <option value="B Rh-" {{ $personel->kan_grubu == 'B Rh-' ? 'selected' : '' }}>B Rh-</option>
                                <option value="0 Rh+" {{ $personel->kan_grubu == '0 Rh+' ? 'selected' : '' }}>0 Rh+</option>
                                <option value="0 Rh-" {{ $personel->kan_grubu == '0 Rh-' ? 'selected' : '' }}>0 Rh-</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="validationCustom03">Doğum Tarihi <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="date" class="form-control " name="dogum_tarihi" value="{{$personel->dogum_tarihi}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            @if ($errors->has('surname'))
                                <span class="text-danger">{{ $errors->first('surname') }}</span>
                            @endif
                        </div>
                        <div class="col-md-3 mb-3">
                            @if ($errors->has('baba_adi'))
                                <span class="text-danger">{{ $errors->first('baba_adi') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="validationCustom01">İsim <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="validationCustom01" name="name" placeholder="First name" value="{{$personel->name}}">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="validationCustom02">Soyisim <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="validationCustom02" name="surname" placeholder="Last name" value="{{$personel->surname}}">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="validationCustom05">Baba adı <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="validationCustom05" name="baba_adi" placeholder="Baba adı" value="{{$personel->baba_adi}}">
                            <div class="invalid-feedback">
                                Please provide a valid name.
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            @if ($errors->has('telefon'))
                                <span class="text-danger">{{ $errors->first('telefon') }}</span>
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            @if ($errors->has('cinsiyet'))
                                <span class="text-danger">{{ $errors->first('cinsiyet') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="validationCustom03">Telefon <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="validationCustom03" placeholder="Telefon" name="telefon" value="{{$personel->telefon}}">
                        </div>
                        <div class="col-md-4 mb-3" >
                            <label class="form-label mb-2">Cinsiyet <span class="text-danger">*</span></label>
                            <div class="custom-control custom-radio mb-2">
                                <input type="radio" class="custom-control-input" id="GenderMale" name="cinsiyet"  value="Kadın" {{$personel->cinsiyet == 'Kadın' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="GenderMale">Kadın</label>
                            </div>
                            <div class="custom-control custom-radio mb-2">
                                <input type="radio" class="custom-control-input" id="GenderFemale" name="cinsiyet" value="Erkek" {{$personel->cinsiyet == 'Erkek' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="GenderFemale">Erkek</label>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            @if ($errors->has('adres'))
                                <span class="text-danger">{{ $errors->first('adres') }}</span>
                            @endif
                           
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <label class="form-label" for="validationTextarea2">Adres <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="validationTextarea2" placeholder="Lütfen adres bilgilerini giriniz..."  name="adres">{{$personel->adres}}</textarea>
                            <div class="invalid-feedback">
                                Please enter a message in the textarea.
                            </div>
                        </div>
                    </div>
                    <br>
                    <h4>İş yeri ve Çalışma Bilgileri</h4>
                    <div class="panel-content">
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                @if ($errors->has('isyeri_tipi'))
                                    <span class="text-danger">{{ $errors->first('isyeri_tipi') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 mb-3">
                                @if ($errors->has('birim_id'))
                                    <span class="text-danger">{{ $errors->first('birim_id') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 mb-3">
                                @if ($errors->has('meslek_id'))
                                    <span class="text-danger">{{ $errors->first('meslek_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustom03">İşyeri Tipi <span class="text-danger">*</span></label>
                                <select class="custom-select" name="isyeri_tipi">
                                    <option></option>
                                    <option value="BELEDİYE" {{$personel->isyeri_tipi == 'BELEDİYE' ? 'selected' : '' }}>BELEDİYE</option>
                                    <option value="GASKİ" {{ $personel->isyeri_tipi == 'GASKİ' ? 'selected' : '' }}>GASKİ</option>
                                    <option value="ŞUBE" {{ $personel->isyeri_tipi == 'ŞUBE' ? 'selected' : '' }}>ŞUBE</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustom03">Birim<span class="text-danger">*</span></label>
                                <select class="custom-select" name="birim_id">
                                    <option value=""></option>
                                    @foreach ($birimler as $birim)
                                        <option value={{$birim->id}} {{$personel->birim->name.'/'.$personel->isyeri_tipi == $birim->name.'/'.$birim->isyeri_tipi  ? 'selected' : '' }}>{{$birim->name.'/'.$birim->isyeri_tipi}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustom03">Meslek<span class="text-danger">*</span></label>
                                <select class="custom-select" name="meslek_id">
                                    <option></option>
                                    @foreach ($meslekler as $meslek)
                                        <option value={{$meslek->id}} {{ $personel->meslek->name == $meslek->name  ? 'selected' : '' }}>{{$meslek->name}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                @if ($errors->has('maas'))
                                    <span class="text-danger">{{ $errors->first('maas') }}</span>
                                @endif
                            </div>
                            <div class="col-md-3 mb-3">
                                @if ($errors->has('maas_tipi'))
                                    <span class="text-danger">{{ $errors->first('maas_tipi') }}</span>
                                @endif
                            </div>
                            <div class="col-md-4 mb-3">
                                @if ($errors->has('is_giris'))
                                    <span class="text-danger">{{ $errors->first('is_giris') }}</span>
                                @endif
                            </div>
                        
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="basic-url">Maaş</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₺</span>
                                    </div>
                                    <input type="number" class="form-control" name="maas" value="{{$personel->maas}}" placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-3 mb-3"  style="margin-left:20px">
                                <label class="form-label mb-2">Maaş Türü<span class="text-danger">*</span></label>
                                <div class="custom-control custom-radio mb-2">
                                    <input type="radio" class="custom-control-input" id="maasNet"  name="maas_tipi" value="Net" {{$personel->maas_tipi == 'Net' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="maasNet">Net</label>
                                </div>
                                <div class="custom-control custom-radio mb-2">
                                    <input type="radio" class="custom-control-input" id="maasBrüt" name="maas_tipi" value="Brüt" {{$personel->maas_tipi == 'Brüt' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="maasBrüt">Brüt</label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustom03">İşe Giriş Tarihi <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="date" class="form-control " name="is_giris" value="{{$personel->is_giris}}"> 
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="basic-url">Kıdem Tazminatı</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₺</span>
                                    </div>
                                    <input type="number" class="form-control" name="kidem_tazminati" value="{{$personel->kidem_tazminati}}" placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="basic-url">İhbar Tazminatı</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₺</span>
                                    </div>
                                    <input type="number" class="form-control" name="ihbar_tazminati" value="{{$personel->ihbar_tazminati}}" placeholder="0">
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="basic-url">Yıllık İzin Ücreti</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">₺</span>
                                    </div>
                                    <input type="number" class="form-control" name="yillik_izin_ücreti" value="{{$personel->yillik_izin_ücreti}}" placeholder="0">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustom03">İşten Ayrılma Tarihi</label>
                                <div class="input-group">
                                    <input type="date" class="form-control " name="is_ayrilma_tarihi" value="{{$personel->is_ayrilma_tarihi}}"> 
                                </div>
                            </div>
                            <div class="col-md-7 mb-3">
                                <label class="form-label" for="validationCustom01">İşten Ayrilma Tarihi</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="İşten Ayrılma Nedeni" name="isten_ayrilma_nedeni" value="{{$personel->isten_ayrilma_nedeni}}">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                @if ($errors->has('ssk_sicil'))
                                    <span class="text-danger">{{ $errors->first('ssk_sicil') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustom01">SSK Sicil Numarası<span class="text-danger">*</span> </label>
                                <input type="text" class="form-control" id="validationCustom01" placeholder="SSK sicil numarası" name="ssk_sicil" value="{{$personel->ssk_sicil}}">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                @if($errors->any())
                                    @foreach($errors->get('files') as $error)
                                        <span class="text-danger">{{ $error }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <div class="col-md-12 mb-3">
                                @if($errors->has('files.*'))
                                    @foreach($errors->get('files.*') as $error)
                                        @foreach($error as $message)
                                            <span class="text-danger">{{ $message }}</span>
                                        @endforeach
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="inputGroupFile02">Kişi Dosyaları</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="files[]" multiple>
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Dosya seç</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        
                </div>
                <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                    <button class="btn btn-success ml-auto" type="submit" id="js-sweetalert2-example-6">Onayla</button>
                    
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12 col-xl-6">
                    <div class="frame-wrap">
                        <table class="table m-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Kişiye ait dosya</th>
                                    <th>indir</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $x = 1;
                                @endphp
                                @foreach ($files as $file)
                                <tr>
                                    <th scope="row">{{$x++}}</th>
                                    <td>{{$file->file_name}}</td>
                                    <td>
                                        <a href="{{route('superFileDownload',$file->id)}}" class="btn btn-sm btn-success">
                                            <span class="fal fa-download mr-1"></span>
                                            Download
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
            </div>
            {{-- <a href="javascript:void(0);" class="btn btn-outline-primary" id="js-sweetalert2-example-6">Try me!</a> --}}
            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function()
                {
                    'use strict';
                    window.addEventListener('load', function()
                    {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form)
                        {
                            form.addEventListener('submit', function(event)
                            {
                                if (form.checkValidity() === false)
                                {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();

            </script>
        </div>
    </div>
</div>
@endsection