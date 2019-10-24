@extends('layouts.app')
@inject('model','App\Models\Category')
@section('page_title')
   اضافه قسم
@endsection
@section('content')



    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">اضافه قسم</h3>

            </div>
            <div class="box-body">
                {!! Form::model($model,[
                    'action' => 'CategoryController@store'
                ]) !!}
                @include('category.form')
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection
