<style type="text/css">


/**
 * Framework starts from here ...
 * ------------------------------
 */

.tree,
.tree ul {
  margin:0 0 0 1em; /* indentation */
  padding:0;
  list-style:none;
  color:#369;
  position:relative;
  font-size: 18px;
}

.tree ul {margin-left:.5em} /* (indentation/2) */

.tree:before,
.tree ul:before {
  content:"";
  display:block;
  width:0;
  position:absolute;
  top:0;
  bottom:0;
  left:0;
  border-left:1px solid;
}

.tree li {
  margin:0;
  padding:0 1.5em; /* indentation + .5em */
  line-height:2em; /* default list item's `line-height` */
  font-weight:bold;
  position:relative;
}

.tree li:before {
  content:"";
  display:block;
  width:10px; /* same with indentation */
  height:0;
  border-top:1px solid;
  margin-top:-1px; /* border top width */
  position:absolute;
  top:1em; /* (line-height/2) */
  left:0;
}

.tree li:last-child:before {
  background:white; /* same with body background */
  height:auto;
  top:1em; /* (line-height/2) */
  bottom:0;
}	
</style>

<!--
<div>
  <p> / Root</p>

  <ul class="tree">

    <li>
      <ul>
        <li>Birds</li>
        <li>Mammals
          <ul>
            <li>Elephant</li>
            <li>Mouse</li>
          </ul>
        </li>
        <li>Reptiles</li>
      </ul>
    </li>
  
  </ul>
</div>
-->



		  <p> Root</p>

		  <ul class="tree">

		  @foreach( $posts as $post)

		    <li>{{ $post->title }} <a href="{{ url('/posts/'. $post->token. '/edit') }}" class="btn btn-link btn-xs "> edit </a>

			@if(  $post->children )

		      <ul>
		    
		      	@foreach( $post->children as $child )
		    
		        <li>{{ $child->title }} <a href="{{ url('/posts/'. $child->token .'/edit') }}" class="btn btn-link btn-xs "> edit </a></li>
		    
		        @endforeach	
		    
		      </ul>
			
			@endif
		    
		    </li>
			
			@endforeach	    
		  
		  </ul>