@extends('dashboard.admin.layout.admin-dash-layout')

@section('title','Dashboard')



@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>DataTables</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol>
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
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>TC</th>
                  <th>Ad Soyad</th>
                  <th>Cinsiyet</th>
                  <th>Telefon</th>
                  <th>İşyeri</th>
                  <th>Birim</th>
                  <th>İşe Giriş Tarihi</th>
                  <th>İşten Ayrıldı</th>
                  <th>İşten Ayrılma Tarihi</th>
                  <th>Durum</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Tasman</td>
                  <td>Internet Explorer 5.1</td>
                  <td>Mac OS 7.6-9</td>
                  <td>1</td>
                  <td>C</td>
                  <td>C</td>
                  <td>C</td>
                  <td>C</td>
                  <td>C</td>
                  <td>Onaylandı</td>
                </tr>
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