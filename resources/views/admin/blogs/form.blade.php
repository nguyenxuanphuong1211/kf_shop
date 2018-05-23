{!!csrf_field()!!}

<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    <div class="form-controls {{ $errors->has('title') ? 'has-error' : '' }}">
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
        @if ( $errors->has('title') )
            <span style="color: red !important;" class="text-warning">
                <strong> {{ $errors->first('title') }} </strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('thumbnail','Image') !!}
	<div class="form-controls {{ $errors->has('thumbnail') ? 'has-error' : '' }}">
		{!! Form::file('thumbnail',null,['class'=>'form-control']) !!}
		@if ($errors->has('thumbnail'))
			<span style="color: red;" class="text-warning">
				<strong> {{ $errors->first('thumbnail') }}</strong>
			</span>
		@endif
	</div>
</div>

<div class="form-group">
    {!! Form::label('content', 'Content') !!}
    <div class="form-controls {{ $errors->has('content') ? 'has-error' : '' }}">
        {!! Form::textarea('content', null, ['class'=>'form-control']) !!}
        @if ( $errors->has('content') )
            <span style="color: red !important;" class="text-warning">
                <strong> {{ $errors->first('content') }} </strong>
            </span>
        @endif
    </div>
</div>
{!! Form::submit('Submit',['class'=>'btn btn-default']) !!}
