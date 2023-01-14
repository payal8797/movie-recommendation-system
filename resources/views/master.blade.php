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

<body>
    <div class="container-fluid m-0 p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/movies">All Movies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/similarUsers">Similar Users</a>
            </li>
            <div class="float-right">
              <form method="GET" action="/search" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search by title" aria-label="Search" name="title">
              </form>
              
              <form method="GET" action="/topRatedMovies" class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Top 10 by genre" aria-label="Search" name="genre">
              </form>
            </div>
          </ul>
        </nav>
        @yield('content')
        @yield('similarUsers')
    </div>
</body>
<!-- <body>
  <div class="container-fluid m-0 p-0">
    <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <form method="GET" action="/search" class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Looking for a movie?" aria-label="Search" name="title">
        </form>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/movies">All Movies</a>
        </li>
        <form method="GET" action="/topRatedMovies" class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Top 10 by genre" aria-label="Search" name="genre">
        </form>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/similarUsers">Similar Users</a>
        </li>
      </ul>
    </nav>
    @yield('content')
    @yield('similarUsers')
    </div>
</body> -->
</html>

<style>
/* Sidebar */
.sidebar {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  padding: 58px 0 0; /* Height of navbar */
  box-shadow: 0 2px 5px 0 rgb(0 0 0 / 5%), 0 2px 10px 0 rgb(0 0 0 / 5%);
  width: 240px;
  z-index: 600;
}
.navbar-nav{
  padding-left: 10px;
}
</style>