@include('admin/header')<!-- Form Modal -->
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
              <h4 class="modal-title">Masukkan Data User</h4>
            </div>
            <!-- /.box-header -->
            
             <div class="modal-body">
                <!-- form start -->            
              @if ($user == 0)
              <!-- Add data -->
              {!! Form::open(array('action' => 'AdminController@post_form_user','class' =>  'form-horizontal', 'id' => 'formInput', 'role' => 'form','method'=>'POST' )) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputNama" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="namaPengguna" placeholder="Nama Lengkap">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputUsername" class="col-sm-2 control-label">Username</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputJenKel" class="col-sm-2 control-label">Jenis Kelamin</label>

                  <div class="col-sm-10">
                    <select name="jenisKelamin" class="form-control">
                        <option value="L"> Laki-Laki </option>
                        <option value="P"> Perempuan </option>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTanggalLahir" class="col-sm-2 control-label">Tanggal Lahir</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control pull-right" nama="tanggalLahir" id="datepicker" placeholder="Tanggal Lahir">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNoTelepon" class="col-sm-2 control-label">No Telepon</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="noHP" placeholder="No Telepon">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputKota" class="col-sm-2 control-label">Kota</label>

                  <div class="col-sm-10">
                  <select name="inputKota" class="form-control">
                    @foreach ($kota as $idx => $datakota)
                        <option value="{{$datakota->idKota}}">{{$datakota->namaKota}}</option>
                    @endforeach
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputKecamatan" class="col-sm-2 control-label">Kecamatan</label>

                  <div class="col-sm-10">
                    <select name="inputKecamatan" class="form-control">
                    @foreach ($kecamatan as $ix => $datakec)
                        <option value="{{$datakec->idKecamatan}}">{{$datakec->namaKecamatan}}</option>
                    @endforeach
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputAlamat" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat" placeholder="Tuliskan Alamat Lengkap Anda">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputJenKel" class="col-sm-2 control-label">Role</label>

                  <div class="col-sm-10">
                    <select name="rule" class="form-control">
                        <option value="Anggota"> Anggota</option>
                        <option value="Pimpinan"> Pimpinan </option>
                        <option value="Admin"> Admin </option>

                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputAlamat" class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                </div>
            </div>

                
              <!-- /.box-body -->
            <div class="modal-footer">
                <a href="{{URL::to('admin/user')}}"  class="btn btn-default pull-left">Kembali</a>
                {!! Form::submit('Simpan', array('class'=>'btn btn-success')) !!}
                
              </div>
              
            {!! Form::close() !!}
            <!-- /add data -->
                @else
                <!-- Update data -->
              {!! Form::open(array('action' => array('AdminController@put_form_user', $user), 'class' =>  'form-horizontal', 'id' => 'formInput', 'role' => 'form', 'method'=>'PUT' )) !!}
              
                @foreach ($result as $datas)
              <div class="box-body">
                <div class="form-group">
                  <label for="inputNama" class="col-sm-2 control-label">Nama</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="namaPengguna" placeholder="Nama Lengkap" value="{{$datas->namaPengguna}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputUsername" class="col-sm-2 control-label">Username</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="username" placeholder="Username" value="{{$datas->username}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputJenKel" class="col-sm-2 control-label">Jenis Kelamin</label>

                  <div class="col-sm-10">
                    <select name="jenisKelamin" class="form-control">
                        <option value="L" @if ($datas->jenisKelamin == "L") selected @endif> Laki-Laki </option>
                        <option value="P" @if ($datas->jenisKelamin == "P") selected @endif> Perempuan </option>
                        
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTanggalLahir" class="col-sm-2 control-label">Tanggal Lahir</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control pull-right" nama="tanggalLahir" id="datepicker" placeholder="Tanggal Lahir" value="{{$datas->tanggalLahir}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputNoTelepon" class="col-sm-2 control-label">No Telepon</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="noHP" placeholder="No Telepon" value="{{$datas->noHP}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputKota" class="col-sm-2 control-label">Kota</label>

                  <div class="col-sm-10">
                  <select name="inputKota" class="form-control">
                    @foreach ($kota as $idx => $datakota)
                        <option value="{{$datakota->idKota}}" @if ($datas->idkota == $datakota->idKota) selected @endif>{{$datakota->namaKota}}</option>
                    @endforeach
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputKecamatan" class="col-sm-2 control-label">Kecamatan</label>

                  <div class="col-sm-10">
                    <select name="inputKecamatan" class="form-control">
                    @foreach ($kecamatan as $ix => $datakec)
                        <option value="{{$datakec->idKecamatan}}" @if ($datas->idkecamatan == $datakec->idKecamatan) selected @endif>{{$datakec->namaKecamatan}}</option>
                    @endforeach
                  </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputAlamat" class="col-sm-2 control-label">Alamat</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="alamat" placeholder="Tuliskan Alamat Lengkap Anda" value="{{$datas->alamat}}">
                  </div>
                </div>
            </div>

            <div class="form-group">
                  <label for="inputJenKel" class="col-sm-2 control-label">Role</label>

                  <div class="col-sm-10">
                    <select name="rule" class="form-control">
                        <option value="Anggota"@if ($datas->rule == 'Anggota') selected @endif> Anggota</option>
                        <option value="Pimpinan"@if ($datas->rule == 'Pimpinan') selected @endif> Pimpinan </option>
                        <option value="Admin"@if ($datas->rule == 'Admin') selected @endif> Admin </option>

                  </select>
                  </div>
                </div>

                
              <!-- /.box-body -->
            <div class="modal-footer">
                <a href="{{URL::to('admin/user')}}"  class="btn btn-default pull-left">Kembali</a>
                {!! Form::submit('Simpan', array('class'=>'btn btn-success')) !!}
                
              </div>
              @endforeach
            {!! Form::close() !!} 
            <!-- /update data  -->
                
                @endif
            
            
              </div>
              
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
<script type="text/javascript">
        //Date picker
  $(document).ready(function(){
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'yyyy-mm-dd'
    }).val();
  });
    </script>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
            
@include('admin/footer')