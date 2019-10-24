

            <div class="box-body">
                {!! Form::model($model,[
                    'action' => ['PostController@update',$model->id],
                    'method' => 'put'
                ]) !!}
                @include('post.form')
            </div>
        @include('flash::message')
