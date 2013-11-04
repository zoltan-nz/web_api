/*************************************************************************
* 
* Author: Conor O'Reilly
* Date: 
*
* Ref : http://ajaxpatterns.org/XMLHttpRequest_Call
*
* An example of a basic AJAX call no jQuery AJAX
*
*************************************************************************/

/*.........................................................................
* attach a click function to the send button
*.......................................................................*/

$(document).ready(function(){
	
	$("button[name='submitButton']").click(function (e){

			var message = $("textarea[name='aTweet']").val();
			sendMessage(message);
			//console.log(message);
			
	});
	
});


/*.........................................................................
* Example use of an AJAX request
* 
* 
*.......................................................................*/
function sendMessage(aMessage)
{
    // should require you to be logged in before you use the function
    // this isn't secure but it does make it more difficult to hack
    // need to understand the importance of security and why roll your own is not good
    var securityToken = "133COR";

    var xmlhttp;
    
    //Get a XHR object
    try
    {
	    if (window.XMLHttpRequest)
	        {// code for IE7+, Firefox, Chrome, Opera, Safari
	            xmlhttp=new XMLHttpRequest();
	        }
	    else
	        {// code for IE6, IE5
	            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	        }
    }
    catch(e)
    {
    	console.log("XHR creation issue");
    	document.getElementById("AJAXResponseMessage").innerHTML="<div class=\"alert alert-error\">AJAX connection could not be established</div>";
    }
    
	//this function is called when there is a xmlhttp.onreadystatechange EVENT
	//we set up the EVENT watcher function here 
    xmlhttp.onreadystatechange=processXHRreturn;
  	
  	//Use the XHR object - to stop the example caching the random is added to create a unique URL
    //xmlhttp.open("GET","http://www.w3schools.com/ajax/demo_get.asp?t=" + Math.random(),true);	

    // Test
  	//var url="testAJAXSubmits.php";

  	var url="api/sendTweetAJAX.php";
	url=url+"?aTweet="+aMessage;
	url=url+"&s="+securityToken;
	url=url+"&r="+Math.random();
	
	//console.log(url);

    xmlhttp.open("GET",url,true);
    xmlhttp.send(null);
    
    //The xmlhttp.onreadystatechange EVENT will be triggered when a response comes back
    //The anonomyous function we associated with the event is then triggered
	

	function processXHRreturn()
	{
	    if (xmlhttp.readyState == 4)
	    {
        	if (xmlhttp.status==200)
        	{
            	document.getElementById("AJAXResponseMessage").innerHTML=xmlhttp.responseText;
            	
            	//if testing
            	//document.getElementById("AJAXResponseMessage").innerHTML="OK";
            	//console.log("AJAX call returned : "+xmlhttp.responseText);
            	//document.getElementById("AJAXResponseDebug").innerHTML="<p>" + "XHR status:" + xmlhttp.status+"</p>";
            }
            else
            {
            	document.getElementById("AJAXResponseMessage").innerHTML=xmlhttp.responseText;

            	//if testing
            	//document.getElementById("AJAXResponseMessage").innerHTML="ERROR";
            	//console.log("AJAX call returned : "+xmlhttp.responseText);
            	//document.getElementById("AJAXResponseDebug").innerHTML="<p>" + "XHR status:" + xmlhttp.status+"</p>";
            }
	    }
	}

}
