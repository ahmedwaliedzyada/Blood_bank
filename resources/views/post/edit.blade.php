@extends('layouts.app')
@section('page_title')
@inject('category','App\Models\Category')
   تعديل مقال
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">تعديل مقال</h3>


            </div>
            <div class="box-body">
                {!! Form::model($model,[
                    'action' => ['PostController@update',$model->id],
                    'method' => 'put'
                ]) !!}
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
                    'class'=>'form-control','placeholder'=>'choose your category']) !!}
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
        @include('flash::message')
    </section>
    <!-- /.content -->

@endsection
