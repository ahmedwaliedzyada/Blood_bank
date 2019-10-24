
            <div class="box-body">
                {!! Form::model($model,[
                    'action' => ['CityController@update',$model->id],
                    'method' => 'put'
                ]) !!}
                @include('city.form')
            </div>
        @include('flash::message')

