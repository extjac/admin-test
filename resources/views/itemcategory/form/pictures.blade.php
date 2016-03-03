
<div class="row">
  <div class="col-md-12">
    <a href="javascript:;" class="btn-upload-image">
      <img id="main-picture" src="{{ $post->picture==null ? "http://fakeimg.pl/850x480/" : "http://files.local/photos/posts/$post->id/$post->picture" }}" class="img-responsive img-fluid" alt="">
    </a>
  </div>
</div>

