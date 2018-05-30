<style media="screen">
    label{
        font-weight: bold;
    }
</style>
{!!csrf_field()!!}

<div class="row">
    <div class="col-lg-6">
        <div class="form-group">
            {!! Form::label('name', 'Name of product') !!}
            <div class="form-controls {{ $errors->has('course') ? 'has-error' : '' }}">
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                @if ( $errors->has('name') )
                    <span style="color: red!important;" class="text-warning">
                        <strong> {{ $errors->first('name') }} </strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('description_brief', 'Brief description') !!}
            <div class="form-controls {{ $errors->has('description_brief') ? 'has-error' : '' }}">
                {!! Form::textarea('description_brief', null, ['class'=>'form-control', 'rows'=>'4']) !!}
                @if ( $errors->has('description_brief') )
                    <span style="color: red!important;" class="text-warning">
                        <strong> {{ $errors->first('description_brief') }} </strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('description_detail', 'Detail description') !!}
            <div class="form-controls {{ $errors->has('description_detail') ? 'has-error' : '' }}">
                {!! Form::textarea('description_detail', null, ['class'=>'form-control', 'id'=>'description_detail']) !!}
                @if ( $errors->has('description_detail') )
                    <span style="color: red!important;" class="text-warning">
                        <strong> {{ $errors->first('description_detail') }} </strong>
                    </span>
                @endif
                <script>CKEDITOR.replace('description_detail');</script>
            </div>
        </div>

    </div>

    <div class="col-lg-6">

                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::label('category_id', 'Category') !!}
                            <div class="form-controls {{ $errors->has('category_id') ? 'has-error' : '' }}">
                                {!! Form::select('category_id', $categories_pr, null,['placeholder'=>'Select', 'style'=>'width: 150px;'])!!}<br>
                                @if ( $errors->has('category_id') )
                                    <span style="color: red!important;" class="text-warning">
                                        <strong> {{ $errors->first('category_id') }} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::label('brand_id', 'Brand') !!}
                            <div class="form-controls {{ $errors->has('brand_id') ? 'has-error' : '' }}">
                                {!! Form::select('brand_id', $brands_pr,null,['placeholder'=>'Select', 'style'=>'width: 150px;'])!!}<br>
                                @if ( $errors->has('brand_id') )
                                    <span style="color: red!important;" class="text-warning">
                                        <strong> {{ $errors->first('brand_id') }} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::label('hot', 'Featured') !!}
                            <div class="form-controls {{ $errors->has('hot') ? 'has-error' : '' }}">
                                {!! Form::select('hot' , ['1' => 'Yes', '0' => 'No'], null, ['placeholder'=>'Select'])!!}
                                @if ( $errors->has('hot') )
                                    <span style="color: red!important;" class="text-warning">
                                        <strong> {{ $errors->first('hot') }} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="form-group">
                            {!! Form::label('deals', 'Sale') !!}
                            <div class="form-controls {{ $errors->has('deals') ? 'has-error' : '' }}">
                                {!! Form::select('deals' , ['1' => 'Yes', '0' => 'No'], null, ['placeholder'=>'Select'])!!}
                                @if ( $errors->has('deals') )
                                    <span style="color: red!important;" class="text-warning">
                                        <strong> {{ $errors->first('deals') }} </strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>



        <div class="form-group">
            {!! Form::label('quantity', 'Quantity') !!}
            <div class="form-controls {{ $errors->has('quantity') ? 'has-error' : '' }}">
                {!! Form::number('quantity', null, ['class'=>'form-control']) !!}
                @if ( $errors->has('quantity') )
                    <span style="color: red!important;" class="text-warning">
                        <strong> {{ $errors->first('quantity') }} </strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('unit_price', 'Unit Price') !!}
            <div class="form-controls {{ $errors->has('unit_price') ? 'has-error' : '' }}">
                {!! Form::number('unit_price', null, ['class'=>'form-control']) !!}
                @if ( $errors->has('unit_price') )
                    <span style="color: red!important;" class="text-warning">
                        <strong> {{ $errors->first('unit_price') }} </strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            {!! Form::label('promotion_price', 'Promotion Price') !!}
            <div class="form-controls {{ $errors->has('promotion_price') ? 'has-error' : '' }}">
                {!! Form::number('promotion_price', null, ['class'=>'form-control']) !!}
                @if ( $errors->has('promotion_price') )
                    <span style="color: red!important;" class="text-warning">
                        <strong> {{ $errors->first('promotion_price') }} </strong>
                    </span>
                @endif
            </div>
        </div>
        @if(isset($product))
        <div class="form-group">
            <label>Image</label>
            <input type="file" id="image1" name="image" value="{{$product->image}}"><br>
            <img src="{{asset('page/img/products/'.$product->image)}}" id="image" style="width: 200px; height: 300px;">
        </div>
        @else
        <div class="form-group">
            <label>Image</label>
            <input type="file" id="image1" name="image"><br>
            <img id="image" style="width: 200px; height: 300px;">
        </div>
        @endif
        @if ($errors->has('image'))
              <span class="help-block" style="color:red;">
                  <strong>{{ $errors->first('image') }}</strong>
              </span>
         @endif

         <div class="form-group">
             <label>Related Image</label>
             <input name="image-rel[]" id="file-input" type="file" multiple value=""><br>

             <div style="width: 800; height: 100px;" id="preview"></div>
         </div>
         @if ($errors->has('image-rel'))
               <span class="help-block" style="color:red;">
                   <strong>{{ $errors->first('image-rel') }}</strong>
               </span>
          @endif
    </div>
</div>

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

<script type="text/javascript">
    function previewImages() {

    var preview = document.querySelector('#preview');

    if (this.files) {
    [].forEach.call(this.files, readAndPreview);
    }

    function readAndPreview(file) {

    // Make sure `file.name` matches our extensions criteria
    if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
      return alert(file.name + " is not an image");
    } // else...

    var reader = new FileReader();

    reader.addEventListener("load", function() {
      var image = new Image();
      image.height = 120;
      image.width = 80;
      image.title  = file.name;
      image.src    = this.result;
      preview.appendChild(image);
    }, false);

    reader.readAsDataURL(file);

    }

    }

    document.querySelector('#file-input').addEventListener("change", previewImages, false);
</script>
