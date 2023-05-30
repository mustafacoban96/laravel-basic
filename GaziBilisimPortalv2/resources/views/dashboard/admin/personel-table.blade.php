@extends('dashboard.admin.layout.admin-dash-layout')

@section('title','Personel Listesi')

@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Gazi Bilişim Personel Listesi</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>TC</th>
                <th>Ad Soyad</th>
                <th>Telefon</th>
                <th>meslek</th>
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
                      <td>{{$personel->is_yeri_tipi}}</td>
                      <td>{{$personel->birim->name.'/'.$personel->is_yeri_tipi}}</td>
                      <td>{{$personel->is_giris}}</td>
                      <td>
                        <span class="right badge badge-success">{{$personelStatus->where('id',$personel->status_id)->first()->name}}</span>
                      </td>
                      <td>
                        <a class="btn btn-info btn-sm" href="{{route('adminDisplay',$personel)}}"><i class="fas fa-pencil-alt"></i>Düzenle</a>
                      </td>
                    </tr>
                  @endif
                  
                @endforeach
              
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection