# jobs.at coding exercise

We're happy you applied for a job as full-stack web developer at jobs.at :)
Before you can get started at jobs.at, we have a small exercise for you where you can show us your skills
as full-stack web developer.

## Exercise description

At jobs.at we obviously have to deal a lot of with jobs, companies and people who are looking for a job.
We want you to create a small web app where the user can find jobs he/she is interested in. Moreover, there should
be the possibility to publish a new job and make it available to potential candidates. 

Consider to put about 2-4 hours of work into the exercise. It is not necessary to spend 5 or more hours to get some result.
If you cannot complete all the tasks, don't mind to send us the results you have. 

## Tasks to be done 

1. The home page should initially show a list of all recent jobs (the ones which were published within last week).
   The endpoint which gets the data and passes it to the page is already implemented. 
   (see `index` controller action in `JobController.php`). The `index.blade.php` is the home page which contains a dummy 
   `JobList.vue` component as starting point for you.  

   Following information should be displayed:
   * Title of the job.
   * Name of the company the job belongs to.
   * Description of the job.
   * Location.
   * Date and Time the job was published (format: yyyy-MM-dd HH:mm:ss)

   A job can either be active or inactive if taken by an applicant. As a user I want to see visually which job is active
   and which one inactive. Think about how this can look in the UI and implement it.
   
At the bottom of this section there is a link to a UI-Mockup, which shows you how the layout of the small web-app 
should approximately look like.

