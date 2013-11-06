<?php
error_reporting(-1);
session_start();

//Constant for security
define('MY_INC_CODE', 1);

define("LAYOUT_PATH", "layout");
define("LIBRARY_PATH", "lib");

/* Libraries and tokens for twitter queries */
require(LIBRARY_PATH . '/twitteroauth/twitteroauth/twitteroauth.php');
require LIBRARY_PATH.'/facebook-php-sdk/src/facebook.php';
require 'secret_tokens.php';

//Checking user already logged in with facebook

// Create our Application instance (replace this with your appId and secret).
$facebook = new Facebook(array(
    'appId'  => FACEBOOK_APP_ID,
    'secret' => FACEBOOK_SECRET,
));

$user = $facebook->getUser();
$_SESSION['fb_user'] = $user;

if ($user) {
    try {
        // Proceed knowing you have a logged in user who's authenticated.
        $user_profile = $facebook->api('/me');
        $_SESSION['fb_user_profile'] = $user_profile;
    } catch (FacebookApiException $e) {
        error_log($e);
        $user = null;
    }
}




include (LAYOUT_PATH.'/header.php');

?>


    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="jumbotron">
                <h1>Laravel Information Site</h1>
                <p>This is a site about Laravel framework. All data downloaded from social networks.
                If you want to interact, please login with one of the following options.</p>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <?php if ($user) { ?>
                            <div class="well">
                            <img class="pull-left img-rounded" style="margin-right: 10px;" src="https://graph.facebook.com/<?php echo $user; ?>/picture">
                            <p class="clearfix">Hello <?php echo $user_profile['name'] ?>,</p>

                            <h5 >You are logged in with your Facebook account.</h5>
                            <a href='facebook_logout.php' class="btn btn-sm btn-primary btn-block">Logout</a>
                            </div>
                        <?php }
                        else {
                            $statusUrl = $facebook->getLoginStatusUrl();
                            $loginUrl = $facebook->getLoginUrl();
                            ?>
                            <a class="btn btn-lg btn-primary btn-block" href="<?php echo $loginUrl ?>">Login with Facebook</a>
                        <?php }?>


                    </div>
                    <div class="col-md-4 col-sm-4">
                        <?php if (isset($_SESSION['twitter_results'])) { ?>
                            <div class="well">
                            <p>Hi <?php echo ($_SESSION['twitter_results']->name) ?>, </p>
                            <h5>You are logged in with your Twitter account.</h5>
                            <a class="btn btn-sm btn-info btn-block" href="clearsessions.php">Logout</a>
                            </div>
                        <?php } else { ?>
                            <a class="btn btn-lg btn-info btn-block" href="twitter_login.php">Login with Twitter</a>
                        <?php } ?>
                    </div>
                    <div class="col-md-4 col-sm-4"><a class="btn btn-lg btn-danger btn-block" href="google_login.php">Login with Google+</a></div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Facebook buttons</h2>
                    <p>In this section you can play with Facebook buttons.</p>
                    <h4>Please like us:</h4>
                    <div class="fb-like" data-href="http://www.marketingforgambling.com" data-colorscheme="light" data-layout="button_count" data-action="like" data-show-faces="true"></div>
                    <p>(This Like button's data-href attribute points to http://www.marketingforgambling.com url.)</p>
                    <h4>Send button:</h4>
                    <div class="fb-send" data-href="http://www.marketingforgambling.com" data-colorscheme="light"></div>
                    <h4>Beautiful share button</h4>
                    <div class="fb-share-button" data-href="http://www.marketingforgambling.com" data-type="button_count"></div>
                </div><!--/span-->
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Twitter</h2>
                    <p>You can tweet about our website. Tweet first and please don't forget to follow 'laravel'. :)</p>
                    <a href="https://twitter.com/share" class="twitter-share-button" data-text="Amazing website about Laravel Framework. Check it!" data-lang="en" data-related="laravel" data-count="vertical" data-via="apidev505" data-size="large" data-show-count = true data-width="300px">Please tweet about this website</a>
                    <p>Tweet with #laravel hashtag.</p>
                    <a href="https://twitter.com/intent/tweet?button_hashtag=laravel&text=I%20love%20laravel" class="twitter-hashtag-button" data-lang="en" data-related="laravel" data-size="large" data-show-count = true data-width="300px">Tweet #TwitterStories</a>
                    <p>And please, follow us if you like. :)</p>
                    <a href="https://twitter.com/apidev505" class="twitter-follow-button" data-show-count="false" data-lang="en" data-size="large" data-show-count = true data-width="300px">Follow @apidev505</a>
                </div><!--/span-->
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Google+</h2>
                    <p>Everything from Google+</p>
                </div><!--/span-->
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Facebook Comments</h2>
                    <p>Write your comments about Laravel with Facebook Comments.</p>
                    <div class="fb-comments" data-href="http://www.marketingforgambling.com" data-numposts="5" data-width="300"></div>
                </div><!--/span-->
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Latest 5 tweets for 'laravel' keyword</h2>
                    <p>(Results downloaded via REST API call in json. Result list is generated with php on server side.)</p>
                    <?php
                        $connection = new TwitterOAuth(TWITTER_CONSUMER_KEY, TWITTER_CONSUMER_SECRET);
                        $statuses = $connection->get('search/tweets', array('q' => 'laravel', 'lang' => 'en', 'count' => '5'))->statuses;
                        foreach ($statuses as $value) { ?>
                            <div class="well"><p>
                            <?php echo ($value->text); ?>
                            </p></div>
                        <?php } ?>


                </div><!--/span-->
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Heading</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!--/span-->
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Facebook Search</h2>
                    <p>Search results from API call for 'laravel' keyword.</p>
                    <?php $search_results = $facebook->api('/search?q=laravel&type=post&limit=5');
                        foreach ($search_results['data'] as $value) { ?>
                            <div class="well">
                                <?php echo ($value['message']); ?>
                            </div>
                        <?php } ?>


                </div><!--/span-->
                <div id="twitter_post_form" class="col-6 col-sm-6 col-lg-4">
                    <h2>Tweet something</h2>
                    <?php if (isset($_SESSION['twitter_results'])) { ?>
                        <p>Your name: <?php echo ($_SESSION['twitter_results']->name) ?></p>
                        <p>You are logged in with your Twitter account.</p>
                        <form action="twitter_post.php" method="post">
                            <div class="form-group">
                                <label for="tweet-box">Your message:</label>
                                <textarea name="status" id="tweet_box" class="form-control" rows="2"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Send my tweet</button>

                        </form>
                        <br/>
                        <?php if (isset($_SESSION['twitter_post_result'])) {
                            if (isset($_SESSION['twitter_post_result']->errors)) { ?>

                           <?php
                            } else { ?>
                                <div class="alert alert-success">Your tweet was sent and posted.</div>
                            <?php }
                        }?>


                    <?php } else { ?>
                        <p>This box will be active if you already logged in with your twitter account.</p>
                    <?php } ?>


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
                    <h2>Laravel news</h2>
                    <p>(This is a twitter widget, it is created on Twitter page and embeded here.)</p>
                    <p>Original list: <a href="https://twitter.com/apidev505/lists/laravel-news">https://twitter.com/apidev505/lists/laravel-news</a></p>
                    <a class="twitter-timeline" href="https://twitter.com/apidev505/laravel-news" data-widget-id="398105317029859328">Tweets from @apidev505/laravel-news</a>


                </div><!--/span-->
                <div class="col-6 col-sm-6 col-lg-4">
                    <h2>Heading</h2>
                    <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                    <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
                </div><!--/span-->
            </div><!--/row-->
        </div><!--/span-->
    </div><!--/row-->




<?php
include (LAYOUT_PATH.'/footer.php');
?>