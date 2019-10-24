@extends('layouts.app')
@inject('setting','App\Models\Setting')
@section('page_title')
    الاعدادات
@endsection
@section('small_title')
    الاعدادات
@endsection
@section('content')

    <div class="box box-danger">
        <div class="box-header">
            <h3 class="text-center text-aqua">تواصل معنا عبر</h3>
        </div>
        <div class="box-body">

            @foreach($records as $record)


            <div class="form-group">
                <label>الهاتف:</label>

                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-phone">
                            <div>
                                <input id="phone" type="text" class="form-control text-center
                                @error('phone') is-invalid @enderror"
                                 name="phone" value="{{$record->phone}}"
                                  autofocus>
                            </div>
                        </i>
                    </div>


                </div>
                <!-- /.input group -->
            </div>
                <div class="form-group">
                    <label>البريد الالكتروني:</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-paper-plane">
                                <div>
                                    <input id="email" type="text" class="form-control
                                        @error('email') is-invalid @enderror"
                                           name="email" value="{{$record->email}}"
                                           autofocus>
                                </div>
                            </i>
                        </div>


                    </div>
                    <!-- /.input group -->
                </div>
                <div class="form-group">
                    <label>رابط التطبيق:</label>

                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-envelope">
                                <div>
                                    <input id="link" type="text" class="form-control
                                        @error('link') is-invalid @enderror"
                                           name="link" value="{{$record->link_url}}"
                                           autofocus>
                                </div>
                            </i>
                        </div>


                    </div>
                    <!-- /.input group -->
                </div>
        </div>
        <!-- /.box-body -->
    </div>
    <div class="box">
        <h3 class="text-center text-aqua">تواصل معنا عبر وسائل التواصل الاجتماعي</h3>
        <div class="box-header">

        </div>

        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody>
                <tr>
                    <td><b>Facebook</b></td>
                    <td><a href="{{$record->facebook_url}}" class="fa fa-facebook fa-lg"></a></td>
                </tr>
                <tr>
                    <td><b>Twitter</b></td>
                    <td><a href="{{$record->twitter_url}}" class="fa fa-twitter-square fa-lg"></a></td>
                </tr>
                <tr>
                    <td><b>Youtube</b></td>
                    <td><a href="{{$record->youtube_url}}" class="fa fa-youtube fa-lg"></a></td>
                </tr>
                <tr>
                    <td><b>Instgram</b></td>
                    <td><a href="{{$record->instgram_url}}" class="fa fa-instagram fa-lg"></a></td>
                </tr>
                <tr>
                    <td><b>Whatsaap</b></td>
                    <td><a href="{{$record->whatsaap_url}}" class="fa fa-whatsapp fa-lg"></a></td>
                </tr>
                </tbody></table>
        </div>
        <!-- /.box-body -->
    </div>
@endforeach
@endsection
