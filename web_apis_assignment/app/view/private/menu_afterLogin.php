<!-- stationary nav bar -->
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="index.php">CRAWDESK</a>
      <div class="nav-collapse">
        <ul class="nav">
          <li <?php if ( isset($activeIndex   ) ) { echo 'class="' + $activeIndex    + '"'; } ?> ><a href="index.php">Home</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>

          