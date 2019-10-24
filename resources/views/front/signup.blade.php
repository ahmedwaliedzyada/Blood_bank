@extends('front.style.master')
@inject('model','App\Models\Client')
@inject('bloodType','App\Models\BloodType')
@section('content')

    <!-- Navigator Start -->
    <section id="navigator">
        <div class="container">
            <div class="path">
                <div class="path-main" style="color: darkred; display:inline-block;">Home</div>
                <div class="path-directio" style="color: grey; display:inline-block;"> / Sign up</div>
            </div>

        </div>
    </section>
    <!-- Navigator End -->

    <!-- Sign Up Start -->
    <section id="sign-up">
        <div class="container">
                <img src="{{asset('front/imgs/log.png')}}" alt="">
            {!! Form::model($model,[
             'action' => 'client\WebController@register',
             'method' => 'POST'
            ]) !!}
            <div class="col-md-12 signup-form">
                <form class="needs-validation" novalidate>
                    <div class="form-row">

            {!! Form::text('name' , $model->name, [
              'class' => 'form-control',

              'placeholder' => 'الاسم'
            ]) !!}
            <br>

            {!! Form::text('email' , $model->email, [
              'class' => 'form-control',

              'placeholder' => 'البريد الالكتروني'
            ]) !!}
            <br>
            {!! Form::password('password',[
              'class' => 'form-control',

              'placeholder' => 'كلمة السر'
            ]) !!}
            <br>
            {!! Form::password('password_confirmation' ,[
             'class' => 'form-control',
              'placeholder' => 'تأكيد كلمة السر'
            ]) !!}
            <br>
            {!! Form::text('date_of_birth' , $model->date_of_birth, [
              'class' => 'form-control',
              'placeholder' => 'تاريخ الميلاد'
            ]) !!}
            <br>

            {!!Form::select('city_id', $cities->pluck('name', 'id')->toArray(), null, [
                'class' => 'custom-select custom-select-lg mb-3 mt-3 custom-width',

                'placeholder' => 'اختر مدينه'
            ]) !!}

            {!! Form::select('blood_type_id',$bloodType->pluck('type', 'id')->toArray(), null, [
               'class'=>'custom-select custom-select-lg mb-3 mt-3 custom-width',
               'placeholder' => 'اختر الفصيله',

             ]) !!}

            {!! Form::text('phone' , $model->phone, [
             'class' => 'form-control',
             'id' => 'validationCustom05',
             'placeholder' => 'رقم الهاتف'
           ]) !!}

            {!! Form::text('last_donation_date' , $model->last_donation_date, [
              'class' => 'form-control',
              'id' => 'validationCustom03',
              'placeholder' => 'آخر تاريخ تبرع'
            ]) !!}
                        @include('handler.errors')
               <div class="reg-group m-5">
                    <input class="check" type="checkbox" required="" style="height: auto; display:inline; margin: 0 auto;">Agree on terms and conditions<br>
                   <button class="submit" type="submit" style="background-color: rgb(51, 58, 65);">Submit</button>
               </div>
            </div>
            </form>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
    <!-- Sign Up End -->

@endsection