2. An input field should be provided where the user can search for a job by its title. As the user keeps typing
the list of jobs should be adapted on demand based on the search pattern. The filtering should be done solely on the client
side in order to provide a good user experience. The project setup contains [Vue.js](https://vuejs.org) 
which should be used to build the filtering feature on the client side.

3. According to the proposed UI mock-up (see bottom of this section), additional filter options should be provided to the user. Firstly, he/she should
be able to narrow down the search results based on the selected locations shown in the sidebar. For sake of simplicity
our jobs can only have one of five locations, namely "Linz", "Vienna", "Graz", "Salzburg" and "Innsbruck". You can hard-code
these locations in your sidebar component.

4. Secondly the user should also be able to search for jobs from specific companies. Therefore, add the available companies
as selectable options in the sidebar. We have already implemented an endpoint for you which gets you the names of the 
companies. Only the jobs of the companies selected in the sidebar should the be shown in the list.

For all the filter options, the list in the UI should automatically update without a page refresh.

[UI-Mockup](https://drive.google.com/open?id=1LNf1n1k8JtmjdAwx_k5vEwj4Cc1WZ37v)

## Project Setup

In order to get you started quickly we have created a basic project setup for you. It uses the PHP web framework [Laravel](https://laravel.com),
which we also use at jobs.at for our projects. It gives you a great starting point to prototype a web app with Vue, HTML, CSS and JavaScript. 

## Requirements to run this project
If you have PHP, composer and Node installed on your machine can skip the the following two steps and continue with the
next section. If you decide to use a different technology stack than we provide, you can turn directly to the database setup.

1. Make sure you have installed PHP.

   On Windows you can use [WAMP](http://www.wampserver.com/en/).
   On Mac OSX we recommend installing PHP via [Homebrew](https://brew.sh/index_de). Just execute `brew install php`.
   On Linux (Ubuntu) you can use `sudo apt-get install php`.
   Check your installation with `php -v`.

2. Install composer (the package manager for PHP)

   [Download and install](https://getcomposer.org/download/)
   If you are n Mac OSX you can also use `brew install composer`.
   Check you installation with `composer --version`.

## Startup the project

Now, you are already setup to run this project for the first time. 

1. Get the playground to your machine by either
   * Forking the repository into your github account (preferred).
   * If for whatever reason you do not have a Github account run `git clone https://github.com/jobs-at/coding-exercise.git coding-exercise` to clone the repository to your machine.
2. Run `cd coding-exercise` to change to the project folder.
3. Run `composer install` to install all PHP dependencies.
4. Copy the content of `.env.example` to `.env` file.
5. Run `php artisan generate:key` to generate the necessary application key which will be put automatically into you `.env` file. 
6. Run `php artisan serve` to startup the development server.
7. Open [http://localhost:8000/](http://localhost:8000/) in your browser.

## Frontend development

The frontend build requires you to have Node installed. If you do not yet have Node installed, you can download and 
install it from [here](https://nodejs.org/en/download/). On MacOSX you can use `brew install node` as well.
Check your installation with `node -v` which should print the current node version. 

Now run 

1. `npm install` to install all frontend dependencies. 
2. `npm run watch` to build the frontend and make it watching your files for any changes.
This process will automatically detect any changes to frontend resources like Vue SFC, HTML, SCSS and JS so that you only have
to reload your browser window after a change.

## Database

In order to make the user experience more realistic the project uses a MySql database to store the jobs and companies
needed to complete the exercise. You therefore need to start a MySql database on your machine. 

If you have installed [Docker](https://docs.docker.com/), simply execute the following command to startup MySql, setup
the database and user needed and make it available on default port 3306.

`docker run -p3306:3306 --name coding-exercise -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=coding-exercise -e MYSQL_USER=coding-exercise -e MYSQL_PASSWORD=iwanttocode -d mysql:5.7 --character-set-server=utf8mb4 --collation-server=utf8mb4_unicode_ci`

If you do not have installed Docker, don't want to install it or want to use you local MySql, you need the following.
* Make sure to use the default port `3306`.
* A database `coding-exercise`.
* A user `coding-exercise` with the password `iwanttocode` who has all privileges on this database.

## Job and company sample data

We have created database migrations and a seeder for you to build up the database as you will need it automatically.
It also populates it with sample data (jobs and companies) so you do not have to manually enter any test data from scratch.

Simply execute `php artisan migrate:fresh --seed` to migrate the database and fill it with data.

After that you can connect to your database and check whether there is a `jobs` and a `companies` table with fake data.
The data consists of 30 random jobs and 3 companies whereby each of them having assigned 10 jobs.
Info: You do not have to pay attention to the `migrations` table. 

## A few more tips before you start

Make sure you have started up the Laravel Development Server with `php artisan serve`.
I recommend running `npm run watch` which automatically refreshes you frontend resources like HTML (Blade), Vue (.vue), JS and SCSS when something changes.
As a result you just need to refresh your browser window and can inspect your changes.
If some change is not reflected in the browser you may have to rerun `npm run watch` at some point but this should actually
be the exception. 

The project already contains the necessary models `Job.php` and `Company.php` (you can find them in the `app` folder)
with the attributes from the database. Behind the scenes an OR mapper ([Eloquent](https://laravel.com/docs/5.8/eloquent)) uses these Model classes to ease the communication
with the database. An HTTP controller `JobController` as well as a `CompanyController` which returns the companies as JSON payload is provided as starting point. 
Tip: The [Laravel documentation](https://laravel.com/docs/5.8) and the [Vue.js documentation](https://vuejs.org/v2/guide/) will help you along the way as they have a very thorough documentation.

Regarding the frontend, following things should be considered:
* The project includes the UI toolkit [bootstrap](https://getbootstrap.com/) which might
be helpful when layouting and styling your page. Feel free to use them if you want. In order to enable them, you
only have to comment in the CSS file in the `index.blade.php`.
* We do not expect a fancy UI design but keep mobile-first and responsiveness in mind when layouting the pages.

## How to submit
The preferred option is to send us a link to the forked repository in your Github account.
If you do not have one, please send us your result either as ZIP archive or by sharing a link to some other cloud service
where you have stored it. 

If you have any questions do not hesitate to contact us.

We are already curious about your results. Let's build something.   

Happy coding :)
