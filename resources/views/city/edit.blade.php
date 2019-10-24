@extends('layouts.app')
@section('page_title')
@inject('governorate','App\Models\Governorate')
تعديل المدينه
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل المدينه</h3>


            </div>
            <div class="box-body">
                {!! Form::model($model,[
                    'action' => ['CityController@update',$model->id],
                    'method' => 'put'
                ]) !!}
            @include('city.form')
            </div>
        </div>
        <!-- /.box -->
        @include('flash::message')
    </section>
    <!-- /.content -->

@endsection
