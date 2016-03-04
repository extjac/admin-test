@extends('layouts.app')
@section('content')

@include('common.breadcrumb')



<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#Details" data-toggle="tab">Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#Account" data-toggle="tab"> Users </a>
  </li>
</ul>
<div class="tab-content">
  <div class="tab-pane active" id="Details" style="padding-top: 10px" > @include('organization.form.edit') </div>
  <div class="tab-pane" id="Account"style="padding-top: 10px" > to be added </div>
</div>

@endsection
@section('script')
<script type="text/javascript">
	//
</script>
@endsection