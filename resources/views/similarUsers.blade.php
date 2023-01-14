@extends('master')
@section('similarUsers')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="card-header" >
	<blockquote class="blockquote">
	<h2 class="mb-0 d-flex justify-content-center" ><b>List of users with similar taste!!</b></h2>
	</blockquote>
</div>
<br>

<table data-toggle="table" id="table" class="table table-bordered" data-detail-view="" data-pagination="true" data-pagination-pre-text="< Previous" data-pagination-next-text="Next >" data-classes="table table-hover table-condensed">
  <thead>
    <tr>
      <th scope="col" style="width: 10%">User 1</th>
      <th scope="col" style="width: 10%">User 2</th>
      <th scope="col" style="width: 10%">Similar Taste Count</th>
      <th scope="col" style="width: 70%">Movies List</th>
    </tr>
  </thead>
  <tbody>
  @if(count($data) > 0) 
  @foreach($data as $row)
    <tr style="height: 10px;">
      <td >{{ $row->user1 }}</td>
      <td >{{ $row->user2 }}</td>
      <td >{{ $row->similar_taste_count }}</td>
      <td style="overflow-y: scroll; overflow-x: scroll;">{{ $row->movielist }}</td>
    </tr>
	@endforeach
  </tbody>
  @else
	<p class="card-text">Sorry, no movie(s) found with given name!!!</p>
	@endif
</table>

@endsection
<style>
    .header{
        background-color:grey;
    }
	.row {
		padding-left: 20px;
		padding-right: 20px;
	}
	table{
		padding-left: 200px;
		padding-right: 20px;
	}
	.movieList {
    overflow-y: scroll;
    overflow-x: scroll;
}
	
</style>

