@extends('layouts.app')
@section('page_title')
    العملاء
@endsection
@section('small_title')
    قائمه من العملاء
@endsection
@section('content')




    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">قائمه من العملاء</h3>

            </div>
            <div class="box-body">
                <div> @include('flash::message')</div>
                @if(count([$records]))
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>الاسم</th>
                                <th>رقم الهاتف</th>
                                <th>البريد الالكتروني</th>
                                <th>تاريخ الميلاد</th>
                                <th>فصيله الدم</th>
                                <th>المدينه</th>
                                <th class="text-center">الحاله</th>
                                <th class="text-center">حذف</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$record->name}}</td>
                                    <td>{{$record->phone}}</td>
                                    <td>{{$record->email}}</td>
                                    <td>{{$record->date_of_birth}}</td>
                                    <td>{{$record->blood_type}}</td>
                                    <td>{{$record->city->name}}</td>
                                    @if($record->is_active == 1)
                                        <td class="text-center">
                                            <a href="active/{{$record->id}}">
                                                <button type="submit" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> نشط</button>
                                            </a>

                                        </td>
                                    @else
                                        <td class="text-center">
                                            <a href="disactive/{{$record->id}}">
                                                <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i>غير نشط</button>
                                            </a>

                                        </td>
                                    @endif
                                    <td class="text-center">
                                        {!! Form::open([
                                            'action' => ['ClientController@destroy',$record->id],
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

    </section>
    <!-- /.content -->

@endsection
