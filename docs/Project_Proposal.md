# COSC 360 Project Proposal 
## Team Members: Agam Aneja and Sheel Patel

### Basic Project Description:
We will be creating a website similar to Reddit which will be called Peareddit. The website will have the ability to create an account, view and create threads, comment and browse threads, the ability to view and edit your profile, as well have admin support. 

### Technologies used:

The technologies that will be used are as follows: 

 - HTML, CSS (will also use Bootstrap), and JS for basic frontend and form validation.
 - PHP, MySQL, and Apache for the backend scripting and database storage.
 - Docker for deployment.


 ### Minimum Functional Requirements: 
 The website will have the basic functionality similar to Reddit which will include:

**For User:**
 
 - Home page showing current threads and comments, as well as option to sign in.
 - If users are not logged in, they are free to browse discussions/threads.
 - Login screen page so the user can create and account and/or login.
 - Login screen page will include password reset functionality incase user forgets their password.
 - Login screen page will have validation to prevent bad input.
 - Website will have functionality for user to view threads.
 - Website will have functionality for user to comment on threads (if logged in).
 - Website will have functionality for user to create and post threads (if logged in).
 - Website will have a profile page which will include their information such as name, email, and avatar, which can all be changed if needed.
 - Website will have search functionality so user can search for a specific post or thread (updated asynchronously).
 - Website will be responsive to account for different devices such as a computer, tablet, phone.
 - Website will have state management to track login status.
 - Website will have breadcrumbs to let the user know what thread they are in, and can easily navigate back to the home page.
 - Website will have effective styling to allow for easy navigation and an optimal user experience.
 - Website will have asynchronous functionality for certain features like updating discussion threads, or searching for a post/thread/comment.

**For Admin:**

 - Admin can search for any user by their name, email or post/thread.
 - Admin can enable or disable users.
 - Admin can edit and/or delete threads and comments.

**Backend Requirements**

 - User information such as name, email, password and images will be stored in a secure database.
 - Admin information will be stored in a secure database.
 - Chats/Threads/Comments will be stored in a secure database.
 - Database will have security in place to protect against data leakage, SQL Injunction, and privacy protection.

### Stretch Goals

 - Hot threads / Trending activity.
 - See the comment history for a user.
 - Being able to create "subreddits".
