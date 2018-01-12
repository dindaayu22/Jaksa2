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
                            <h3>Kategori <span>Terpopuler</span></h3>
                        </div>
                        <div id="owl-example" class="owl-carousel">
                            @foreach ($terpopuler as $top)
                            <div>
                                <a href="{{ URL::to('/dokumen/'.$top->idKategori)}}">
                                    <img class="img-responsive" src="{{ URL::to('/assets/user/images/slider/slider-img-1.jpg')}}" alt="">
                                </a>
                                <h4>{{$top->namaKategori}}</h4>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .container close -->
    </section><!-- slider close -->
    <!--
    about-us start
    ============================== -->
    <section id="about-us" style="background-color: rgba(240, 248, 221, 1);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <img class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms" src="{{ URL::to('/assets/user/images/kejaksaan.png')}}" alt="cooker-img">
                        <h1 class="heading wow fadeInUp" data-wow-duration="400ms" data-wow-delay="500ms" >
                            <span>Perpustakaan</span> </br> Kejaksaan Sleman
                        </h1>
                        <p class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="600ms">Perpustakaan adalah lembaga yang mengelola, menghimpun, mengatur dokumen dan merupakan sumber informasi, media pendidikan dan media riset.</br> Maka perpustakaan Kejaksaan Sleman diharapkan dapat menjadi sarana pendukung dari kinerja Kejaksaan Medan, </br>khususnya dalam rangka peningkatan kinerja, terutama dalam penangganan perkara-perkara Pidana Umum, Pidana Khusus dan Perdata Tata Usaha Negara pada Kejaksaan Sleman.</p>
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .containe close -->
    </section><!-- #call-to-action close -->
    <!--
    price start
    ============================ -->
    <section id="price" style="background-color: rgba(214, 237, 166, 1);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block col-md-6">
                        <h1 class="heading wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms"><span>RECENT VIEWED</span></h1>
                        <div class="pricing-list">
                            <ul>
                            @foreach ($recent_view as $recentV)
                                <li class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                                    <div class="item">
                                        <div class="item-title">
                                            <h2 style="background-color: rgba(214, 237, 166, 1);">{{$recentV->namaBerkas}}</h2>
                                            <div class="border-bottom"></div>
                                            <span>{{$recentV->namaKategori}}</span>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    <div class="block col-md-6">
                        <h1 class="heading wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms"><span>MOST VIEWED</span></h1>
                        <div class="pricing-list">
                            <ul>
                            @foreach($most_view as $mostV)
                                <li class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="300ms">
                                    <div class="item">
                                        <div class="item-title">
                                            <h2 style="background-color: rgba(214, 237, 166, 1);">{{$mostV -> namaBerkas}}</h2>
                                            <div class="border-bottom"></div>
                                            <span>{{$mostV ->namaKategori}}  ({{$mostV ->count}})</span>
                                        </div>
                                    
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .containe close -->
    </section><!-- #price close -->
    <!--
    price start
    ============================ -->
    @include('footer')