<?php
/* ****************************************
 * Author: Conor O'Reilly
 * Date: 
 *
 * *************************************** */

/*
 * Create a constant to be checked by include files
 * this ensures the include files cannot be called on their own
 */

define("MY_INC_CODE", 1);

/*
 * Set up a constant to your main application path
 */

define("APPLICATION_PATH", "app");
define("TEMPLATE_PATH", APPLICATION_PATH . "/view");
define("LIBRARY_PATH", "lib");

//for menu item highlighting
$activeSamples = "active";

/*
 * Pull in the configuration files
 * As these files are inside php tags their data
 * is not written within the presented HTML page
 * this ensure that tokens, passwords, usernames etc
 * are secure used 
 */

include (APPLICATION_PATH . "/inc/config.inc.php");
//include (APPLICATION_PATH . "/inc/db.inc.php");
//include (APPLICATION_PATH . "/inc/functions.inc.php");

/*
 * Pull in the header component of the HTML page
 * This header is used for all pages that do not
 * require a login e.g. publically accessible pages
 * Contains <HTML><HEADER></HEADER><BODY> and menu ..
 */

include (TEMPLATE_PATH . "/public/header.php");

?>

<!-- main page content ................................. -->

<!-- THE BODY SHOULD REALLY BE IN ITS OWN FILE UNDER app/view/public -->

<!--  button -->
<div class="container buttonbar">
<p align="right">
  <a href="index.php" class="btn btn-success btn-large">
  	<i class="icon-white icon-arrow-left"></i>  Back to Twitter Home</a>
</p>
</div>

<div class="container">
<div class="row">

<?php echo date('M j, Y'); ?>

<h2>Coding Styles</h2>
<p> Zend Framework: <a href="http://framework.zend.com/manual/en/coding-standard.html">http://framework.zend.com/manual/en/coding-standard.html</a></p>
<p> Pear Coding Standards: <a href="http://pear.php.net/manual/en/standards.php">http://pear.php.net/manual/en/standards.php</a></p>

<h2>Notes</h2>
<p>If your file contains only PHP, or if it ends with a PHP block, leave off the final ?>. 
	The final ?> is omitted because if there is anything, blanks or an extra line, after that final ?>
	it is taken to be HTML and it is sent to the browser which may result in extraneous whitespace
	and other errors. So it is good practice to leave the ?> off at the end of a file</p>

<p>Some servers allow the use the short tag version of < ? to start a PHP block. Don&apos;t use this
it is not universally supported and may not be configured on all servers</p>

<p> The PHP manual <a href="http://www.php.net/manual/en/index.php">http://www.php.net/manual/en/index.php</a></p>

<pre>
$temperature = 65;
$celsius = ($temperature - 32)* (5/9); /* this is also a valid comment */
echo '&lt;p>The answer is ' . $celsius . '&lt;/p>';
</pre>

<h2>PHPDoc</h2>
<p><a href="http://manual.phpdoc.org/HTMLSmartyConverter/HandS/phpDocumentor/tutorial_phpDocumentor.howto.pkg.html">PHpDoc how to</a></p>
<pre>
/**
* Short description for file
*
* Long description for file (if any)...
*
* @version 1.2 2011-02-03
* @package Your Project Name
* @copyright Copyright (c) 2011 Your company name
* @license GNU General Public License
* @since Since Release 1.0
*/
</pre>

<h2>Errors</h2>
<p> To see errors turn on display_errors in the php.ini file. 
	phpinfo() will tell you if it is on or off </p>
<p> display_errors determines if reported errors are displayed.</p>
<p> error_reporting determines which errors should be reported. error_reporting = E_ALL &amp; ~E_NOTICE
shows all errors except notices. error_reporting = E_ALL gives you all errors. 
To apply strict PHP syntax use error_reporting = E_ALL | E_STRICT</p>

<h2>Variables</h2>
<p> Display variables by using &lt;pre> tags and the following special functions print_r( $varName )
or var_dump( $varName )</p>

<h3><b>Arrays</b></h3>

<p>An array holds multiple values in a single variable. Within one variable you have a list
of values. You refer to and access the full array just by the using the array name like a regular
variable, or you can use an index to access the individual values. Indexes may be the a number
which represents the position of a single variable in an array or that variable may have a name</p>

<pre>
$employee = array(‘Sally Meyers’, ‘George Smith’, ‘Peter Hengel’ );
echo $employee[1];

$employee[0] = ‘Sally Meyers’;
$employee[1] = ‘George Smith’;
$employee[2] = ‘Peter Hengel’;

print_r($employee);

// give the array variables a name

$employee = array(‘name’=>’Sally Meyers’, ‘position’=>’President’,‘yearEmployed’=>2001 );

$employee[‘name’] = ‘Sally Meyers’;
$employee[‘position’] = ‘President’;
$employee[‘yearEmployed’] = 2001;

print_r($employee);

//combined

