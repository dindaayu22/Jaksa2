@include('header')
<!--
    Slider start
    ============================== -->
    <section id="slider" style="background-color: rgba(214, 237, 166, 1);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                        <div class="title">
                        @foreach ($result as $result)
                            <h3> <span>{{$result->namaKategori}}</span></h3>
                        @endforeach
                        </div>
                        <div class="table-responsive m-t-20">
                            <table class="table vm no-th-brd no-wrap pro-of-month">
                                <thead>
                                    <tr>
                                        <th>Nama File</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                    @foreach ($berkas as $berkas)
                                     <tr>
                                        <td>{{$berkas->namaBerkas}}</td>
                                        <td>{{date_format(date_create("$berkas->createDate"), "d F Y")}}</td>
                                        <td>
                                            <a class="btn btn-social-icon btn-primary btn-xs" href="{{ URL::to('/berkas', ['berkas' => $berkas->idBerkas])}}"><i class="fa fa-folder">Open</i></a>
                                            
                                            <a class="btn btn-social-icon btn-primary btn-xs" href="{{URL::to('/download', ['berkas' => $berkas->idBerkas])}}"><i class="fa fa-arrow-down"></i>Download</a>
                                            
                                        </td>
                                    </tr>
									@endforeach
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .container close -->
    </section><!-- slider close -->
@include('footer')