<?php

defined('MY_INC_CODE') or die('Access to this file is restricted');

?>

<hr>

<footer>
    <p>&copy; Company 2013</p>

    <div class="well">
        <p>Session:</p>
        <pre><?php print_r($_SESSION); ?></pre>
        <p>POST:</p>
        <pre><?php print_r($_POST); ?></pre>

    </div>

</footer>

</div><!--/.container-->


    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.1/js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
<!--Twitter api script-->
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<!--Facebook api script-->
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=397798846989551";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>