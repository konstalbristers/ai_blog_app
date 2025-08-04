Project Description

this is a laravel and mysql web app that makes blog posts with ai you just type a title and it writes a 3 paragraph blog for you and saves it in the database

Features

you can make ai blogs save them in mysql and see them on the main page it has form validation some error handling and uses laravel http client to talk to openai api

Tech Stack

built with laravel php for backend mysql for the db blade templates for the views and bootstrap 5 for the styling it calls openai api to create the blog content

Setup

clone the repo run composer install set up the db info and openai api key in the .env file run migrations start the server and open it in your browser at [http://localhost:8000](http://localhost:8000)

Environment Variables

add your db stuff and the api key in the .env file example

DB\_DATABASE=ai\_blog\_db  
DB\_USERNAME=root  
DB\_PASSWORD=  
OPENAI\_API\_KEY=sk-your-openai-key

Usage

go to the create page put in a title hit generate and it makes a blog the post gets saved and shows on the home page

