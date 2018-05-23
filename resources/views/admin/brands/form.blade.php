{!!csrf_field()!!}

<div class="form-group">
    {!! Form::label('name', 'Name of brand') !!}
    <div class="form-controls {{ $errors->has('name') ? 'has-error' : '' }}">
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        @if ( $errors->has('name') )
            <span style="color: red !important;" class="text-warning">
                <strong> {{ $errors->first('name') }} </strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('image','Image') !!}
	<div class="form-controls {{ $errors->has('image') ? 'has-error' : '' }}">
		{!! Form::file('image',null,['class'=>'form-control']) !!}
		@if ($errors->has('image'))
			<span style="color: red;" class="text-warning">
				<strong> {{ $errors->first('image') }}</strong>
			</span>
		@endif
	</div>
</div>
{!! Form::submit('Submit',['class'=>'btn btn-default']) !!}
