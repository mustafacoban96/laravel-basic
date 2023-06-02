@extends('layout.admin-layout')


@section('title','Yeni kayıt')



@section('content')
<div id="panel-2" class="panel">
    <div class="panel-hdr">
        <h2>
            Yeni <span class="fw-300"><i>Kayıt</i></span>
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
            <form class="needs-validation" novalidate="">
                @csrf
                <div class="panel-content">
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="validationCustom01">TC Kimlik Numarası<span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="TC Kimlik numarası" required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="validationCustom03">Kan Grubu <span class="text-danger">*</span></label>
                            <select class="custom-select" required="">
                                <option value="">-</option>
                                <option value="A Rh+">A Rh+</option>
                                <option value="A Rh-">A Rh-</option>
                                <option value="B Rh+">B Rh+</option>
                                <option value="B Rh-">B Rh-</option>
                                <option value="AB Rh+">AB Rh+</option>
                                <option value="AB Rh-">AB Rh-</option>
                                <option value="0 Rh+">0 Rh+</option>
                                <option value="0 Rh-">0 Rh-</option>
                                
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="validationCustom03">Doğum Tarihi <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="date" class="form-control " placeholder="Top left">
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="validationCustom01">İsim <span class="text-danger">*</span> </label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="First name" required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="validationCustom02">Soyisim <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Last name"  required="">
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label class="form-label" for="validationCustom05">Baba adı <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="validationCustom05" placeholder="Baba adı" required="">
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                       
                    </div>
                    <div class="form-row form-group">
                        <div class="col-md-4 mb-3">
                            <label class="form-label" for="validationCustom03">Telefon <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="validationCustom03" placeholder="Telefon" required="">
                        </div>
                        <div class="col-md-4 mb-3" >
                            <label class="form-label mb-2">Cinsiyet <span class="text-danger">*</span></label>
                            <div class="custom-control custom-radio mb-2">
                                <input type="radio" class="custom-control-input" id="GenderMale" name="radio-stacked" required="">
                                <label class="custom-control-label" for="GenderMale">Kadın</label>
                            </div>
                            <div class="custom-control custom-radio mb-2">
                                <input type="radio" class="custom-control-input" id="GenderFemale" name="radio-stacked" required="">
                                <label class="custom-control-label" for="GenderFemale">Erkek</label>
                            </div>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="validationTextarea2">Adres <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="validationTextarea2" placeholder="Lütfen adres bilgilerini giriniz..." required=""></textarea>
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
                                <label class="form-label" for="validationCustom03">İşyeri Tipi <span class="text-danger">*</span></label>
                                <select class="custom-select" required="">
                                    <option value="">State</option>
                                    <option value="1">Michigan</option>
                                    <option value="2">New York</option>
                                    <option value="3">Oklahoma</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustom03">İşyeri Tipi <span class="text-danger">*</span></label>
                                <select class="custom-select" required="">
                                    <option value="">State</option>
                                    <option value="1">Michigan</option>
                                    <option value="2">New York</option>
                                    <option value="3">Oklahoma</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="validationCustom03">İşyeri Tipi <span class="text-danger">*</span></label>
                                <select class="custom-select" required="">
                                    <option value="">State</option>
                                    <option value="1">Michigan</option>
                                    <option value="2">New York</option>
                                    <option value="3">Oklahoma</option>
                                </select>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label" for="basic-url">Maaş</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">$</span>
                                    </div>
                                    <input type="number" class="form-control" aria-label="Amount (to the nearest dollar)">
                                    
                                </div>
                            </div>
                            <div class="col-md-4 mb-3"  style="margin-left:20px">
                                <label class="form-label mb-2">Maaş Türü<span class="text-danger">*</span></label>
                                <div class="custom-control custom-radio mb-2">
                                    <input type="radio" class="custom-control-input" id="GenderMale" name="radio-stacked" required="">
                                    <label class="custom-control-label" for="GenderMale">Net</label>
                                </div>
                                <div class="custom-control custom-radio mb-2">
                                    <input type="radio" class="custom-control-input" id="GenderFemale" name="radio-stacked" required="">
                                    <label class="custom-control-label" for="GenderFemale">Brüt</label>
                                </div>
                            </div>
                           
                        </div>
                        <div class="form-row">
                            <div class="col-md-12 mb-3">
                                <label class="form-label" for="inputGroupFile01">Kişi Dosyaları</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="inputGroupFile02">
                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="panel-content border-faded border-left-0 border-right-0 border-bottom-0 d-flex flex-row align-items-center">
                    <button class="btn btn-primary ml-auto" type="submit">Gönder</button>
                </div>
            </form>
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

@section('script')
<script src="js\formplugins\bootstrap-datepicker\bootstrap-datepicker.js"></script>
<script>
    // Class definition

    var controls = {
        leftArrow: '<i class="fal fa-angle-left" style="font-size: 1.25rem"></i>',
        rightArrow: '<i class="fal fa-angle-right" style="font-size: 1.25rem"></i>'
    }

    var runDatePicker = function()
    {

        

        // orientation 
        $('#datepicker-4-1').datepicker(
        {
            orientation: "top left",
            todayHighlight: true,
            templates: controls
        });

       
    }

    $(document).ready(function()
    {
        runDatePicker();
    });

</script>
@endsection