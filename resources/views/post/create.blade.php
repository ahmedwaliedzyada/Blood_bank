@extends('layouts.app')
@inject('model','App\Models\Post')
@inject('category','App\Models\Category')
@section('page_title')
   اضافه مقال جديد
@endsection
@section('content')



    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">اضافه مقال جديد</h3>
            </div>
            <div class="box-body">
                {!! Form::model($model,[
                    'action' => 'PostController@store',
                    'files' => true
                ]) !!}
                <div class="form-group">
                <div class="form-group">
                    <label for="title">العنوان</label>
                    {!! Form::text('title',null,[
                        'class' =>'form-control'
                    ]) !!}
                    <label for="content">المحتوي</label>
                    {!! Form::textarea('content',null,[
                        'class' =>'form-control'
                    ]) !!}
                    <label for="name">القسم</label>
                    {!! Form::select('category_id',$category->pluck('name','id'),null,[
                    'class'=>'form-control','placeholder'=>'اختار قسم']) !!}

                    <label for="image">الصور</label>

                    {!! Form::file('image',null,[
                        'class' =>'form-control'
                    ]) !!}
                </div>
                @include('handler.errors')
                <div class="form-group">
                    <button class="btn btn-primary" type="submit">موافق</button>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->

@endsection
