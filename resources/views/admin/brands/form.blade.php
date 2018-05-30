<style media="screen">
    label{
        font-weight: bold;
    }
</style>
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

@if(isset($brand))
<div class="form-group">
    <label>Image</label>
    <input type="file" id="image1" name="image" value="{{$brand->image}}"><br>
    <img src="{{asset('page/img/brand/'.$brand->image)}}" id="image" style="width: 300px; height: 200px;">
</div>
@else
<div class="form-group">
    <label>Image</label>
    <input type="file" id="image1" name="image"><br>
    <img id="image" style="width: 300px; height: 300px;">
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
