
            <div class="box-body">
                {!! Form::model($model,[
                    'action' => ['GovernorateController@update',$model->id],
                    'method' => 'put'
                ]) !!}
                @include('governorates.form')
                @include('flash::message')
            </div>

