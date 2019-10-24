@extends('front.style.master')
@section('content')
    <!-- Header Start -->
    <section id="header">
        <div class="container">
            <!-- <h1>We are seeking for a better community health.</h1>
            <h4>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora repellat inventore nemo repudiandae
                ipsum quos.</h4>
            <button class="btn more" onclick= "window.location.href = 'About-us.html';">More</button> -->
        </div>
    </section>
    <!-- Header End -->
    <!-- Sub Header Start -->
    <section id="sub-header">
        <div class="container">
            <h3>A SINGLE PINT CAN SAVE THREE LIVES, A SINGLE GESTURE CAN CREATE A MILLION SMILES.</h3>
        </div>
    </section>
    <!-- Sub Header End -->

    <!-- Articles Start -->
    <section id="articles">
        <div class="container">
            <h2 style="display: inline-block;">Articles</h2>
            <div class="swiper-container">
            <div class="button-area" style="display: inline-block; margin-left: 850px;">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </button>
            </div>

                <div class="swiper-wrapper">
                        @foreach($posts as $post)
                        <div class="swiper-slide">

                            <div class="card">
                                <div class="card-img-top" style="position: relative;">
                                    <img src="{{$post->image}}" alt="Card image">
                                    <button class="like"><i class="fas fa-heart icon-large"></i></button>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">{{$post->title}}</h4>
                                    <p class="card-text">{{$post->content}}</p>
                                    <div class="btn-cont">
                                        <button class="card-btn" onclick= "window.location.href = 'article.html';">Details</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                        @endforeach
                </div>

            </div>
        </div>
    </section>
    <!-- Articles End -->

    <!-- Requests Start -->
    <section id="requests">
        <div class="title">
            <h2>Donations</h2>
            <hr class="line">
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-5">

                    <select name="Type" id="">
                        <option value="" disabled selected>Select Blood Type</option>
                        @foreach($bloodtypes as $bloodtype)
                        <option value="{{$bloodtype->type}}">{{$bloodtype->type}}</option>
                        @endforeach
                    </select>

                </div>
                <div class="col-lg-5">
                    <select name="City" id="">
                        <option value="" disabled selected>Select City</option>
                        @foreach($governorates as $governorate)
                        <option value="{{$governorate->name}}">{{$governorate->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="search">
                    <button><i class="col-lg-2 fas fa-search"></i></button>
                </div>
            </div>
            <div class="row">
                @foreach($donations as $donation)
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="type">
                                <h2>{{$donation->bloodtype->type}}</h2>
                            </div>
                        </div>
                        <div class="data col-lg-6">
                            <h4>Name: {{$donation->name}}</h4>
                            <h4>Hospital: {{$donation->hospital_name}}</h4>
                            <h4>City: {{$donation->city->name}}</h4>
                        </div>
                        <div class="col-lg-3">
                            <button onclick= "window.location.href = '{{url(route('donate',$donation->id))}}';">Details</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="more-req">
                <button onclick= "window.location.href = '{{url(route('requests'))}}';">More</button>
            </div>
        </div>
    </section>
    <!-- Requests End -->

    <!-- Call us Start -->
    <section id="call-us">
        <div class="layer">
            <div class="container">
                <h1>Call Us</h1>
                <h4>You can call us for your inquiries about any information.</h4>
                <div class="whats">
                    <img src="{{asset('front/imgs/whats.png')}}" alt="">
                    <h3>+20 127 245 6884</h3>
                </div>
            </div>
        </div>
    </section>
    <!-- Call us End -->

    <!-- App Start -->
    <section id="app">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="info">
                        <h1>Blood Bank Application</h1>
                        <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae earum officiis et eligendi nam
                            harum corporis saepe deserunt.</h3>
                        <h4>Available On</h4>
                        <img src="{{asset('front/imgs/ios.png')}}" alt="">
                        <img src="{{asset('front/imgs/google.png')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="app-screen" src="{{asset('front/imgs/App.png')}}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- App End -->
@endsection

