@extends('layouts.app')
@section('content')

@include('common.breadcrumb')


<div class="row">
	<div class="col-md-3">
	@include('post.partial.menu')        	
    </div>

    <div class="col-md-9">

		<div class="container">
			<nav class="navbar navbar-sort-container ">
				<div class="container">
			         
			         <ul class="nav navbar-nav">
						@foreach( $posts as $post )
				            <li class="">
				            <?php
				            	$href="#";
								
								if(  $post->type_id==1  ) :
			                		$href = "/posts/$post->token"  ;
								endif 
							?>
				                <a 	href="{{ $href }}" 
				                	@if(  $post->children->count() )
					                	class="dropdown-toggle" 
					                	data-toggle="dropdown" 
					                 	role="button" 
					                 	aria-expanded="false" 
				                 	@endif 
				                 >
				                   {{ $post->title }}  

				                   	@if(  $post->children->count()   )  
				                   		<span class="caret"></span> 
				                   	@endif 
				                </a>
					        	@if(  $post->children->count() )
					                <ul class="dropdown-menu" role="menu">
						                @foreach( $post->children as $child )   
						                    <li> <a href="/posts/{{ $child->token }}"> {{ $child->title }} </a> </li>
						                @endforeach	
					                </ul>                 
				                @endif                
				            </li> 
				 		@endforeach
			        </ul>  
			        
				</div>
			</nav>
		</div>

    </div>
</div>




@endsection

@section('script')
<script type="text/javascript">
	//
</script>
@endsection