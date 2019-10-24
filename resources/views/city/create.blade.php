@extends('layouts.app')
@inject('model','App\Models\City')
@inject('governorate','App\Models\Governorate')
@section('page_title')
   اضافه مدينه
@endsection
@section('content')



    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">اضافه مدينه</h3>

            </div>
            <div class="box-body">
                {!! Form::model($model,[
                    'action' => 'CityController@store'
                ]) !!}
                @include('city.form')
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection
