@include('admin/header')<!-- Form Modal -->
<!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daftar Dokumen
        <small>Control Panel</small>

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dokumen</li>
        <li class="active">Daftar Dokumen</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h4 class="modal-title">Masukkan Data Dokumen</h4>
            </div>
            <!-- /.box-header -->
            
             <div class="modal-body">
                <!-- form start -->            
              @if ($dokumen == 0)
              <!-- Add data -->
              {!! Form::open(array('action' => 'AdminController@post_form_dokumen','class' =>  'form-horizontal', 'id' => 'formInput', 'role' => 'form','method'=>'POST','files'=>true )) !!}
              <div class="box-body">
                <div class="form-group">
                  <label for="inputNama" class="col-sm-2 control-label">Nama Berkas</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="namaBerkas" placeholder="Nama Berkas">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputKategori" class="col-sm-2 control-label">Kategori</label>

                  <div class="col-sm-10">
                    <select name="inputKategori" class="form-control">
                    @foreach ($kategori as $dok)
                        <option value="{{$dok->idKategori}}">{{$dok->namaKategori}}</option>
                    @endforeach
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputJenis" class="col-sm-2 control-label">Jenis Berkas</label>

                  <div class="col-sm-10">
                    <select name="jenisFile" class="form-control">
                        <option value="Publik"> Publik </option>
                        <option value="Private"> Private </option>
                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputTanggalLahir" class="col-sm-2 control-label">Pilih Berkas</label>

                  <div class="col-sm-10">
                    <input type="file" name="Berkas" accept=".pdf">
                  </div>
                </div>
               

                
              <!-- /.box-body -->
            <div class="modal-footer">
                <a href="{{URL::to('admin/dokumen')}}"  class="btn btn-default pull-left">Kembali</a>
                {!! Form::submit('Simpan', array('class'=>'btn btn-success')) !!}
                
              </div>
              
            {!! Form::close() !!}
            <!-- /add data -->
                @else
                <!-- Update data -->
              {!! Form::open(array('action' => array('AdminController@put_form_dokumen', $dokumen), 'class' =>  'form-horizontal', 'id' => 'formInput', 'role' => 'form', 'method'=>'PUT','files'=>true )) !!}
              @foreach ($result as $berkas)
              <div class="box-body">
                <div class="form-group">
                  <label for="inputNama" class="col-sm-2 control-label">Nama Berkas</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="namaBerkas" placeholder="Nama Berkas" value="{{$berkas->namaBerkas}}">
                  </div>
                </div>
                            

                
              <!-- /.box-body -->
            <div class="modal-footer">
                <a href="{{URL::to('admin/dokumen')}}"  class="btn btn-default pull-left">Kembali</a>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
            
@include('admin/footer')