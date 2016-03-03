@extends('layouts.app')
@section('content')

@include('common.breadcrumb')

<form name="form" class="form" method="post" action="{{ url('/posts/'.$post->token ) }}" autocomplete="off">
<input name="type" id="type" type="hidden" value="1">
<input type="hidden" name="_method" value="PUT">
<input type="hidden" name="_token" value="{{ csrf_token() }}">

      <a href="/posts/create" class="btn btn-success " >
        <i class="material-icons">add</i> add  new
      </a>
<button type="submit" class="btn btn-primary btn-save"  data-loading-text="Please wait...">Save Changes</button>
 
<hr>   
<div class="row">

  <div class="col-md-3">
  @include('post.nav')
  </div>

    <div class="col-md-9">


      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="title">Title * </label>
                <input  type="text" name="title" id="post_title" placeholder="Enter title" required class="form-control" value="{{ $post->title }}">
            </div>
        </div>     
      </div>
      <div class="row">
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="title">Type *</label>
                <select name='type_id' id="type_id"  class="form-control"  required>
                  <option value=''>-select-</option>
                  <?php $types = App\PostType::where('is_active', 1)->get() ?>
                  @foreach($types as $type)
                  <option value="{{$type->id}}" <?php if( $post->type_id==$type->id) echo 'selected' ?> >{{$type->name}}</option>
                  @endforeach
                </select>   
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="parent_id">Parent * </label>
                <select name='parent_id' id="parent_id"  class="form-control"  required>
                  <option value=''>-select-</option>
                  <?php 
                  $parent = App\Post::select('id', 'title')
                  ->where('org_id', Auth::user()->org_id )
                  ->where('parent_id', 0)
                  ->where('type_id', 2)
                  ->where('posts.id', '<>',  $post->id )
                  ->get() ?>                  
                  <option value='0' <?php if( $post->parent_id==0 ) echo 'selected' ?>  >/root</option>
                  @foreach($parent as $data)
                  <option value="{{ $data->id }}" <?php if( $post->parent_id==$data->id ) echo 'selected' ?>  >{{ $data->title }}</option>
                  @endforeach
                </select>                   
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="order">Order *</label>
                <input  type="number" name="order" id="order" placeholder="Enter order" required class="form-control" minlength="1" maxlength="2" value="{{ $post->order }}">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group"> 
                <label class="control-label" for="status">Status *</label>
                <select name='status' id="status"  class="form-control"  required>
                  <option value='0' <?php if( $post->status==0) echo 'selected' ?> >Inactive</option>
                  <option value="1" <?php if( $post->status==1) echo 'selected' ?> >Active</option>
                </select>   
            </div>
        </div>  
      </div><!-- /row -->
      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="excerpt">Excerpt </label>
                <textarea name="excerpt" id="excerpt"class="form-control " maxlength="155" placeholder="Enter up to 155 characters" rows="2"  >{{ $post->excerpt }}</textarea>
            </div>
        </div>
      </div><!-- /row -->
      <div class="row">
        <div class="col-md-12">
            <div class="form-group"> 
                <label class="control-label" for="excerpt">Content </label>
                <textarea name="content" id="content" class="form-control editor"  rows="10" >{{ $post->content }}</textarea>
            </div>
        </div>
      </div><!-- /row -->

</div>
</div>
</form><!--/ END FORM -->

@endsection
@section('script')
<script type="text/javascript">
	//
</script>
@endsection