$employees = array(
array(‘name’=>’Sally Meyers’, ‘position’=>’President’, ‘yearEmployed’=>2001 ),
array(‘name’=>’George Smith’, ‘position’=>’Treasurer’, ‘yearEmployed’=>2006 ),
array(‘name’=>’Peter Hengel’, ‘position’=>’Clerk’, ‘yearEmployed’=>1992 ),
);

print_r($employees);

</pre>

<h3><b>Constants</b></h3>

<pre>
define(’DATABASE’, ’mydatabase’);
define(’USERNAME’, ’xxx’);
define(’PASSWORD’, ’xxx’)
</pre>

<hr class="pictureRule">
<h3><b>Dates</b></h3>
<?php echo 'Current timezone: ' . date_default_timezone_get() . '<br />' ?>
<br/>
<pre>
echo 'Current timezone: '' . date_default_timezone_get() . '&lt;br />'
date_default_timezone_set(‘Europe/Dublin’);
</pre>
<?php 
	date_default_timezone_set('Europe/Dublin');
	echo 'Current timezone: ' . date_default_timezone_get() . '<br />'
?>
<p>To set the timezone see : <a href="http://us2.php.net/manual/en/timezones.php">http://us2.php.net/manual/en/timezones.php</a>. 
The timezone can also be set in the php.ini file</p>
<br/>
<pre>
echo time();
echo date(‘c’) . ‘<br />’;
echo date(‘m/d/Y’) . ‘<br />’;
echo date(‘l, F n, Y’) . ‘<br />’;
echo date(‘l ga’) . ‘<br />’;
echo date(‘h:i a’) . ‘<br />’;
</pre>
<p> see <a href="php.net/manual/en/function.date.php">php.net/manual/en/function.date.php</a></p>

<p> The getdate() function takes a timestamp and puts the date and time information in an array</p>
<pre>
&lt;pre>&lt;?php print_r(getdate()); ?&gt; &lt;/pre>
</pre>
<pre><?php print_r(getdate()); ?></pre>
<p> see <a href="php.net/manual/en/datetime.formats.php.">www.php.net/manual/en/datetime.formats.php.</a></p>
<p> see <a href="php.net/manual/en/ref.datetime.php">php.net/manual/en/ref.datetime.php</a></p>

<hr class="pictureRule">
<p><strong>A FOR Loop</strong>
<p><small>ref: CodeAcademy PHP course</small></p>
<pre>
      for ($number = 1; $number <= 10; $number++)
      {
        if ($number <= 9) 
        {
            echo $number . ", ";
        } 
        else 
        {
            echo $number . "!";
        }
      };
</pre>
<p><strong>The list:</strong>
  <?php
  for ($number = 1; $number <= 10; $number++) {
    if ($number <= 9) {
        echo $number . ", ";
    } else {
        echo $number . "!";
    }
  }; ?>
</p>

<hr class="pictureRule">
<p><strong>Array and foreach iterator</strong>
<p><small>ref: CodeAcademy PHP course</small></p>
<pre>
	$things = array("Talk to databases",
    "Send cookies", "Evaluate form data",
    "Build dynamic webpages");
    foreach ($things as $thing) 
    {
        echo "&lt;li>$thing&lt;/li>";
    }
    
    unset($thing);
</pre>
<p><strong>list out the array items:</strong>
  <?php
    $things = array("Talk to databases",
    "Send cookies", "Evaluate form data",
    "Build dynamic webpages");
    foreach ($things as $thing) {
        echo "<li>$thing</li>";
    }
    
    unset($thing);
  ?>

<hr class="pictureRule">
<p><strong>Jumble the array items then list them</strong>
<p><small>ref: CodeAcademy PHP course</small></p>
<pre>
    $words = array("the ", "quick ", "brown ", "fox ",
    "jumped ", "over ", "the ", "lazy ", "dog ");
    shuffle($words);
    foreach ($words as $word) {
        echo $word;
    };
    
    unset($word);
</pre>

<p><strong>Jumble the sentence with each display<strong></p>
<p>
  <?php
    $words = array("the ", "quick ", "brown ", "fox ",
    "jumped ", "over ", "the ", "lazy ", "dog ");
    shuffle($words);
    foreach ($words as $word) {
        echo $word;
    };
    
    unset($word);
  ?>


<hr class="pictureRule">
<h2>Global Functions $_GET, $_POST, $_REQUEST</h2>
<p>The $_GET function stores values from a form sent with the method=”get” or or paramerers that
are sent to a page via the URL</p>







<h2>References</h2>
<ul>
	<li>2012 : PHP and MySQL,24-Hour Trainer, Andrea Tarr, John Wiley &amp; Sons, Inc </li>
</ul>


</div><!-- .row -->
</div><!-- .container -->

 <br/>

<!-- main page  end .................................... -->

<?php
/*
 * Pull in the public version of the footer
 * contains JQuery pullin and <BODY/><HTML/>
 */
 include (TEMPLATE_PATH . "/public/footer.html"); 
 ?>