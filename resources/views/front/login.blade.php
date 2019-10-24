@extends('front.style.master')
@inject('model','App\Models\Client')
@section('content')

    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Login</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Login Start -->
    <section id="login">
        <div class="container">
            <img src="{{asset('front/imgs/log.png')}}" alt="">
            {!! Form::model($model,[
             'action' => 'client\WebController@clientLogin',
             'method' =>'post'
           ]) !!}
            <form action="submit">

                {!! Form::text('phone' , $model->phone, [
                    'class' => 'form-control',
                     'placeholder' => 'رقم الهاتف'
                  ]) !!}
                {!! Form::password('password',[
                  'class' => 'form-control',
                  'placeholder' => 'كلمة السر'
                ]) !!}
                <input class="check" type="checkbox">Remember me
                <a href="#">Forget Password ?</a><br>
                <div class="reg-group">
                    <button style="background-color: darkred;">Login</button>
                </div>

            </form>
            {!! Form::close() !!}
        </div>
    </section>

@endsection
