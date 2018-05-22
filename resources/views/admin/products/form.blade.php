{!!csrf_field()!!}

<div class="form-group">
    {!! Form::label('name', 'Name of product') !!}
    <div class="form-controls {{ $errors->has('course') ? 'has-error' : '' }}">
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        @if ( $errors->has('name') )
            <span style="color: red;" class="text-warning">
                <strong> {{ $errors->first('name') }} </strong>
            </span>
        @endif
    </div>
</div>
