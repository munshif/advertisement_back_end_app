

## About the Project

Product Advertisement Applicaton APIs.

## Requirements
 * PHP 8 with composer
 * Docker - Docker needs to be installed, up and running.

<hr><br/>

## How to run the project?

### Setting Up

<h4>1. Please install the dependencies by following command:</h4>
<code>composer install</code>

<h4>2. To start the instance:</h4>
<code>./vendor/bin/sail up -d </code>

<h4>3. To stop the instance:</h4>
<code>./vendor/bin/sail down </code>

<h4>5. Need to run the database migration to create the necessary tables in the database:</h4>
<code>./vendor/bin/sail artisan migrate</code>

<h4>6. Run database seeder to create the test users:</h4>
<code>./vendor/bin/sail artisan db:seed</code><br/><br/>

**Note: Create a copy of .env.example to and rename .env**

<hr><br/>
