@include('header')
<!--
    about-us start
    ============================== -->
    <section id="about-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1><b>Login Sebagai</h1>
                        <br>
                        <div class="owl">
                            <a href="{{ URL::to('/login', ['user' => 'Admin'])}}">
                                <img class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms" src="{{ URL::to('/assets/user/images/admin.png')}}" alt="cooker-img" style="padding: 25px">
                            </a>
                            <a href="{{ URL::to('/login', ['user' => 'Pimpinan'])}}">
                                <img class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms" src="{{ URL::to('/assets/user/images/pimpinan.png')}}" alt="cooker-img" style="padding: 25px">
                            </a>
                            <a href="{{ URL::to('/login', ['user' => 'Anggota'])}}">
                                <img class="wow fadeInUp" data-wow-duration="300ms" data-wow-delay="400ms" src="{{ URL::to('/assets/user/images/anggota.png')}}" alt="cooker-img" style="padding: 25px">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('footer')