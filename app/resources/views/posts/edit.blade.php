@extends('layouts.app')
@section('title')
Edit Post
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
<form method="post" action='{{ url("/update") }}'>
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="post_id" value="{{ $post->id }}{{ old('post_id') }}">
  <div class="form-group">
    <input required="required" placeholder="Enter title here" type="text" name = "title" class="form-control" value="@if(!old('title')){{$post->title}}@endif{{ old('title') }}"/>
  </div>
  <div class="form-group">
    <input required="required" placeholder="Enter image here" type="text" name = "image" class="form-control" value="@if(!old('image')){{$post->image}}@endif{{ old('image') }}"/>
  </div>
  <div class="form-group">
    <textarea name='body'class="form-control">
      @if(!old('body'))
      {!! $post->body !!}
      @endif
      {!! old('body') !!}
    </textarea>
  </div>

  <!-- --- -->

  {!! old('open') !!}
  <div class="form-group">
    <input required="required" placeholder="Enter open here" type="text" name = "open" class="form-control" value="@if(!old('open')){{$post->open}}@endif{{ old('open') }}" />
  </div>
  <div class="form-group">
    <input required="required" placeholder="Enter is_real_project here" type="text" name = "is_real_project" class="form-control" value="@if(!old('is_real_project')){{$post->is_real_project}}@endif{{ old('is_real_project') }}" />
  </div>

  <div class="form-group">
    <input required="required" placeholder="Enter real_date here" type="text" name = "real_date" class="form-control" value="@if(!old('real_date')){{$post->real_date}}@endif{{ old('real_date') }}" />
  </div>
  <div class="form-group">
    <input required="required" placeholder="Enter keywords here" type="text" name = "keywords" class="form-control" value="@if(!old('keywords')){{$post->keywords}}@endif{{ old('keywords') }}" />
  </div>
  <div class="form-group">
    <input required="required" placeholder="Enter meta_desc here" type="text" name = "meta_desc" class="form-control" value="@if(!old('meta_desc')){{$post->meta_desc}}@endif{{ old('meta_desc') }}" />
  </div>
  <div class="form-group">
    <input required="required" placeholder="Enter copyright here" type="text" name = "copyright" class="form-control" value="@if(!old('copyright')){{$post->copyright}}@endif{{ old('copyright') }}" />
  </div>

  <div class="form-group">
    <input required="required" placeholder="Enter category_id here" type="text" name = "category_id" class="form-control" value="@if(!old('category_id')){{$post->category_id}}@endif{{ old('category_id') }}" />
  </div>
  <div class="form-group">
    <input placeholder="Enter support_author_id here" type="text" name = "support_author_id" class="form-control" value="@if(!old('support_author_id')){{$post->support_author_id}}@endif{{ old('support_author_id') }}" />
  </div>

  <!-- --- -->

  @if($post->active == '1')
  <input type="submit" name='publish' class="btn btn-success" value = "Update"/>
  @else
  <input type="submit" name='publish' class="btn btn-success" value = "Publish"/>
  @endif
  <input type="submit" name='save' class="btn btn-default" value = "Save As Draft" />
  <a href="{{  url('delete/'.$post->id.'?_token='.csrf_token()) }}" class="btn btn-danger">Delete</a>
</form>
@endsection