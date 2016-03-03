<div class="row">
	<div class="col-md-12">
	   <a href="/posts/create" class="btn btn-success btn-sm" >
	      <i class="fa fa-plus"></i> Add 
	    </a>

	</div>
</div>

<br>

@foreach( $posts as $post)

<ul class="list-group">

  <li class="list-group-item" style="padding:0px; border: 0px">

   <?php if( $post->type_id==1) { ?> <i class="fa fa-file-text-o"></i> <?php } ?>
   <?php if( $post->type_id==2) { ?> <i class="fa fa-bars"></i> <?php } ?>

   {{ $post->title }} 

    <span class="label label-default label-pill pull-right">Edit</span>
        
        <?php
        $children = App\Post::where('org_id', $org_id )
    	->where('parent_id', $post->id )
    	->orderBy('order')
    	->get();
    	?>

    	@if(  $children )
        	
			<ul class="list-group">

			@foreach( $children as $child )

			  <li class="list-group-item" style="padding:0px; border: 0px" >

			    <i class="fa fa-file-text-o"></i> {{ $child->title }}

			    <span class="label label-default label-pill pull-right">Edit</span>

			  </li>

			  @endforeach	 

			</ul>
			 
		@endif

  </li>

</ul>

@endforeach	