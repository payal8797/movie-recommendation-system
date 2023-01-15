<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie Recommendation System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body class="p-0">
    <div class="container-fluid m-0 p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item ps-2">
              <a class="nav-link active" aria-current="page" href="/movies"><h4>All Movies</h4></a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/similarUsers"><h4>Similar Taste Users</h4></a>
            </li>
          </ul>
            <form method="GET" action="/search" class="me-4">
              <input class="form-control" type="search" placeholder="Search by title" aria-label="Search" name="title">
            </form>
            <form method="GET" action="/topRatedMovies" class="me-2">
              <input class="form-control" type="search" placeholder="Top 10 by genre" aria-label="Search" name="genre">
            </form>
        </nav>
        @yield('content')
        @yield('goToSimilarUsers')
        @yield('fetchSimilarUsers')
    </div>
</body>
</html>
