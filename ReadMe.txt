--General Information--
	project name: Location History App
	developer name: Steve Rhyner steverhyner.biz/contact
	project description: 
		This project is all about having a user pin several Locations on a Map in order for others to see where people are at(with in 10 hours)
		and also so users can go back later and look at the places they have been to!  They can not only upload a location, but an image,and a comment about the
		occasion can be uploaded at the same time as the location is uploaded.  If the user wants to go back later and add an additional comment to their upload; that 
		is possible. The site has a main page where users ,even those who are just guests and not logged in, can view current uploads(past 10 days).  Once logged
		in a user can upload locations on the upload page. Users can view their own past uploads on the view pins page or the history table page.  Either way by
		clicking on the image of the upload, it will take a user to a detail page that shows a blown up version of the particular upload instance and a place
		to make additional comments.
	link to project code: https://github.com/steverhyner/maps
	link to project api documentation(googe maps javascript v3):  https://developers.google.com/maps/documentation/javascript/3.exp/reference
	link to api library:    <script type="text/javascript"src="https://maps.googleapis.com/maps/api/js?v=3sensor=true.exp&libraries=places&key="></script>
	link to jquery library:   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	code languages used: HTML5,CSS,jquery,javascript,php,ajax,sql
	Host for website: hostgator
--- main pages and their corresponding linked pages----

---------uses helpersForIndex.php and headerForIndex.php---------------------
	1)  index page
			../../require/pdoConnect.php
			helpersForIndex.php
			headerForIndex.php
			index.js
			nav.php
			loginForm.php
			phpLoginCheck.php
			forgot.php
			reset.php
			foot.php
			logout.php
			
---------uses helpersForShowLocations.php and headerForShowLocations.php---------------------

	2)  show locations(your uploads)
			../../require/pdoConnect.php
			helpersForShowLocations.php
			headerForShowLocations.php
			showLocations.js
			nav.php
			loginForm.php
			logout.php
----------------end---------------------------------------------------------------------------

--------uses helpersForDetails.php and headerForDetails.php-----------------------------------------------------------------------------------------
	3)  details page
			../../require/pdoConnect.php
			helpersForDetails.php
			headerForDetails.php
			detailsJs.js
			nav.php
			loginForm.php
			foot.php
			logout.php
			
	4)  history page
			../../require/pdoConnect.php
			helpersForDetails.php
			headerForDetails.php
			detailsJs.js
			nav.php
			loginForm.php
			foot.php
			logout.php
			
--------------end----------------------------------------------------------------------------------------------------------------------------------
------------uses helpers.php and header.php--------------------------------------------------
	5)  register page
			../../require/pdoConnect.php
			phpRegistrationCheck.php
			phpLoginCheck.php
			helpers.php
			header.php
			map.js
			nav.php
			loginForm.php
			search.php
			forgot.php
			reset.php
			phpLoginCheck.php
			foot.php
			
	6)  upload page
			../../require/pdoConnect.php
			helpers.php
			header.php
			map.js
			nav.php
			loginForm.php
			foot.php
			logout.php
			
	7)  logout page
			../../require/pdoConnect.php
			helpers.php
			header.php
			map.js
			nav.php
			loginForm.php
			foot.php
			
	8)  privacy page
			../../require/pdoConnect.php
			phpRegistrationCheck.php
			loginForm.php
			phpLoginCheck.php
			forgot.php
			reset.php
			helpers.php
			header.php
			map.js
			nav.php
			foot.php
			logout.php
			
	9)  thank you page
			../../require/pdoConnect.php
			helpers.php
			header.php
			map.js
			nav.php
			loginForm.php
			foot.php
			logout.php
			
   10)  reset page
			../../require/pdoConnect.php
			helpers.php
			header.php
			map.js
			nav.php
			loginForm.php
			phpLoginCheck.php
			forgot.php
			foot.php
			logout.php
   11)  forgot page
			../../require/pdoConnect.php
			phpLoginCheck.php
			helpers.php
			header.php
			map.js
			nav.php
			loginForm.php
			foot.php
			logout.php
			
	12) admin page/deleteuser.php/passwordChange.php/userComments.php/userUplads.php
			../../require/pdoConnect.php
			helpers.php
			header.php
			map.js
			nav2.php
			logout2.php
			deleteUser.php
			userUplads.php
			userComments.php
			passwordChange.php
			foot.php
			
	13)  contact page
				../../require/pdoConnect.php
			phpLoginCheck.php
			helpers.php
			header.php
			map.js
			nav.php
			loginForm.php
			search.php
			forgot.php
			reset.php
			phpLoginCheck.php
			foot.php
--------end-------------------------------------------------------------------------
			