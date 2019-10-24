
            <div class="box-body">
                {!! Form::model($model,[
                    'action' => ['CategoryController@update',$model->id],
                    'method' => 'put'
                ]) !!}
                @include('category.form')
            </div>
        @include('flash::message')



