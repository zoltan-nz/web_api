/*************************************************************************
* 
* Author: Conor O'Reilly
* Date: 
*
* Ref : http://ajaxpatterns.org/XMLHttpRequest_Call
*
* An example of a JQuery AJAX call
*
*************************************************************************/

/*.........................................................................
* attach a click function to the send button
*.......................................................................*/

$(document).ready(function(){
	
	$("button[name='submitButton']").click(function (e){

		    // this isn't secure but it does make it more difficult to hack
		    // need to understand the importance of security and why roll your own is not good
		    // should require you to be logged in before you use the function
		    var securityToken = "133COR";
    		var message = $("textarea[name='aTweet']").val();

    		$('#loading').css('visibility','visible');

			$.ajax({
				type: "POST",
				url: "api/sendTweetAJAX.php",
				data: "aTweet="+message+"&s="+securityToken+"&r="+Math.random(),
				success: function(msg){
					document.getElementById("AJAXResponseMessage").innerHTML=msg;
					$('#loading').css('visibility','hidden');
				}
			});	
	});
	
});


