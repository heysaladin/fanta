@extends('layouts.app')
@section('title')
Add New Post
@endsection
@section('content')
<script src="https://cdn.tiny.cloud/1/6vhvx7w4ybtlohvskhxktnjxr0i4f2xegr40sjq30qlstvrs/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
  tinymce.init({
        selector : "textarea",
        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste jbimages"],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages",
    });
</script>
<form action="/new-post" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="category" value="1">
  <div class="form-group">
    <input required="required" value="{{ old('title') }}" placeholder="Enter title here" type="text" name = "title"class="form-control" />
  </div>
  <div class="form-group">
    <input required="required" value="{{ old('image') }}" placeholder="Enter image here" type="text" name = "image"class="form-control" />
  </div>
  <div class="form-group">
    <textarea name='body'class="form-control">{{ old('body') }}</textarea>
  </div>

  <!-- --- -->

  <div class="form-group">
    <input required="required" value="{{ old('open') }}" placeholder="Enter open here" type="text" name = "open" class="form-control" />
  </div>
  <div class="form-group">
    <input required="required" value="{{ old('is_real_project') }}" placeholder="Enter is_real_project here" type="text" name = "is_real_project" class="form-control" />
  </div>

  <div class="form-group">
    <input required="required" value="{{ old('real_date') }}" placeholder="Enter real_date here" type="text" name = "real_date" class="form-control" />
  </div>
  <div class="form-group">
    <input required="required" value="{{ old('keywords') }}" placeholder="Enter keywords here" type="text" name = "keywords" class="form-control" />
  </div>
  <div class="form-group">
    <input required="required" value="{{ old('meta_desc') }}" placeholder="Enter meta_desc here" type="text" name = "meta_desc" class="form-control" />
  </div>
  <div class="form-group">
    <input required="required" value="{{ old('copyright') }}" placeholder="Enter copyright here" type="text" name = "copyright" class="form-control" />
  </div>

  <div class="form-group">
    <input required="required" value="{{ old('category_id') }}" placeholder="Enter category_id here" type="text" name = "category_id" class="form-control" />
  </div>
  <div class="form-group">
    <input value="{{ old('support_author_id') }}" placeholder="Enter support_author_id here" type="text" name = "support_author_id" class="form-control" />
  </div>

  <!-- --- -->

  <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
  <input type="submit" name='save' class="btn btn-default" value = "Save Draft" />
</form>
@endsection