## AE Partner Programmer Evaluation Project

Hello, this is repository contains a sample Laravel 5.3 project, that is used
for programmer evaluation.

The application is a small "blog". It contains a list of blog posts and each
of them can have multiple comments.

To get your qualification, you must complete the tasks listed below.

The tasks are in English to evaluate language comprehention skills.

You can either just send in the completed project as a ZIP, or [fork this project](https://help.github.com/articles/fork-a-repo/) on GitHub and create a pull request.

## Task 0: Installing

_This task evaluates the skill "programmer" :)_

You will need PHP and [composer](https://getcomposer.org).

1. Checkout the repository

2. Run `composer install`

3. Run `php artisan --sevre`

4. Connect to `http://localhost:8000`

Info about the repository: we have added a database/database.sqlite file to this
repo, so some sample data is already inside. By completing the tasks you can
choose to either add the modified database.sqlite file to the commit or omit it.

Hints:
* [Laravel Documentation](https://laravel.com/docs/5.3)
* Check out the database.sqlite table structure in `/database/migrations`

## Task 1: Maximum Post Title Length

_This task evaluates familiarity with MVC frameworks and Laravel_

The application allows creating new posts. Please add validation so that it is
impossible to create posts with description longer than 255 characters.

Hints:
* file `/app/Http/Controllers/PostController.php`
* file `/resources/views/post/create.blade.php`
* [Laravel Validation](https://laravel.com/docs/5.3/validation)

## Task 2: Unique Post Titles

When creating new post, check if post with such title already exists and prevent
creating a duplicate.

## Task 3: Editing Posts

When opening a post, there is functionality to edit it. Please make sure that the
same validation created in Task 1 and 2 is also used when editing.

Hints:
* file: `/resources/views/post/edit.blade.php`

## Task 4: Create Possibility to Delete Posts

Create possibility to delete post from the post list view.

## Task 5: Display Creation Date in Post List

In post list view display creation and last update date next to each post.

## Task 6: Block Commenters

Under each post, a list of comments is displayed. Add a "block this person"
button next to each comment. The button should delete all comments from
database with the same email.

## Task 7: Links and Navigation

_This task evaluates familiarity with HTML and UX_

In all pages, add link to start page, and a page title. Optionally create some
navigation.

## Task 8: Style

_This task evaluates familiarity with CSS and Laravel build tools_

Add some style to the application. Use of CSS frameworks (Bootstrap, Zurb,
Google Material, etc) is permitted.

For extra points, you can also use the built in gulpfile and node to build CSS
from SCSS.

## Task 9: Advanced Block Commenters Functionality

_This task evaluates skill to add full functionality to a project_

Create a new table for blocked commenters with one field: "email".

The idea is that, once a commenter is blocked, his email will be registered
in this table, and new comments will not be permitted with that email.

You need to:
* Create the new table
* When blocking commenter (functionality from task 6) add the email to the new
  table.
* When postin a new comment, check if the provided email is not in blocked
  commenters table.

Hints:
* [Laravel Migrations](https://laravel.com/docs/5.3/migrations) are highly recommended,
  but other means of creating the table are also ok, if the database.sqlite file
  will be commited for review.

## Task 10: 

_This task evaluates familiarity with modern Javascript_

Convert one or more pages by adding Javascript functionality using
([React](https://facebook.github.io/react/), [Vue](https://vuejs.org), or any other)

Examples include (but are not limited to), showing a "edit post" popup with json data
posting in the `/post/1` window instead of separate view `/post/1/edit`

You can also do something with jQuery, but that will not be counted as full point.