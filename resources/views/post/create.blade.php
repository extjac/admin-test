@extends('layouts.app')
@section('content')

@include('common.breadcrumb')


<!-- FORM -->
<form name="form" class="form" method="post" action="{{ url('/posts') }}" autocomplete="off">
<input name="site_id" id="site_id" type="hidden" value="1">
<input name="type" id="type" type="hidden" value="1">
<input type="hidden" name="_token" value="{{ csrf_token() }}">


<button type="submit" class="btn btn-primary btn-save btn-rounded"  data-loading-text="Please wait...">Save Changes</button>

<hr>

<div class="row">
	<div class="col-md-3">
	@include('post.nav')
	</div>

    <div class="col-md-9">

			<div class="row">
			<div class="col-md-12">


			      <div class="row">
			        <div class="col-md-12">
			            <div class="form-group"> 
			                <label class="control-label" for="title">Title * </label>
			                <input  type="text" name="title" id="post_title" placeholder="Enter title" required class="form-control">
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
			                  <option value="{{$type->id}}">{{$type->name}}</option>
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
			                  $posts = App\Post::select('id', 'title')
			                  ->where('org_id', Auth::user()->org_id )
			                  ->where('parent_id', 0)
			                  ->where('type_id', 2)
			                  ->get() ?>
			                  <option value='0'>/root</option>
			                  @foreach($posts as $post)
			                  <option value="{{$post->id}}">{{$post->title}}</option>
			                  @endforeach
			                </select>     
			            </div>
			        </div>
			        <div class="col-md-3">
			            <div class="form-group"> 
			                <label class="control-label" for="parent_id">Order *</label>
			                <input  type="number" name="order" id="order" placeholder="Enter order" required class="form-control" minlength="1" maxlength="2">
			            </div>
			        </div>
			        <div class="col-md-3">
			            <div class="form-group"> 
			                <label class="control-label" for="status">Status *</label>
			                <select name='status' id="status"  class="form-control"  required>
			                  <option value='0'>Inactive</option>
			                  <option value="1">Active</option>
			                </select>   
			            </div>
			        </div>  
			      </div><!-- /row -->
			      <div class="row">
			        <div class="col-md-12">
			            <div class="form-group"> 
			                <label class="control-label" for="excerpt">Excerpt </label>
			                <textarea name="excerpt" id="excerpt"class="form-control " maxlength="155" placeholder="Enter up to 155 characters" rows="2"  ></textarea>
			            </div>
			        </div>
			      </div><!-- /row -->
			      <div class="row">
			        <div class="col-md-12">
			            <div class="form-group"> 
			                <label class="control-label" for="excerpt">Content </label>
			                <textarea name="content" id="content" class="form-control editor" rows="10"  ></textarea>
			            </div>
			        </div>
			      </div><!-- /row -->
			


			    </div>
			</div>
</div>

</div>

</form><!--/ END FORM -->

@endsection
@section('script')
<script type="text/javascript">
	//
</script>
@endsection