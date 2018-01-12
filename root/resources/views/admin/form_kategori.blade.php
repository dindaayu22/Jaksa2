@include('admin/header')<!-- Form Modal -->
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Kategori
        <small>Control Panel</small>

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dokumen</li>
        <li class="active">Kategori</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h4 class="modal-title">Masukkan Data Kategori</h4>
            </div>
            <!-- /.box-header -->
            
             <div class="modal-body">
                <!-- form start -->            
              @if ($kategori == 0)
              <!-- Add data -->
              {!! Form::open(array('action' => 'AdminController@post_form_kategori','class' =>  'form-horizontal', 'id' => 'formInput', 'role' => 'form','method'=>'POST' )) !!}
              <div class="box-body">
                <div class="form-group">
                  {!! Form::label ('inputNamaKategori','Nama', array('class'=>'col-sm-2 control-label')) !!}

                  <div class="col-sm-10">
                    {!! Form::text('namaKategori','' , array('class' => 'form-control', 'placeholder' =>'Nama Kategori','id' => 'namaKategori')) !!}
                  </div>
                </div>
                </div>
              <!-- /.box-body -->
               <div class="modal-footer">
                <a href="{{URL::to('admin/kategori')}}"  class="btn btn-default pull-left">Kembali</a>
                {!! Form::submit('Simpan', array('class'=>'btn btn-success')) !!}
               
              </div>
            {!! Form::close() !!}
            <!-- /add data -->
                @else
                <!-- Update data -->
              {!! Form::open(array('action' => array('AdminController@put_form_kategori', $kategori), 'class' =>  'form-horizontal', 'id' => 'formInput', 'role' => 'form', 'method'=>'PUT' )) !!}
              @foreach ($result as $datas)
              <div class="box-body">
                <div class="form-group">
                  {!! Form::label ('inputNamaKategori','Nama', array('class'=>'col-sm-2 control-label')) !!}

                  <div class="col-sm-10">
                    {!! Form::text('namaKategori',$datas->namaKategori , array('class' => 'form-control', 'placeholder' =>'Nama Kategori','id' => 'namaKategori')) !!}
                  </div>
                </div>
                </div>
              <!-- /.box-body -->
            <div class="modal-footer">
                <a href="{{URL::to('admin/kategori')}}"  class="btn btn-default pull-left">Kembali</a>
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