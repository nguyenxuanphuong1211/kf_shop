<style media="screen">
    label{
        font-weight: bold;
    }
</style>
{!!csrf_field()!!}

<div class="form-group" >
    {!! Form::label('name', 'Name of category') !!}
    <div class="form-controls {{ $errors->has('name') ? 'has-error' : '' }}">
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
        @if ( $errors->has('name') )
            <span style="color: red !important;" class="text-warning">
                <strong> {{ $errors->first('name') }} </strong>
            </span>
        @endif
    </div>
</div>
{!! Form::submit('Submit',['class'=>'btn btn-success']) !!}
{!! Form::reset('Reset',['class'=>'btn btn-default']) !!}
