@include('header')
<!-- 
    CONTACT US  start
    ============================= -->
    <section id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1 class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">Daftar Sebagai {{$user}}</h1>
                        {!! Form::open(array('action' => 'UserController@post_register', 'role' => 'form','method'=>'POST' )) !!}
                            <h2>Nama</h2>
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="name" class="form-control" name="namaPengguna" ="Write your full name here...">
                            </div>
                            <h2>Username</h2>
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="text" class="form-control" name="username" placeholder="Write your username here...">
                            </div>
                            <h2>Tanggal Lahir</h2>
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="800ms">
                                <div class="input-group">
                                  <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                  </div>
                                  <input type="text" class="form-control pull-right" name="tanggalLahir" id="datepicker">
                                </div>
            
                            </div>
                            <h2>Jenis Kelamin</h2>
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <select class="form-control" name="jenisKelamin">
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <h2>Nomor Telepon</h2>
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="telepon" class="form-control" name="noHP" placeholder="Write your telephone number here...">
                            </div>
                            <h2>Kota</h2>
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <select class="form-control" name="inputKota">
                                    @foreach ($kota as $idx => $datakota)
                                        <option value="{{$datakota->idKota}}">{{$datakota->namaKota}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <h2>Kecamatan</h2>
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <select class="form-control" name="inputKecamatan">
                                    @foreach ($kecamatan as $ix => $datakec)
                                        <option value="{{$datakec->idKecamatan}}">{{$datakec->namaKecamatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <h2>Alamat</h2>
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="1000ms">
                                <textarea class="form-control" rows="3" name="alamat"placeholder="Write your message here..."></textarea>
                            </div>
                            <h2>Password</h2>
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input type="password" class="form-control" name="password"placeholder="Write your password here...">
                            </div>
                            <input type="hidden" class="hidden" name="rule"value="{{$user}}">
                            {!! Form::submit('Daftar', array('class'=>'btn btn-default wow bounceIn')) !!}
                        {!! Form::close() !!}
                        
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .container close -->
    </section><!-- #contact-us close -->
    <script type="text/javascript">
        //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
    </script>
@include('footer')