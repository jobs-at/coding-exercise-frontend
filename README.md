# jobs.at coding exercise

We're happy you applied for a job as full-stack developer at jobs.at :)
Before you can get started at jobs.at, we have a small exercise for you where you can show us your skills
as full-stack developer.

## Exercise description

At jobs.at we obviously have to deal a lot of with jobs, companies and people who are looking for a job.
We want you to create a small web app where the user can find jobs he/she is interested in. Moreover, there should
be the possibility to publish a new job and make it available to potential candidates. 

Consider to put about 2-4 hours of work into the exercise. It is not necessary to spend 5 or more hours to get some result.
If you cannot complete all the tasks, don't mind to send us the results you have. 

## Tasks to be done 

1. The home page should initially show a list of all recent jobs (the ones which were published within last week).

   Following information should be displayed:
   * Title of the job.
   * Name of the company the job belongs to.
   * Description of the job.
   * Location.
   * Date and Time the job was published (format: yyyy-MM-dd HH:mm:ss)

   The list should be sorted in descending order by the date the jobs were published.
   A job can either be active or inactive if taken by an applicant. As a user I want to see visually which job is active
   and which one inactive. Think about how this can look in the UI and implement it.

2. An input field should be provided where the user can search for a job by its title. As the user keeps typing
the list of jobs should be adapted on demand based on the search value. The filtering should be done solely on the client
side in order to provide a good user experience. 

3. By pressing an "Add" button a new page with a form should be shown where the user can enter a new job.
   The form should contain
   * an input field for the title of the job
   * a dropdown with the names of the companies to select the company the job should belong to
   * a textarea to enter a description for the job
   * a "Save" and a "Cancel" button
  
   By pressing "Cancel" the user should be redirected to the home page.
   By pressing "Save" the job should be saved to the database, then the user should be redirected to the homepage
   and the new job should be shown as first one in the job listing. 
   
   Extra task: If you have some time remaining, try to implement a simple validation which shows the user an error
   if the job title is longer than 50 characters. 

## Project Setup

In order to get you started quickly we have created a basic project setup for you. It uses the PHP web framework [https://laravel.com](Laravel),
which we also use at jobs.at for our projects. It gives you a great starting point to prototype a backend, REST API and 
frontend with HTML, CSS and JavaScript. However, if you are not into PHP programming and want to use some other technologies
or programming languages, feel free to do so. Just consider that we cannot provide a skeleton in this case.

## Requirements to run this project
If you have PHP, composer and Node installed on your machine can skip the the following two steps and continue with the
next section. If you decide to use a different technology stack than we provide, you can turn directly to the database setup.

1. Make sure you have installed PHP.

   On Windows you can use [http://www.wampserver.com/en/](WAMP).
   On Mac OSX we recommend installing PHP via [https://brew.sh/index_de](Homebrew). Just execute `brew install php`.
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
3. Run `php artisan serve` to startup the development server.
4. Open http://localhost:8000/ in your browser.

## Frontend development

The frontend build requires you to have Node installed. If you do not yet have Node installed, you can download and 
install it from [here](https://nodejs.org/en/download/). On MacOSX you can use `brew install node` as well.
Check your installation with `node -v`. You are free to use either `npm` or `yarn` as package manager for the frontend.  

Now run 

`npm run watch` 

to build the frontend and make it watching your files for any changes.
This process will automatically detect any changes to frontend resources like HTML, SCSS and JS so that you only have
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
* A user `coding-exercise` with the password `iwanttocode` who has privileges on this database.

If you are using the Laravel playground, the connection is already setup to use this database and you can continue.

## Job and company sample data

We have created database migrations and a seeder for you to build up the database as you will need it automatically.
It also populates it with sample data (jobs and companies) so you do not have to manually enter any test data from scratch.

Simply execute `php artisan migrate:fresh --seed` to migrate the database and fill it with data.

After that you can connect to your database and check whether there is a `jobs` and a `companies` table with fake data.
The data consists of 30 random jobs and 3 companies whereby each of them having assigned 10 jobs.
Info: You do not have to pay attention to the `migrations` table. 

## A few more tips before you start

Make sure you have started up the Laravel Development Server with `php artisan serve`.
I recommend running `npm run watch` which automatically refreshes you frontend stuff like HTML (Blade), JS and SCSS when something changes.
As a result you just need to refresh your browser window and can inspect your changes.
If some change is not reflected in the browser you may have to rerun `npm run watch` at some point but this should actually
be the exception. 

The project already contains the necessary models `Job.php` and `Company.php` (you can find them in the `app` folder)
with the attributes from the database. Behind the scenes an OR mapper (Eloquent) uses these Model classes to ease the communication
with the database. An HTTP controller `JobController` which returns a sample HTML site has been created as starting point for you. 
Tip: The [Laravel documentation](https://laravel.com/docs/5.8) will help you along the way as it has a very thorough documentation.

Regarding the frontend, following things should be considered:
* The project includes some libraries like [bootstrap](https://getbootstrap.com/) and [jquery](https://jquery.com/) which might
be helpful. Feel free to use them if you want.
* We do not expect a fancy UI design but keep mobile-first in mind when layouting the pages.

## How to submit
The preferred option is to send us your Github account with the forked repository.
If you do not have one, please send us your result either as ZIP archive or by sharing a link to some other cloud service
where you have stored it. 

If you have any questions do not hesitate to contact us.

We are already curious about your results. Let's build something.   

Happy coding :)

 
