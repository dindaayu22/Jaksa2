@include('admin/header')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data User</h3>
                <small>{{ $result->lastPage() }} Page</small>
            </div>
            <!-- /.box-header -->
            

            <!-- AddButton -->
            <div class="margin">
              <a href="{{URL::to('admin/user/form', ['user' => 0])}}" class="btn btn-success" ><i class="fa fa-plus"></i>  Tambah</a>
              <!-- Pages -->
              <ul class="pagination pagination-sm no-margin pull-right">
                
                <li><a href="{{ $result->previousPageUrl() }}">&lt;</a></li>
                <li><a href="#">{{ $result->currentPage() }}</a></li>
                <li><a href="{{ $result->nextPageUrl() }}">&gt;</a></li>
                

              </ul>


              <!-- /pages -->
            </div>
            <!-- /addbutton -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Username</th>
                  <th>Tanggal Lahir</th>
                  <th>Jenis Kelamin</th>
                  <th>No Telephone</th>
                  <th>Alamat</th>
                  <th>Rule</th>
                  <th>Update</th>
                </tr>
                @foreach ($result as $index => $datas)
                <tr>
                  <td>{{$index+1}}</td>
                  <td>{{$datas->namaPengguna}}</td>
                  <td>{{$datas->username}}</td>
                  <td>{{
                  date_format(date_create("$datas->tanggalLahir"), "d F Y")
                  }}</td>
                  <td>{{$datas->jenisKelamin}}</td>
                  <td>{{$datas->noHP}}</td>
                  <td>{{$datas->alamat}}</td>
                  <td>{{$datas->rule}}</td>
                  <td>
                    <a href="{{URL::to('admin/user/form', ['user' => $datas->id])}}" class="btn btn-social-icon btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                    <a href="{{URL::to('admin/user/password', ['user' => $datas->id])}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Password</a>

                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
@include('admin/footer')