@extends('layouts.app')
@inject('client', 'App\Models\Client')
@inject('city', 'App\Models\city')
@inject('post', 'App\Models\Post')
@inject('governorate', 'App\Models\governorate')
@inject('category', 'App\Models\Category')
@inject('donationrequest', 'App\Models\DonationRequest')
@inject('contact', 'App\Models\Contact')
@section('content')
<div class="container">
    <div class="card-header"><b>الصفحه الرئيسيه</b></div>
    <div class="row justify-content-center">

        <div class="col-md-8">
            <div class="card">

                <br>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><b>العملاء</b></span>
                                    <span class="info-box-number">{{($client->count())}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-gray"><i class="ion ion-ios-home"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><b>المحافظات</b></span>
                                    <span class="info-box-number">{{($governorate->count())}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-teal"><i class="ion ion-merge"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><b>المدن</b></span>
                                    <span class="info-box-number">{{($city->count())}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-blue"><i class="ion ion-ios-filing"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><b>الاقسام</b></span>
                                    <span class="info-box-number">{{($category->count())}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="ion ion-ios-copy"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><b>المقالات</b></span>
                                    <span class="info-box-number">{{($post->count())}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-maroon"><i class="ion ion-ios-heart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><b>طلبات التبرع</b></span>
                                    <span class="info-box-number">{{($donationrequest->count())}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>

                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="ion ion-ios-chatboxes"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text"><b>الرسائل</b></span>
                                    <span class="info-box-number">{{($contact->count())}}</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
