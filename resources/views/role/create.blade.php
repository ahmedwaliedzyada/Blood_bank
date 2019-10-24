@extends('layouts.app')
@inject('model','App\Models\Role')
@section('page_title')
   اضافه رتبه
@endsection
@section('content')


    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">اضافه رتبه</h3>

            </div>
            <div class="box-body">
                {!! Form::model($model,[
                    'action' => 'RoleController@store'
                ]) !!}
                @include('role.form')
            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection
