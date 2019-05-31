# jobs.at coding exercise

We're happy you applied for a job as full-stack developer at jobs.at :)
Before you can get started at jobs.at, we have a small exercise for you where you can show use your skills
as full-stack developer.

## Exercise description

At jobs.at we obviously have to deal a lot of with jobs, companies and people who are looking for a job.
We want you to create a small web app where the user can find jobs he/she is interested in. Moreover, there should
be the possibility to publish a new job and make it available to potential candidates.

## Tasks to be done 

1. The home page should initially show a list of all recent jobs (the ones which were published within last week).

Following information should be displayed:
* Title of the job.
* Name of the company the job belongs to.
* Description of the job.
* Date and Time the job was published. 

The list should be sorted in descending order by the date the jobs were published.
A job can either be active or inactive if taken by an applicant. As a user I want to see visually which job is active
and which one inactive. Think about how this can be shown visually and implement it.

2. An input field should be provided where the user can search for a job by its title. As the user keeps typing
the list of jobs should be adapted on demand based on the search value. The filtering should be done solely on the client
side in order to provide a good user experience. 

3. By pressing an "Add" button a new page with a form should be shown where the user can enter a new job.
The form should contain
* an input for the title of the job
* a dropdown with the names of the companies to select the company the jobs should belong to
* a textarea to enter a description for the job
* a "Save" and a "Cancel" button
  
By pressing "Cancel" the user should be redirected to the home page.
By pressing "Save" the job should be saved to the database, then the user should be redirected to the homepage
and the new job should be shown as first one in the job listing. 

## Project Setup

In order to get you started quickly we have created a basic project setup for you. It uses the PHP web framework [https://laravel.com](Laravel),
which we also use at jobs.at for our projects. It gives you a great starting point to prototype a backend, REST API and 
frontend with HTML, CSS and JavaScript. However, if you are not into PHP programming and want to use some other technologies
or programming languages, feel free to do so. Just consider that we cannot provide a skeleton in this case.

## Requirements to run this project

1. Make sure you have installed PHP.

On Windows you can use [http://www.wampserver.com/en/](WAMP).
On Mac OSX we recommend installing PHP via [https://brew.sh/index_de](Homebrew). Just execute `brew install php`
On Linux you can use `sudo apt-get install php`

2. Install composer (the package manager for PHP)

[Download and install](https://getcomposer.org/download/)
If you are n Mac OSX you can also use `brew install composer`.

## Startup the project

Now, you are already setup to run this project for the first time. 

1. Run `git clone https://github.com/jobs-at/coding-exercise.git coding-exercise` to clone the repository to your machine.
2. Run `cd coding-exercise` to change to the project folder.
3. Run `php artisan serve` to startup the development server.
4. Open http://localhost:8000/ in your browser.

## Database

In order to make the user experience more realistic the project uses a MySql database to store the jobs and companies
needed to complete the exercise. You therefore need to start a MySql database on your machine. 

If you have installed [Docker](https://docs.docker.com/), simply execute the following command to startup MySql and setup
the database and user needed.

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

## Let's build something

Happy coding :)

 
