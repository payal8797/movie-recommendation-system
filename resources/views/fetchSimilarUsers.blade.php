@extends('goToSimilarUsers')
@section('fetchSimilarUsers')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif

<div class="ps-4">
  <div class = "mb-4 d-flex">
    <h3><i><u>Users having similar taste as that of userid: {{$user}}</u></i></h3>
    @if(count($data) > 0)  
    <button type="button" class="btn border-secondary rounded-pill ms-4" data-toggle="modal" data-target="#exampleModal">
      Recommend movies
    </button>
    @endif
  </div>
  <p class="text-muted"><h5>(Expand accordian to see similar movies list.)</h5></p>

  <div>
    <?php
      $i = 1;
    ?>
      @if(count($data) > 0)  
      @foreach($data as $row)
        <div class="accordion-item">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $i }}" aria-expanded="false" aria-controls="collapseThree">
            <h5><b>User id:</b> {{ $row->user2 }}</h5>
          </button>
          <div id="collapse{{ $i }}" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
            <div class="accordion-body">
            <p><b>Movies:</b> {{ $row->movielist }}</p>
            <p><b>Total movies: </b>{{ $row->similar_taste_count }}</p>
            </div>
          </div>
        </div>
        <?php
          $i = $i + 1;
        ?>
      @endforeach
      @else 
      <p>Sorry, no movie(s) found with given userid!!!</p>
      @endif
    </div>
  <div>
    
  <div class="d-flex justify-content-center">
    @if($data instanceof \Illuminate\Pagination\LengthAwarePaginator)
      {{$data->withQueryString()->links()}}
    @endif
  </div>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header d-block">
        <h5 class="modal-title float-start" id="exampleModalLabel">Recommended movies for user: {{$user}}</h5>
        <button type="button" class="close float-end" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-hover table-bordered table-striped">
          <thead>
            <tr>
              <th>Id</th>
              <th>Title</th>
              <th>Genre</th>
            </tr>
          </thead>
          <tbody>
            l
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>