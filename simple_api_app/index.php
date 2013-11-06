<?php
error_reporting(-1);
session_start();

//Constant for security
define('MY_INC_CODE', 1);

define("LAYOUT_PATH", "layout");
define("LIBRARY_PATH", "lib");

include (LAYOUT_PATH.'/header.php');

?>


    <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
            <p class="pull-right visible-xs">
                <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
            </p>
            <div class="jumbotron">
                <h1>Laravel Information Site</h1>
                <p>This is a site about Laravel framework. All data downloaded from social networks.</p>
                <p>If you want to interact, please login with one of the following options.</p>
                <div class="row">
                    <div class="col-md-4 col-sm-4"><a class="btn btn-lg btn-primary btn-block" href="facebook_login.php">Login with Facebook</a></div>
                    <div class="col-md-4 col-sm-4"><a class="btn btn-lg btn-info btn-block" href="twitter_login.php">Login with Twitter</a></div>
                    <div class="col-md-4 col-sm-4"><a class="btn btn-lg btn-danger btn-block" href="google_login.php">Lowgin with Google+</a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Facebook</h2>
                    <p>In this section you can play with Facebook buttons</p>

                </div><!--/span-->
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Twitter</h2>
                    <p>Twitter related informations</p>
                    <p><?php print_r($_SESSION['twitter_results']->name) ?></p>

                </div><!--/span-->
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Google+</h2>
                    <p>Everything from Google+</p>
                </div><!--/span-->
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Heading</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!--/span-->
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Heading</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!--/span-->
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Heading</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!--/span-->
            </div><!--/row-->
        </div><!--/span-->

<!--        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">-->
<!--            <div class="list-group">-->
<!--                <a href="#" class="list-group-item active">Link</a>-->
<!--                <a href="#" class="list-group-item">Link</a>-->
<!--                <a href="#" class="list-group-item">Link</a>-->
<!--                <a href="#" class="list-group-item">Link</a>-->
<!--                <a href="#" class="list-group-item">Link</a>-->
<!--                <a href="#" class="list-group-item">Link</a>-->
<!--                <a href="#" class="list-group-item">Link</a>-->
<!--                <a href="#" class="list-group-item">Link</a>-->
<!--                <a href="#" class="list-group-item">Link</a>-->
<!--                <a href="#" class="list-group-item">Link</a>-->
<!--            </div>-->
<!--        </div><!--/span-->-->
    </div><!--/row-->




<?php
include (LAYOUT_PATH.'/footer.php');
?>