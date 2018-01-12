@include('header')
<!--
    Slider start
    ============================== -->
    <section id="slider" style="background-color: rgba(214, 237, 166, 1);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">
                    @foreach ($result as $result)
                        <div class="title">
                            <h3> <span>{{$result->namaBerkas}}</span></h3>
                            <label>{{$result->namaKategori}}</label>
                            <label class="pull-right">{{$result->createDate}}</label>
                            <a class="btn btn-social-icon btn-primary btn-xs" href="{{URL::to('/download', ['berkas' => $result->idBerkas])}}"><i class="fa fa-arrow-down"></i>Download</a>
                        </div>
                        <div>
                            <embed class="col-md-12" height="1200px"src="{{URL::to('root/storage/files/'.$result->namaAsli)}}#toolbar=0" type='application/pdf'></embed>
                        </div>
                    @endforeach
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .container close -->
    </section><!-- slider close -->
@include('footer')