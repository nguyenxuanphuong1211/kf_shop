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
@if(isset($blog))
<div class="form-group">
    <label>Image</label>
    <input type="file" id="image1" name="thumbnail" value="{{$blog->thumbnail}}"><br>
    <img src="{{asset('page/img/blog/'.$blog->thumbnail)}}" id="image" style="width: 300px; height: 300px;">
</div>
@else
<div class="form-group">
    <label>Image</label>
    <input type="file" id="image1" name="thumbnail"><br>
    <img id="image" style="width: 300px; height: 300px;">
</div>
@endif
@if ($errors->has('thumbnail'))
      <span class="help-block" style="color:red;">
          <strong>{{ $errors->first('thumbnail') }}</strong>
      </span>
 @endif


<div class="form-group">
    {!! Form::label('content', 'Content') !!}
    <div class="form-controls {{ $errors->has('content') ? 'has-error' : '' }}">
        {!! Form::textarea('content', null, ['class'=>'form-control', 'id'=>'content']) !!}
        <script>CKEDITOR.replace('content');</script>
        @if ( $errors->has('content') )
            <span style="color: red !important;" class="text-warning">
                <strong> {{ $errors->first('content') }} </strong>
            </span>
        @endif
    </div>
</div>
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
