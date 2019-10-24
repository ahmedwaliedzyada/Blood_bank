@extends('layouts.app')
@section('page_title')
    طلبات التبرع
@endsection
@section('small_title')
    قائمه من طلبات التبرع
@endsection
@section('content')




    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">قائمه من طلبات التبرع</h3>

            </div>
            <div class="box-body">
                @if(count([$records]))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>العمر</th>
                                    <th>رقم الهاتف</th>
                                    <th>اسم المستشفي</th>
                                    <th>الملاحظات</th>
                                    <th>المدن</th>
                                    <th>فصيله الدم</th>
                                    <th class="text-center">اظهار</th>
                                    <th class="text-center">مسح</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($records as $record)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$record->name}}</td>
                                        <td>{{$record->age}}</td>
                                        <td>{{$record->phone}}</td>
                                        <td>{{$record->hospital_name}}</td>
                                        <td>{{$record->notes}}</td>
                                        <td>{{$record->city->name}}</td>
                                        <td>{{$record->blood_type_id}}</td>

                                        <td class="text-center">
                                            {!! Form::open([
                                                'action' => ['DoRequestController@show',$record->id],
                                                'method' => 'get'
                                            ]) !!}
                                            <button type="submit" class="btn btn-success btn-xs">
                                                <i class="fa fa-edit">

                                                </i></button>
                                            {!! Form::close() !!}
                                        </td>
                                        <td class="text-center">
                                            {!! Form::open([
                                                'action' => ['DoRequestController@destroy',$record->id],
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
