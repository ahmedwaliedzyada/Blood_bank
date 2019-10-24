@extends('layouts.app')
@section('page_title')
    مقالات
@endsection
@section('small_title')
    قائمه من المقالات
@endsection
@section('content')


    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">قائمه من المقالات</h3>

            </div>
            <div class="box-body">
                <a href="{{url(route('post.create'))}}" class="btn btn-primary">
                    <i class="fa fa-plus "></i>  اضافه مقال جديد</a>
                @if(count([$records]))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>القسم</th>
                                    <th>العنوان</th>
                                    <th>المحتوي</th>
                                    <th>الصور</th>
                                    <th class="text-center">تعديل</th>
                                    <th class="text-center">خذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($records as $record)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$record->category->name}}</td>
                                        <td>{{$record->title}}</td>
                                        <td>{{$record->content}}</td>
                                        <td><img src="{{($record->image)}}" style="height: 50px"></td>
                                        <td class="text-center">
                                            <a href="{{url(route('post.edit', $record->id))}}" class=" btn btn-success btn-xs">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            {!! Form::open([
                                                'action' => ['PostController@destroy',$record->id],
                                                'method' => 'delete'
                                            ]) !!}
                                            <button type="submit" class="delete_link btn btn-danger btn-xs">
                                                <i class="fa fa-trash-o">

                                                </i></button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-danger" role="alert">
                        No Data
                    </div>
                @endif
            </div>
        </div>
        <!-- /.box -->
        @include('flash::message')
    </section>
    <!-- /.content -->

@endsection

