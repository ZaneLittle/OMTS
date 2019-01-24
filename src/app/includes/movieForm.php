<div class="movieSearch">
	<form name="movieForm" class="header" onsubmit="return false">
		<select name="theatresContent" class="theatresContent" data_placeholder="Theatres">
			<?php
				include './includes/displayOptions.php';
			?>
		</select>

		<select name="filtersContent" class="filtersContent">
			<option value="All">All</option>
			<option value="Title">Title</option>
			<option value="Director">Director</option>
			<option value="Actors">Actors</option>
			<option value="Rating">Rating</option>
		</select>

		<input type="text" name="searchInput" class="searchInput" placeholder="Enter Search..." onkeyup="displayMovies()">
		<button class="submitButton" type="submit" value="search" onclick="displayMovies()">Search</button>
	</form>
	<div class="searchBody">
		<div class="forTheScrollBar">
			<div class="searchWindow">
				<table class="searchResults">
					
				</table>
			</div>
		</div>
	</div>

	<div class="footer"></div>
</div>
