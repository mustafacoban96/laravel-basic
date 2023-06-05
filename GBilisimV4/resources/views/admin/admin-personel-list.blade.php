@extends('layout.admin-layout')



@section('title','Anasayfa')
@section('anasayfa-button')
    <a class="nav-link" href="{{route('adminIndex')}}">Anasayfa <span class="sr-only">(current)</span></a>
@endsection
@section('route-button')

    <li>
        <a href={{route('addPersonel')}}>
            <span class="nav-link-text" data-i18n="nav.miscellaneous_fullcalendar">Yeni Kayıt</span>
        </a>
    </li>
    <li>
        <a href="{{route('personelList')}}">
            <span class="nav-link-text" data-i18n="nav.miscellaneous_fullcalendar">Kayıtlı Personel Listesi</span>
        </a>
    </li>
        
@endsection
@section('content')
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    Personel <span class="fw-300"><i>Tablosu</i></span>
                </h2>
                
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    <!-- datatable start -->
                    <table id="dt-basic-example" class="table table-bordered table-hover table-striped w-100">
                        <thead>
                            <tr>
                                <th>TC</th>
                                <th>Ad Soyad</th>
                                <th>Telefon</th>
                                <th>Meslek</th>
                                <th>İşyeri</th>
                                <th>Birim</th>
                                <th>İş Giriş Tarihi</th>
                                <th>Durum</th>
                                <th>İşlem</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($personels as $personel)
                  @if ($personel->status_id == 1)
                    <tr>
                      <td>{{$personel->tc_num}}</td>
                      <td>{{$personel->name." ".$personel->surname}}</td>
                      <td>{{$personel->telefon}}</td>
                      <td>{{$personel->meslek->name}}</td>
                      <td>{{$personel->isyeri_tipi}}</td>
                      <td>{{$personel->birim->name.'/'.$personel->isyeri_tipi}}</td>
                      <td>{{$personel->is_giris}}</td>
                      <td>
                        <span class="right badge badge-success">{{$personelStatus->where('id',$personel->status_id)->first()->name}}</span>
                      </td>
                      <td>
                        <a class="btn btn-sm btn-info waves-effect waves-themed" href="{{route('individual',$personel->id)}}">Kişiyi Göster</a>
                      </td>
                    </tr>
                  @endif
                @endforeach
                        </tfoot>
                    </table>
                    <!-- datatable end -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



