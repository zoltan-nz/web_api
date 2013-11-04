## CRAWDESK

CRAWDESK is being developed as part of a lecture course on WEB API's

The course will cover:

- Twitter API

- FaceBook API

- Google API

- GIT and creating a GITHUB Page website which contains the students CV and examples of their project work

This project forms the basis for exploring the API during lectures and LABS

The project is taught based on the branches

- master (starting point)
- develop (will eventually merge back to here)
- v1_TwitterButtons
- v2_TwitterPHP
- v3_Login
- v4_FacebookLogin
- v5_moreSocial

## To get this code working you will need to do the following

- Create your own application on twitter and get your own app and user access codes
- Put your codes into the  app/inc/app_tokens_twitter.inc.php file
- Download the library by Matt Harris https://github.com/themattharris/tmhOAuth
- Place the 6 library files in CRAWDESK/lib/tmhOAuth_v0.7.5 directory
- If you see a curl() error it means you need to update your php.ini to include the curl extention
- On WAMP there are potentially other issues with curl() that require a new curl.dll to be downloaded see forums: http://forum.wampserver.com/read.php?2,85716,112949#msg-112949
or go to www.anindya.com,  download php_curl-5.4.3-VC9-x64.zip, under "Fixed curl extensions" and replace the php_curl.dll in WAMP ext folder.


## Licence ##

Author : http://ie.linkedin.com/in/conororeilly

Licensed under the Creative Commons Attribution 3.0 License

http://creativecommons.org/licenses/by/3.0/

- Free for use in both personal and commercial projects.
- Attribution requires leaving author name, author homepage link, and the license info intact.


 
