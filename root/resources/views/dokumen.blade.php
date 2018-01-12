@include('header')
<!--
    blog start
    ============================ -->
    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1 class="heading"><span>Kategori</span></h1>
                        <ul>
                        @foreach ($result as $kategori)
                            <li class="wow fadeInLeft" data-wow-duration="300ms" data-wow-delay="300ms">
                                <div class="blog-img">
                                    <a href="{{ URL::to('/dokumen', ['kategori' => $kategori->idKategori])}}">
                                        <img src="{{ URL::to('/assets/user/images/blog/img-1.jpg')}}" alt="blog-img">
                                    </a>
                                </div>

                                <div class="content-right">
                                    <h3>{{$kategori->namaKategori}}</h3>
                                    <p>Berisi tentang berkas-berkas yang berkaitan dengan {{$kategori->namaKategori}}</p>
                                </div>
                            </li>

                            @endforeach
                            
                        </ul>
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .containe close -->
    </section><!-- #blog close -->
@include('footer')