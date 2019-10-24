@inject('perm','App\Models\Permission')
    <div class="form-group">
        <label for="name">الاسم</label>
        {!! Form::text('name',null,[
            'class' =>'form-control'
        ]) !!}
    </div>

    <div class="form-group">
        <label for="display_name">الصفه</label>
        {!! Form::text('display_name',null,[
            'class' =>'form-control'
        ]) !!}
    </div>

    <div class="form-group">
        <label for="Description">الوصف</label>
        {!! Form::textarea('Description',null,[
            'class' =>'form-control'
        ]) !!}
    </div>

    <div class="form-group">
        <label for="name">الصلاحيات</label><br>
        <label for='selectAll'> اختيار الكل</label>
        <input id="selectAll" type="checkbox">
        <div class="row">
            @foreach($perm->all() as $permission)
                <div class="col-sm-3">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="permission_list[]" value="{{$permission->id}}"
                                   @if($model->hasPermission($permission->name))
                                       checked
                                   @endif
                            >
                            {{$permission->display_name}}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('handler.errors')
    <div class="form-group">
        <button class="btn btn-primary" type="submit">موافق</button>
    </div>
    {!! Form::close() !!}
</div>
