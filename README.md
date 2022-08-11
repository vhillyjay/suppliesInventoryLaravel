# suppliesInventoryLaravel
## Steps on cloning and making the app work on your local device
### 1. Install XAMPP
### 2. Clone the repo
### 3. On the terminal(cmd) go to the rootfolder/path 
### 4. Run the necessary commands to install all the modules that are listed on package.json etc.
       - composer install
       - composer update
       - npm install
       - npm run dev
       - npm run build
### 5. On a new terminal run: 'php artisan serve' to run the app
### 6. On a new terminal run:
       - mysql -u root
       - create database cvssupplies;
         - path on windows env
         - xampp apache and mysql
### 7. On a new terminal run: 'php artisan migrate' to migrate/create the tables onto the database

    > *forgotPasswordScreenshots folder is not included in the app/code. it is just a screenshot of forgotten password function*
