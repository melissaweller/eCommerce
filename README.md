# eCommerce

## Commands Run
1. Created a reposity
2. Clone the repository using: git clone `https://github.com/melissaweller/eCommerce.git`
3. Opened that new eCommerce folder to work and place the new Web Application

## Commands to Push work to GitHub
1. git add .
2. git commit -m " "
3. git push

## Running the Docker container to host the Web Application 
1. Start Docker Desktop
2. Run the command: `docker run --name myXampp -p 22:22 -p 80:80 -d -v C:/Users/2034977/eCommerce:/opt/lampp/htdocs tomsik68/xampp`

## Accessing the project
1. Open a browser to: `http://localhost`

## Bootstrap the project
1. Create a file called `.htaccess`
2. Copy below and don't add any other characters
```
Options -MultiViews
Options -Indexes

RewriteEngine On

RewriteBase / 

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f

RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
RewriteRule ^()$ index.php?url=$1 [QSA,L]
```
## Core Folder
holds all the framework core functionality that will not be modified by the programmer / user