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
          <li <?php if ( isset($activeIndex   ) ) { echo 'class="' + $activeIndex    + '"'; } ?> ><a href="index.php"    >Home     </a></li>
          <li <?php if ( isset($activeTwitter1) ) { echo 'class="' + $activeTwitter1 + '"'; } ?> ><a href="twitter1.html">Twitter1 </a></li>
          <li <?php if ( isset($activeTwitter2) ) { echo 'class="' + $activeTwitter2 + '"'; } ?> ><a href="twitter2.html">Twitter2 </a></li>
          <li <?php if ( isset($activeGoogle0) )  { echo 'class="' + $activeGoogle0 + '"'; }  ?> ><a href="google_basic.php">Google </a></li>
          <li <?php if ( isset($activeMyCV    ) ) { echo 'class="' + $activeMyCV     + '"'; } ?> ><a href="myCV.html"    >myCV     </a></li>
          <li <?php if ( isset($activeMyCV2   ) ) { echo 'class="' + $activeMyCV2    + '"'; } ?> ><a href="myCV2.html"   >myCV2    </a></li>
          <li <?php if ( isset($activeProject1) ) { echo 'class="' + $activeProject1 + '"'; } ?> ><a href="project1.html">Project 1</a></li>
          <li <?php if ( isset($activeProject2) ) { echo 'class="' + $activeProject2 + '"'; } ?> ><a href="project2.html">Project 2</a></li>
          <li <?php if ( isset($activeProject3) ) { echo 'class="' + $activeProject3 + '"'; } ?> ><a href="project3.php" >Project 3</a></li>
          <li <?php if ( isset($activeAbout   ) ) { echo 'class="' + $activeAbout    + '"'; } ?> ><a href="about.html"   >About    </a></li>
          <li <?php if ( isset($activeSamples ) ) { echo 'class="' + $activeSamples  + '"'; } ?> ><a href="samples.php"  >Notes    </a></li> 

          <!-- This code causes WAMP to display errors 
               as the $activeXXX varibles are not all defined
          <li class="< ?php echo $activeIndex ?>"><a href="index.php">Home</a></li>
          <li class="< ?php echo $activeTwitter1 ?>"><a href="twitter1.html">Twitter1</a></li>
          <li class="< ?php echo $activeTwitter2 ?>"><a href="twitter2.html">Twitter2</a></li>
          <li class="< ?php echo $activeMyCV ?>"><a href="myCV.html">myCV</a></li>
          <li class="< ?php echo $activeMyCV2 ?>"><a href="myCV2.html">myCV2</a></li>
          <li class="< ?php echo $activeProject1?>"><a href="project1.html">Project 1</a></li>
          <li class="< ?php echo $activeProject2?>"><a href="project2.html">Project 2</a></li>
          <li class="< ?php echo $activeProject3?>"><a href="project3.php">Project 3</a></li>
          <li class="< ?php echo $activeAbout ?>"><a href="about.html">About</a></li>
          <li class="< ?php echo $activeSamples ?>"><a href="samples.php">Notes</a></li> 
          -->

          <li><a href="envsetup.php">What PHP</a></li>
        </ul>
      </div><!--/.nav-collapse -->
    </div>
  </div>
</div>

          