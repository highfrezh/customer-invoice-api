# CUSTOMAER AND INVOICES API

## Introduction
This repository contains scripts that can be used to set up the Customer and Invoice API.
The API allows users to perform CRUD Operation on both Customer and Invoice and also create bulk Invoice. It also allows users to fetch and filter the relatinship between  the customer and Invoice. 

The API documentation is available [here](https://documenter.getpostman.com/view/16161182/2s83zfRREf).


## Prerequisites
This API relies on MySQL, PHP 8+ and composer for any meaningful work, so make sure you have all the required libraries installed either locally or remote, depending on your setup. See [https://laravel.com/docs/9.x/installation](https://laravel.com/docs/9.x/installation) for information about setting up Laravel on your machine

## Quick Start
You should have the all the necessary libraries installed on your machine after following all the steps in the URI given in the ```Prerequisites``` section.

### Step 1: Clone project
Clone the repository using the git command below:

````
$ cd ~
$ git clone https://github.com/highfrezh/customer-invoice-api.git
$ cd customer-invoice-api
````

### Step 2: Update Environment Variables
Copy the .env.example file to .env and update the following by replacing the Xs with your actual values in the .env file:

````
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=XXX
DB_USERNAME=XXX
DB_PASSWORD=XXX
````

### Step 3: Install Application Dependencies
From the project directory, install all dependencies with the command below:

````
$ composer update
````

### Step 4: Generate Application Key

From your project directory, run the following command to generate the application encryption key


````
$ php artisan key:generate
````

### Step 5: Run database migration and seed
When all the steps above have been completed, you then proceed to run the command below for database migration and seed
````
$ php artisan migrate --seed
````
The *--seed* can be ignored if you do not want any dummy data in the database.

### Step 6: Run the application

Start the application by running the command below, the API resources should be accessible via [http://localhost:8000](http://localhost:8000)

NB: The application port (8000) might be different, check your console to confirm the port number.
````
$ php artisan serve
````
### Improvements
Below is a list of improvements I would like to make on this codebase:


- #### Create UI for registration, login and generating Token.  
- #### Create a separate app (a VueJs app) to consume the API.
