@extends('layouts.app')
@inject('model','App\Models\Governorate')
@section('page_title')
   اضافه محافظه
@endsection
@section('content')



    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title"> اضافه محافظه</h3>
            </div>
            <div class="box-body">
                {!! Form::model($model,[
                    'action' => 'GovernorateController@store'
                ]) !!}
            @include('governorates.form')
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection
