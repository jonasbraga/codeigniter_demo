<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="<?= base_url() ?>">Code Igniter Demo</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?= base_url() ?>home">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>about">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>posts">Posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url() ?>categories">Categories</a>
      </li>
      </li>
      <li class="nav-item float-right">
        <a class="nav-link bg-danger" href="<?= base_url() ?>logout">Logout</a>
      </li>
    </ul>

  </div>
</nav>

<div class="container">