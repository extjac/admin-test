@extends('layouts.app')
@section('content')

@include('common.breadcrumb')

<ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="#Details" data-toggle="tab">Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#Roster" data-toggle="tab">Roster</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#Schedule" data-toggle="tab">Schedule</a>
  </li>
</ul>
<div class="tab-content">
  <div class="tab-pane active" id="Details" style="padding-top: 10px"> @include('team.form.edit') </div>
  <div class="tab-pane" id="Roster"> soon </div>
  <div class="tab-pane" id="Schedule"> soon </div>
</div>


@endsection
@section('script')
<script type="text/javascript">
    //
</script>
@endsection