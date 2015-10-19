# P3 for DWA15: Developer's Best Friend

## Live URL

TK

## Demo URL

TK

## Description

From assignment: "Create a web application [using Laravel] called Developer's Best Friend which includes a Lorem Ipsum Generator and a Random User Generator."

Includes both HTML5 validation and Laravel-based validation with custom error messages on form inputs.

Allows users to download Random User Generator results as JSON or CSV, in addition to viewing on page.


## Outside Resources

- Packages
	- [fzaninotto/faker](https://github.com/fzaninotto/Faker)
	- [badcow/lorem-ipsum](https://github.com/Badcow/LoremIpsum)
	- installed [Bootstrap](https://github.com/twbs/bootstrap) using [these instructions](http://transmission.vehikl.com/adding-twitter-bootstrap-to-your-laravel-5-app/)
- Other
	- [passing multiple variables to a Laravel 5 view](http://www.easylaravelbook.com/blog/2015/03/09/passing-multiple-variables-into-a-laravel-5-view/)
	- [writing array to CSV file](http://www.php.net/manual/en/splfileobject.fputcsv.php)
	- [writing array to JSON file](http://stackoverflow.com/questions/2467945/how-to-generate-json-file-with-php)
	- icons from [FontAwesome](http://fortawesome.github.io/Font-Awesome/)

## TODO
- ~~install Laravel and get it running locally~~
- ~~install Bootstrap using [these instructions](http://transmission.vehikl.com/adding-twitter-bootstrap-to-your-laravel-5-app/)~~
- ~~install necessary packages~~
- create subdomain & get in running on Digital Ocean
- deploy to Digital Ocean
- ~~create plan for routes/views/controllers~~
- ~~create base template for site~~
	- ~~homepage~~
	- ~~lorem ipsum~~
		- ~~form: specify # of paragraphs~~
		- ~~return generated LI text~~
		- ~~retain form inputs after submission~~
	- ~~random user generator~~
		- ~~form: # of users, whether to include birthday, password, profile text, photo?~~
			- ~~automatically return: name, username, email~~
		- ~~return optional birthday(s), email password(s), profile text, photo(s)~~
		- ~~retain form inputs after submission~~
- ~~customize error messages~~
- ~~style error reporting~~
- ~~style user output~~
- ~~different output formats for user data~~
- clean up code

## TODO IF TIME
- incorporate pwd generator
	- ~~port over form~~
		- ~~include js~~
	- test input validation in laravel
	- password output
- put everything on same page
- permissions calculator


