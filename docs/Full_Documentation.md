# PearEdit Documentation

**Attached in this readme file will include the following:**
- Layout Document
- Site Map
- Logic Process
- Design Discussion
- Summary
- User Guide (Frontend Guide, how to navigate)
- Developer Guide (PHP, JavaScript)

## Deployment quick note
**Website can be used locally (through docker, by just git cloning and doing docker compose up) OR it can also be used on the cosc360 server (running on Agam Aneja's instance of the server).**


## Layout Document (Figma)
![Figma for PearEdit](/src/client/img/figmapearedit.png)

## Site Map

Shown below is a basic site map and how all pages are linked together.

![Site map](/src/client/img/pear_edit_sitemap.png)

## Logic Process
This portion will discuss how both the user and admin interact with the site.

#### User:
- The user can sign up for an account.
- The user can login with a valid account (must sign up).
- The user can browse the main page and see posts but not be able to comment or create one (if not logged in).
- The user can browse the main page and see posts, and can also create and comment on posts (if logged in).
- The user can see their user profile, with details such as their first name, last name, username, email. They can also change this at any time in the user profile.
- The user can search for posts via the search bar at the top (can be logged in or not).
- The user's main purpose will be to participate in discussions about pears, comment, create posts, etc.

#### Admin:
- The admin can login (as admin).
- The admin can see posts, create posts, comment on posts, and the main difference between user and admin, is that admin can REMOVE posts.
- The admin can also REMOVE users.
- The admin can also REMOVE comments.
- The admin's main purpose will be to remove bad posts, comments, and/or users.


## Design Style

- Since we're making a discussion forum about pears, we decided to go with a light themed styling. We used light colors (primarily green and white) to style our pages, and all buttons, posts, and subsequent pages were designed with this color theme in mind. 

- The Login, Signup, Reset Password, and User Profile pages all had the same styling to them with the white to green gradient, and a border around the forms to give extra flourish to the pages.

- For the main page (posts, comments, etc.) We made it primarily white with green highlighting borders, the navbar, buttons etc. so it is easy on the eyes and readable while still giving the green aesthetic we were going for.

- We also decided to have "cards" type of styling (all thanks too bootstrap) which is essentially that all forms are wrapped around a rounded border giving sort of a card design to it. We thought this looked super clean, and added to the aesthetic of our page.

- Shown belown is our splash page we made as sort of a "concept art" to show the type of style we were trying to go for.

![Splash page "concept art"](/src/client/img/pear_edit_splashpage.png)


## Summary
In Summary, we designed and developed a reddit clone called "PearEdit" which is a discussion forum to discuss and participate in discussions regarding pears, and all it's benefits.

#### Features and Functionalities:
- Users can browse the main page (which includes posts and comments) without having to login.
- Users can login with a valid account.
- If users do not have a valid account, they can sign up for an account.
- Users can create posts, and comment on posts (with a valid account).
- Users can also look at their user profiles and make changes to their name, username, etc. if needed (has to be logged in).
- Users can search for posts by title or comment (which is done asynchronously) 
- Comment on posts is also done asynchronously.
- Both client side and server side validation exist to prevent bad input, SQL Injection (code uses prepared statements), etc.
- UI is intuitive and easy to use, and readable.
- Website is responsive, so this can be used on mobile devices without any issues.
- User data is stored in a secure database.
- Passwords are hashed to further enhance security.
- Async functionality (dynamically updates without page reloading) for searching, creating, and deleting posts, as well as commenting.
- Admin privileges to allow for control over users, posts, and comments.


## USER GUIDE (Frontend)

This portion will display how to use the website.

#### For User:
- The first page you will want to be on is the mainpage (**localhost:8080/src/client/mainpage.php if on local (docker), or will also be deployed on the cosc 360 server)** which shows all the current posts, comments, etc.
- From there you can either login or signup so let us create an account by clicking on the signup button on the top right of the navbar.
- If you want to login as an existing user to test the site, use this account: Username: `test_user`, Password: `testpassword`
- From here, input all information based on the form (can also test validation here by leaving fields empty, or not have the same password, etc.)
- ![Client side validation for sign up form](/src/client/img/pear_edit_clientvalidation.png)
- Now that sign up is finished, you have the option to comment on posts (click on the comment icon to see an expanded posts view), or create one.
- Try commenting on a post, and it will update asynchronously.
- You can also click on the post itself to go to the post page and have a more expanded view. There will also a breadcrumb link back to the main page to provide easier navigation.
- ![Expanded post view page](/src/client/img/pear_edit_expandedpostview.png)
- In this expaned post view page, you can also comment and see other comments by other users.
- After clicking on the breadcrumb back to the main page, you can now try creating a post by clicking on the create post button on the right side of the page.
- Here you can input the post title, content, and an image aswell if you want.
- ![Create post modal](/src/client/img/pear_edit_createpostmodal.png)
- Once you create a post, it will update it on the main page and you will be able to see it, comment on it, and delete the post if need be.
- For extra client side security, the create post button will be disabled by default until you have a post title AND content.
- Other people now have the ability to comment on the post too, and it will show the date, aswell as the exact time the date was posted.
- If you made the comment on the post, you will have the ability to delete the comment.
- ![Comment](/src/client/img/pear_edit_comment.png)
- The comments will also show who made the comment, as well as an timestamp to show the date and time it was published.
- For extra client side security, the create post button will be disabled by default until you have a post title AND content.
- All information (user info, post info, etc.) will be securely stored and saved on the database.
- From the main page, you can also click on your profile on the top right, which will take you to another page showing your information (which can be changed at any time).
- From this page you can click on the PearEdit title on the top left to go back to the mainpage, or click on the logout button on the top right to logout, and also will return to the main page.
- If you are logged in, you can also upvote or downvote a post (only once).
- ![Voting](/src/client/img/pear_edit_vote.png)
- If you want to filter a post, that can also be done by going in the search bar and searching based on the post title or post content, and as you type it will dynamically update to whatever search term you have typed in.
- ![Filtering posts by search term](/src/client/img/pear_edit_searchfilter.png)

#### For Admin:
- Admin can do ALL things the user can with the addition of:
- Deleting posts (press the trash can icon near footer of the post).
- ![Deleting posts as admin](/src/client/img/pear_edit_deletepostadmin.png)
- Deleting comments (press the trash can icon near post comment).
- Deleting users (click on the admin button on top right of the navbar, which will then show the total list of users, which you can then delete).
- ![Deleting users as admin](/src/client/img/pear_edit_adminuserdelete.png);
- **If you delete a user from this page, it will delete the user, their posts, AND their comments**
- To login as admin, make sure you are on the mainpage, and from there, press the login button and enter the following:
- `Username: admin Password: adminpassword`
- Once logged in, you will have full privileges as described above in regards to removing posts, comments, users, etc.

## DEVELOPER GUIDE (Backend, PHP and JS)

In this section we will discuss features implemented in the backend.

**Client-Side Validation (JavaScript):**
```
document.getElementById("signupForm").addEventListener("submit", function(e)
{
	e.preventDefault();

	var  firstName  =  document.getElementById("firstname").value;
	var  lastName  =  document.getElementById("lastname").value;
	var  email  =  document.getElementById("email").value;
	var  username  =  document.getElementById("username").value;
	var  password  =  document.getElementById("password").value;
	var  confirmPassword  =  document.getElementById("confirmpass").value;

	resetValidationStyles();

	var  isFormValid  =  true;

	if (firstName.trim() ===  "")
	{
		isFormValid  =  false;
		highlightField("firstname");
	}

	if (lastName.trim() ===  "")
	{
		isFormValid  =  false;
		highlightField("lastname");
	}

	if (email.trim() ===  "")
	{
		isFormValid  =  false;
		highlightField("email");
	}

	if (username.trim() ===  "")
	{
		isFormValid  =  false;
		highlightField("username");
	}

	if (password.trim() ===  "")
	{
		isFormValid  =  false;
		highlightField("password");
	}

	if (confirmPassword.trim() ===  "")
	{
		isFormValid  =  false;
		highlightField("confirmpass");
	}

	if (password  !==  confirmPassword)
	{
		isFormValid  =  false;
		highlightField("password");
		highlightField("confirmpass");
	}

	if (isFormValid)
	{
		this.submit();
	}

});

function  resetValidationStyles()
{
	var  formFields  =  document.getElementsByClassName("form-control");

	for (var  i  =  0; i  <  formFields.length; i++)
	{
		formFields[i].classList.remove("is-invalid");
	}
}
function  highlightField(fieldId)
{
	var  field  =  document.getElementById(fieldId);
	field.classList.add("is-invalid");
}
```

This is an example of some client side validation we had in terms of JavaScript. The code here ensures that all fields need to be filled out before it can be submitted (otherwise the specific field that was not filled out will be highlighted red to let the user know which field it is), and also the passwords have to be the same before submitting.

This type of validation is present in all other forms aswell to ensure nothing is empty, and that the correct information is entered.

There is also HTML validation by using the `required` keyword in the forms to make sure that the user has to enter something before they can submit.

Login form HTML validation example:

```
<div  class="form-group">
	<input  type="text"  class="form-control"  name = "username"  id="username"  placeholder="Username"  required>
</div>
<div  class="form-group">
	<input  type="password"  class="form-control"  name = "password"  id="password"  placeholder="Password"  required>
</div>
```

**Server Side Validation:**

As client side validation can be bypassed, it is also very important to include server side validation to enhance security.

`loginprocess.php`
```
$password_hash = md5($password);

$sql = "SELECT  *  FROM users WHERE username = '$username' AND  password  = '$password_hash';";

$results = mysqli_query($connection, $sql);

if ($row = mysqli_fetch_assoc($results))
{
	$_SESSION['username'] = $username;
	header('Location: ../client/mainpage.php');
	exit();
}

else
{
	header('Location: ../client/invalidpage.php');
}

mysqli_free_result($results);
```

Attached above is the block of code that handles the login form server side validation. If the user exists, it will redirect them to the mainpage and they will now be logged in.

If however, they are NOT a valid user, it will redirect them to a separate php file which essentially tells them the username or password they entered is invalid, and a anchor link to bring them back to the login page.

Having both client side and server side validation ensures security and bad input for a smooth and secure experience.

All the PHP files that have SQL Query process going on also have error handling for database connections, so in the event there is a issue with a database, it will be handled correctly aswell.

`Basic database connection error handling`
```
$host = "localhost";
$database = "db_65683799";
$user = "65683799";
$password = "65683799";
$connection = mysqli_connect($host, $user, $password, $database);
$error = mysqli_connect_error();
session_start();
if($error != null)
{
	$output = "<p>Unable to connect to database!</p>";
	exit($output);
}
```

**AJAX Calls (JavaScript):**

Our project also took advantage in using AJAX calls to allow for creating posts, commenting, deleting posts, and search for a post. This makes the website experience smoother and cleaner as all of these features can be done whiteout having to reload the page, and makes it faster aswell. This also can prevent the "white screen" that people see when they often submit a form that has to process some information which can be offputting. These features will update automatically so there will be no white screen, and all information will be updated right away.

`ajaxSearch.js`
The code below showcases the AJAX functionality we implemented to allow for searching for a post by its title or content, and will automatically update the page as the user types in. I think this was one the coolest features of our website as the page updating dynamically as the user types is super cool to see.

```
$(document).ready(function()
{
	$("#search-input").keyup(function()
	{
		var searchTerm  =  $(this).val();
		filterPosts(searchTerm);
	});
	
	function  filterPosts(searchTerm)
	{
		$.ajax({
			url: "../server/filterposts.php",
			type: "GET",
			data: { search: searchTerm },
			success: function(response)
			{
				$(".col-md-8").html(response);
			},
			error: function(xhr, status, error)
			{
				console.log(xhr.responseText);
			}
		});

	};

});
```

This AJAX call requests the `filterposts.php` file which does server side scripting to see what the user is searching for by `post_title` or `post_content` which then updates it based the search term the user put in.

```
<?php
session_start();
$host = "localhost";
$database = "db_65683799";
$user = "65683799";
$password = "65683799";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();

if ($error != null) 
{
    $output = "<p>Unable to connect to the database!</p>";
    exit($output);
} else {
    if (isset($_GET['search'])) 
    {
        $searchTerm = $_GET['search'];
        $db = $connection;

        $query = "SELECT * FROM posts WHERE post_title LIKE '%$searchTerm%' OR post_content LIKE '%$searchTerm%';";
        $filteredPosts = mysqli_query($db, $query);

        foreach ($filteredPosts as $post) 
        {
            echo "<div class='card mb-4'>
                  <div class='card-body'>
                    <div class='container-fluid'>
                      <div class='row'>
                        <div class='col-md-12 card-title'>
                          " . $post['post_title'] . "
                        </div>
                      </div>
                    </div>
                    <p class='card-text'>" . $post['post_content'] . "</p>
                    <div class='btn-group'>
                      <button type='button' class='btn btn-success mr-2'><i class='fa-solid fa-arrow-up' style='color: #ffffff;'></i></button>
                      <button type='button' class='btn btn-danger mr-2'><i class='fa-solid fa-arrow-up fa-rotate-180' style='color: #ffffff;'></i></button>
                      <a href='../client/post.php?post_id=" . $post['post_id'] . "' class='btn btn-outline-primary'><i class='fa-regular fa-comment' style='color: #1e8c03;'></i></a>
                    </div>";

            if (isset($_SESSION['username']) && ($_SESSION['userID'] == $post['user_id'] || $_SESSION['username'] == 'admin')) 
            {
                echo "</div><div class='card-footer'>
                        <div class='d-flex justify-content-end'>
                          <button type='button' class='btn btn-danger btn-delete' data-post-id='" . $post['post_id'] . "'><i class='fa-sharp fa-solid fa-trash'></i></button>
                        </div>
                      </div>";
            }

            echo "</div></div>";
        }
    }
}
?>

<script src = ../client/js/postactions.js></script>
```

The query filters based on the search term and dynamically updates the page, while still making sure the filtered posts have all the correct info, and can be deleted (if it's the correct user or an admin).

**Upvoting and Downvoting**

There is also the ability to upvote or downvote a post. It uses a mix of server side scripting to store the upvotes/downvotes in the database, Ajax calls to make it async, and jquery to let the user know they have up or downvoted.

`upvotedownvote.php`

```
<?php
session_start();
$host = "localhost";
$database = "db_65683799";
$user = "65683799";
$password = "65683799";

$connection = mysqli_connect($host, $user, $password, $database);

$error = mysqli_connect_error();
if($error != null)
{
    $output = "<p>Unable to connect to database!</p>";
    exit($output);
}
else
{
    if (isset($_POST['action']) && $_POST['action'] === 'upvote') 
    {
        if (isset($_POST['post_id'])) 
        {
            $postId = $_POST['post_id'];
            
            if(isset($_SESSION['username']))
            {
                $query = "UPDATE posts SET upvotes = upvotes + 1 WHERE post_id = $postId";
                $result = mysqli_query($connection, $query);

                if ($result)
                {
                    exit();
                }
            }
        }
    }

    if (isset($_POST['action']) && $_POST['action'] === 'downvote') 
    {
        if (isset($_POST['post_id'])) 
        {
            $postId = $_POST['post_id'];

            if(isset($_SESSION['username']))
            {
                $query = "UPDATE posts SET downvotes = downvotes + 1 WHERE post_id = $postId";
                $result = mysqli_query($connection, $query);

                if ($result)
                {
                    exit();
                }
            }
        }
    }

    header("Location: ../client/mainpage.php");
    exit();
}

?>
```

The code above saves the up or downvote to the database depending on which button they chose. The user also has to be logged in for upvoting or downvoting to work.

**Preventing SQL Injection**

Alot of our code uses prepared statements instead of just normal querying to prevent against SQL injection attacks. 

`admin.php`

```
if (isset($_SESSION['username'])) 
    {
        $accountUsername = $_SESSION['username'];

        $stmt = mysqli_prepare($connection, "SELECT * FROM users WHERE username = ?");
        mysqli_stmt_bind_param($stmt, "s", $accountUsername);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) 
        {
            $stmt2 = mysqli_prepare($connection, "SELECT * FROM users WHERE username != ?");
            mysqli_stmt_bind_param($stmt2, "s", $accountUsername);
            mysqli_stmt_execute($stmt2);
            $result = mysqli_stmt_get_result($stmt2); 
        } 
        else 
        {
            header('Location: ../client/mainpage.php');
            exit();
        }
    } 
    else 
    {
        header('Location: ../client/mainpage.php');
        exit();
    }
```

This code snippet from the admin.php file (which handles deleting users) shows how we use prepared statements so SQL injection attacks cannot happen.

**Limitations**

There are a few limitations for our project.

- Upvotes and Downvotes: The user can either only downvote or upvote once and cannot change their vote, and it doesn't show a counter to how much upvotes or downvotes their are. We were struggling a bit in how to incorporate this as we could not figure out the correct sql query, so we just have the upvoting and downvoting functionality as far as we could get it.

- Images: We could not get the image functionality to work correctly, so the user cannot have an avatar, or anything to do with that sort, just username, firstname, lastname, password and email are the fields that define a user.

- Regex: We did not implement any regex functionality, just the default html validation behaviour in that regard.


The features above are just some of the cool functionality that was implemented in our project.


**Quick note on versionl control**

My group member and I made a seperate testing repo to have all of our code there to make sure that everything worked properly, before we brought it to the main repo. So most of our commits are in that repo, and I will attach a few screenshots to show our commit history.

![Total Commits](/src/client/img/pear_edit_commithistory.png)
![Commits between each other](/src/client/img/pear_edit_commitgraph.png)