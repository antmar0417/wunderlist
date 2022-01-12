<div align="center">
    <img src="https://media.giphy.com/media/aSZSj0mT8f6tW/giphy.gif" width="400px"></img> 
</div>

# Wunderlist

The purpose of this individual assignment was to create a to-do list application using PHP, HTML, CSS, JavaScript.

# Installation

To run this project follow the steps below:

-   Open the terminal and change the current working directory to the location where you want the cloned directory.

-   Clone the project by pasting the command below

    ```
    git clone https://github.com/antmar0417/the-elephant-assignment.git
    ```

-   Start php server by typing

    ```
    php -S localhost:8000
    ```

-   Open up you browser and paste in this link:
    ```
    http://localhost:8000/index.php
    ```

# Code Review

Code review written by [Sofia Rönnkvist](https://github.com/sofiaronnkvist).

1. `users/register.php:11` - You should make sure that the user chooses a strong password, at least 16 characters.
2. `users/avatar/upload.php:13` - Your folder uploads can't be found, and isn't created when a new avatar is uploaded.
3. `index.php:general` - A back button of some sorts would be nice, so you don't have to push X every time you want to go back.
4. `users/register.php` - You only have to validate data at this stage, not sanitize it.
5. `users/register.php` - If you have unique fields in your database, like email, you need to handle if someone tries to create a new account with an already existing email.
6. `/app/users/email/upload.php` - Same thing here, if I try to update to an email that already exists I should be notified.
7. `functions.php:22` - This function could be written as return isset($\_SESSION['user']);, since it's set to return a bool.
8. `header.php:10` - Nice job styling using some Bootstrap!
9. `General` - Even though FILTER_SANITIZE_STRING is supposed to be deprecated, htmlspecialchars doesn't seem to sanitize output like for example a simple script the same way.
10. `users/lists/delete-list.php` - You should always use bindParam instead of putting variables directly in your query. And here, since you've not prepared a queary, you don't need to run execute.

# Testers

Tested by the following people:

1. Oliver Davis
2. John Doe
