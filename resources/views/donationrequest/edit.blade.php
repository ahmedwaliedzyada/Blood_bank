@extends('layouts.app')

@section('content')

    @push('js')
        <!-- Location picker -->
        <script type="text/javascript"
                src='https://maps.google.com/maps/api/js?sensor=false&libraries=places&key=AIzaSyCxQGsoLVUxSCQm2Hz_0vuJxyhn98gZrKQ'></script>
        <script src="{{ asset('adminlte/js/locationpicker.jquery.js')}}"></script>
        <?php
        $lat = !empty($record->latitude) ? $record->latitude:'30.06303689611116';
        $lng = !empty($record->longitude) ? $record->longitude:'31.23264503479004';
        ?>
        <script>
            $('#us1').locationpicker({
                location: {
                    latitude:${{ $lat }},
                    longitude: ${{ $lng }},
                },
                radius: 300,
                markerIcon: '{{asset('uploads/1.png')}}',
                inputBinding: {
                    latitudeInput: $('#lat'),
                    longitudeInput: $('#lng'),
                    // radiusInput: $('#us2-radius'),
                    locationNameInput: $('#us2-address')
                }
            });
        </script>
    @endpush

    <header class="bg-primary text-white">
        <div class="container text-center">
            <h1>طلب التبرع</h1>
            <p class="lead">{{$record->name}}</p>
        </div>
    </header>


        <div class="container text-center">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <h2>العمر :</h2>
                    <p class="lead">({{$record->age}})</p>
                </div>
            </div>
        </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h2>رقم الهاتف :</h2>
                <p class="lead">({{$record->phone}})</p>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h2>اسم المستشفي :</h2>
                <p class="lead">({{$record->hospital_name}})</p>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h2>المدينه :</h2>
                <p class="lead">({{$record->city->name}})</p>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h2>فصيله الدم :</h2>
                <p class="lead">({{$record->blood_type_id}})</p>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <h2>الملاحظات :</h2>
                <p class="lead">({{$record->notes}})</p>
            </div>
        </div>
    </div>
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div>
                    <div id="us1" style="width: 500px; height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>


    </body>
    </html>


{{--    <td>{{$record->longitude}}</td>--}}
{{--    <td>{{$record->latitude}}</td>--}}
@endsection



