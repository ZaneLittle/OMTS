function displayMovies()
{
	var filter = document.querySelector(".filtersContent").value;
	var theatre = document.querySelector(".theatresContent").value;
	var search = document.querySelector(".searchInput").value;

	$.post("./includes/displayMovies.php", {
			filtersContent: filter,
			theatresContent: theatre,
			searchInput: search
		}, function(data)
	{
		$("table.searchResults").html(data);
	});
}


function displayReview(e)
{	
 	var movieName = e.querySelector(".movieName").innerHTML;
	//console.log(movieName);
    var form = 
      	$("<form style='display:none;' action='reviewPage.php' method='get'><input name='movieName' value='" +
       		movieName + "'/></form>");
    $('body').append(form);
    form.submit();
}

function displayReview(e)
{	
 	var movieName = e.querySelector(".movieName").innerHTML;
	//console.log(movieName);
    var form = 
      	$("<form style='display:none;' action='reviewPage.php' method='get'><input name='movieName' value='" +
       		movieName + "'/></form>");
    $('body').append(form);
    form.submit();
}

function submitReview(movieName)
{
	//Get the value inside the text box
	var text = document.querySelector('.movieSearch .searchBody .searchWindow .reviewText');
	text = text.value;
	console.log(text);

	//Reset the text box
	document.querySelector('.movieSearch .searchBody .searchWindow .reviewText').value = '';

	
	//Add it to the DB as well as to the html
	if(text.length > 0)
	{
		$.post("./helpers/sendReview.php", {text: text, movieName:movieName}, function(data) {
			console.log(data);
		});
	}
	
	setInterval(() => {
	  	//Update the html from the db
		$.get("./includes/displayReviews.php", {movieName:movieName}, function(data){
			$(".searchBody .searchWindow .searchResults").html(data);
		});
	}, 100)

}

function accountOptions(e)
{
	var v = e.className;

	if(v == "listMembers")
	{
		$.get("./helpers/listMembers.php", function(data){
			$(".settingPageContent .settingsContent").html(data);
		});
	}
	else if(v == "listTheatres")
	{
		$.get("./helpers/listTheatres.php", {orderBy: 'name'}, function(data){
			$(".settingPageContent .settingsContent").html(data);
		});
	}
	else if(v == "listMovies")
	{
		$.get("./helpers/listMovies.php", {orderBy: 'name'}, function(data){
			$(".settingPageContent .settingsContent").html(data);
		});
	}
	else if(v == "viewPurchases")
	{
		$.get("./helpers/viewPurchases.php", function(data){
			$(".settingPageContent .settingsContent").html(data);
		});
	}
	else if(v == "popMovies")
	{
		$.get("./helpers/listMovies.php", {orderBy: 'popularity'}, function(data){
			$(".settingPageContent .settingsContent").html(data);
		});
	}
	else if(v == "popTheatres")
	{
		$.get("./helpers/listTheatres.php", {orderBy: 'popularity'}, function(data){
			$(".settingPageContent .settingsContent").html(data);
		});
	}
}

function login()
{
	var email = document.querySelector(".loginForm .enterEmail").value;
	var pass = document.querySelector(".loginForm .enterPassword").value;
	
	$.get("./helpers/checkCred.php", {email: email, pass: pass}, function(data){
		//If the login failed
		if(data == 'FAILED')
		{
			//Let the user know
			window.alert("Login Failed. Make sure the email/password is correct.");
		}
		//If the login was a success
		else if(data == 'SUCCESS')
		{
			//Redirect them to logginHome
			window.location.href = 'loggedInHome.php';
		}
	});
	return false;
}

function logout()
{
	//Delete the cookies
	$.get("./helpers/logout.php");

	//Redirect the page
	window.location.href = 'index.php';
}

function register()
{
	var email = document.querySelector(".registerForm .enterEmail").value;
	var pass = document.querySelector(".registerForm .enterPassword").value;
	var fname = document.querySelector(".registerForm .enterFname").value;
	var lname = document.querySelector(".registerForm .enterLname").value;

	//If something was written
	if(email.length > 0 && pass.length > 0 && fname.length > 0 && lname.length > 0)
	{
		$.get("./helpers/checkRegister.php", {email: email, pass:pass, fname:fname, lname:lname}, function(data){
			//If the login failed

			if(data == 'FAILED')
			{
				//Let the user know
				window.alert("Login Failed. That email is already in use.");
			}
			//If the login was a success
			else if(data == 'SUCCESS')
			{
				var form = document.querySelector('.registerForm');
				form.action = "./helpers/createAcct.php";
				form.method = "post";
				window.alert("Account Created Successfully");
				form.submit();
			}
			else
			{
				window.alert("ERROR: " + data);
			}
		});
	}
	else
	{
		window.alert("Please fill in all required fields");
	}

}

function getCookie(name)
{
	// Original JavaScript code by Chirp Internet: www.chirp.com.au
	var re = new RegExp(name + "=[^;]+)");
	var value = re.exec(document.cookie);
	return (value != null) ? unexcape(value[1]) : null;
}

function updateUser()
{
	var form = document.querySelector('.updateForm');
	form.action = "./updateAcct.php";
	form.method = "post";
	form.submit();
}

function editTheatre(e)
{

 	var theatre_name = e.querySelector(".theatre_name").innerHTML;

	var form = 
      	$("<form style='display:none;' action='editTheatrePage.php' method='get'><input style='display:none;' name='theatre_name' value='" +
       		theatre_name + "'/></form>");
    $('body').append(form);
    form.submit();
}

function updateTheatre()
{
	var form = document.querySelector('.theatreUpdateForm');
	form.action = "./updateTheatre.php";
	form.method = "post";
	form.submit();
}

function editMovie(e)
{

 	var movie_title = e.querySelector(".movie_title").innerHTML;

	var form = 
      	$("<form style='display:none;' action='editMoviePage.php' method='get'><input style='display:none;' name='movie_title' value='" +
       		movie_title + "'/></form>");
    $('body').append(form);
    form.submit();
}

function updateMovie() 
{
	var form = document.querySelector('.movieUpdateForm');
	form.action = "./updateMovie.php";
	form.method = "post";
	form.submit();
}

function editMember(e)
{

 	var memberEmail = e.querySelector(".email_address").innerHTML;

	var form = 
      	$("<form style='display:none;' action='editMemberPage.php' method='get'><input style='display:none;' name='email_address' value='" +
       		memberEmail + "'/></form>");
    $('body').append(form);
    form.submit();
}
function validateBooking(e)
{
	var seats_available = e.parentNode.querySelector(".seats_available").value;
	var tickets2book = e.parentNode.querySelector(".tickets2book").value;
	var showing_date = e.parentNode.querySelector(".showing_date").value;

	//showing date check
	if ((showing_date.charAt(4) != "-") ||
		(showing_date.charAt(7) != "-") ||
		(isNaN(showing_date.substring(0,4))) ||
		(isNaN(showing_date.substring(5,7))) ||
		(isNaN(showing_date.substring(8))))
	{
		window.alert("Please Enter a valid date.");
		return false;
	}
	if (tickets2book.length == 0)
	{
		window.alert("Please enter a valid number of tickets.");
		return false;
	}
	if (Number(seats_available) < Number(tickets2book))
	{
		window.alert("Only " + seats_available + " seats available. Cannot book " 
			+ tickets2book + " tickets.");
		return false;
	}
    return true;
}