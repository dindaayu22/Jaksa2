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
              <h4 class="modal-title">Masukkan Password</h4>
            </div>
            <!-- /.box-header -->
            
             <div class="modal-body">
                <!-- form start -->            
              
                <!-- Update data -->
              {!! Form::open(array('action' => array('AdminController@put_form_user_pass', $user), 'class' =>  'form-horizontal', 'id' => 'formInput', 'role' => 'form', 'method'=>'PUT' )) !!}
              <div class="box-body">
               <div class="form-group">
                  <label for="inpuPassword" class="col-sm-2 control-label">Password</label>

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
            <!-- /update data  -->         
            
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