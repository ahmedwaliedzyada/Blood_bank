@extends('layouts.app')
@section('page_title')
    تعديل قسم
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل قسم</h3>


            </div>
            <div class="box-body">
                {!! Form::model($model,[
                    'action' => ['CategoryController@update',$model->id],
                    'method' => 'put'
                ]) !!}
            @include('category.form')
            </div>
        </div>
        <!-- /.box -->
        @include('flash::message')
    </section>

    <!-- /.content -->

@endsection
