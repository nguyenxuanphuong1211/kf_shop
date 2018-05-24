{!!csrf_field()!!}

<div class="form-group">
    {!! Form::label('title_1', 'Title 1') !!}
    <div class="form-controls {{ $errors->has('title_1') ? 'has-error' : '' }}">
        {!! Form::text('title_1', null, ['class'=>'form-control']) !!}
        @if ( $errors->has('title_1') )
            <span style="color: red !important;" class="text-warning">
                <strong> {{ $errors->first('title_1') }} </strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('title_2', 'Title 2') !!}
    <div class="form-controls {{ $errors->has('title_2') ? 'has-error' : '' }}">
        {!! Form::text('title_2', null, ['class'=>'form-control']) !!}
        @if ( $errors->has('title_2') )
            <span style="color: red !important;" class="text-warning">
                <strong> {{ $errors->first('title_2') }} </strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('title_3', 'Title 3') !!}
    <div class="form-controls {{ $errors->has('title_3') ? 'has-error' : '' }}">
        {!! Form::text('title_3', null, ['class'=>'form-control']) !!}
        @if ( $errors->has('title_3') )
            <span style="color: red !important;" class="text-warning">
                <strong> {{ $errors->first('title_3') }} </strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('link', 'Link') !!}
    <div class="form-controls {{ $errors->has('link') ? 'has-error' : '' }}">
        {!! Form::text('link', null, ['class'=>'form-control']) !!}
        @if ( $errors->has('link') )
            <span style="color: red !important;" class="text-warning">
                <strong> {{ $errors->first('link') }} </strong>
            </span>
        @endif
    </div>
</div>

@if(isset($slide))
<div class="form-group">
    <label>Image</label>
    <input type="file" id="image1" name="image" value="{{$slide->image}}"><br>
    <img src="{{asset('page/img/slider/'.$slide->image)}}" id="image" style="width: 300px; height: 150px;">
</div>
@else
<div class="form-group">
    <label>Image</label>
    <input type="file" id="image1" name="image"><br>
    <img id="image" style="width: 300px; height: 150;">
</div>
@endif
@if ($errors->has('image'))
      <span class="help-block" style="color:red;">
          <strong>{{ $errors->first('image') }}</strong>
      </span>
 @endif
 <br>

{!! Form::submit('Submit',['class'=>'btn btn-success']) !!}
{!! Form::reset('Reset',['class'=>'btn btn-default']) !!}
<br><br>
<script type="text/javascript">
    document.getElementById("image1").onchange = function () {
       var reader = new FileReader();

       reader.onload = function (e) {
           // get loaded data and render thumbnail.
           document.getElementById("image").src = e.target.result;
       };

       // read the image file as a data URL.
       reader.readAsDataURL(this.files[0]);
       };
</script>
