@extends('master')
@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="card-header">
	<blockquote class="blockquote">
	<h2 class="mb-0 d-flex justify-content-center" ><b>{{$header}}</b></h2>
	</blockquote>
</div>
<br>
<div class="row row-cols-5 ps-4">
	@if(count($data) > 0)  
	@foreach($data as $row)
	<div class="card-deck">
		<div class="card border-dark mb-3" style="width: 35rem; height: 15rem">
			<div class="card-header">
					<b>{{ $row->title }}</b>
			</div>
			<div class="card-body text-dark overflow-auto">
			<p class="card-text">Genre: <i>{{ $row->genres }}</i></p>
			<p class="card-text">Rating: {{ data_get($row, "GetAverageRatings.0.average", "")}}</p>
			</div>
		</div>
	</div>
	@endforeach
	@else
	<p class="card-text justify-content-center">Sorry, no movie(s) found with given name!!!</p>
	@endif
</div>
<div class="d-flex justify-content-center">
@if($data instanceof \Illuminate\Pagination\LengthAwarePaginator)
	{{$data->withQueryString()->links()}}
@endif
</div>

@endsection
<style>
    .header{
        background-color:grey;
    }		
</style>

