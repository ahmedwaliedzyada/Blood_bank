<div>
    <div class="form-group">
        <label for="name">المدينه</label>
        {!! Form::text('name',null,[
            'class' =>'form-control'
        ]) !!}
        <label for="name">المحافظه</label>
        {!! Form::select('governorate_id',$governorate->pluck('name','id'),null,[
        'class'=>'form-control','placeholder'=>'اختار محافظتك']) !!}
    </div>
    @include('handler.errors')
    <div class="form-group">
        <button class="btn btn-primary" type="submit">موافق</button>
    </div>
    {!! Form::close() !!}
</div>
