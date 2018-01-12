@include('header')
 <!--
    CONTACT US  start
    ============================= -->
    <section id="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <h1 class="heading wow fadeInUp" data-wow-duration="500ms" data-wow-delay="300ms">Login Sebagai {{$user}}</h1>
                        {!! Form::open(array('action' => 'LoginController@login', 'role' => 'form','method'=>'POST' )) !!}
                            <h2>Username</h2>
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input name="username" type="name" class="form-control" placeholder="Write your full name here...">
                            </div>
                            <h2>Password</h2>
                            <div class="form-group wow fadeInDown" data-wow-duration="500ms" data-wow-delay="600ms">
                                <input name="password" type="password" class="form-control" placeholder="Write your password here...">
                            </div>
                             <input type="hidden" class="hidden" name="rule"value="{{$user}}">
                        {!! Form::submit('Masuk', array('class'=>'btn btn-default wow bounceIn')) !!}
                            
                        {!! Form::close() !!}
                        
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .container close -->
    </section><!-- #contact-us close -->
@include('footer')