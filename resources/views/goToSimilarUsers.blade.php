@extends('master')
@section('goToSimilarUsers')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif
<br>
<br>
<br>
<div class = "ps-4">
	<form method="GET" action="/fetchSimilarUsers" class="d-flex">
		<p class = "text-nowrap pt-2">Enter userid:</p>
		<input class="form-control mx-2" type="search" placeholder="Search by userid" aria-label="Search" name="userid" maxlength="10">
	</form>
</div>	

<br>

@endsection
