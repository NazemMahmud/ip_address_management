# About
**IP Address Management Solution Backend**

# Table of Contents

| No. | Title                         |
|-----|-------------------------------|
| 1   | [Todos](#task-implemented)    |
| 2   | [Installation](#installation) |
| 3   | [Unit Test](#unit-test)       |
| 4   | [Postman](#postman)           |


# Todos
1. Authentication system, which will generate an authenticated token, with all subsequent steps requiring this authenticated token.
2. Add/Modify IP address with a small label/comment to it.
    1. Only authenticated user can do this.
    2. IP address must be validated before creating new entry
    3. IP address can't be modified, only the label of it.
    4. No delete action needed
3. An audit trail should be maintained for every login, addition or change
    1. Audit log can't be modified from codebase

# Installation

## Normal Installation
1. **Pre-requirements:** Laravel v^8.0, MySQL v^8.0 
2. After git clone, copy `env.example` and paste as `.env`
3. Update **DB_PASSWORD** in `.env` file. **Provide your own DB password** (_Not Necessary_)
4. **Install composer packages**: run `composer install`
5. **Key generate**: run `php artisan key:generate`
6. **JWT secret key generate**: run `php artisan jwt:secret`
7. Create the respective table **ip_address_management** and then migrate: run `php artisan migrate`
   1. If you use any other table name, update that in the `.env` file
8. Run project: `php artisan serve`
   1. **APP_URL** is used to run test. Check in `.env` file. Update if necessary according to your own

## Docker Installation
If you want to use docker to run this project
1. Install docker in your OS system
2. After git clone, copy `env.example` and paste as `.env`
3. Copy `docker-compose.yml.example` and paste as `docker-compose.yml` in root directory.
4. Update `.env`:
   1. Use **Docker Database configuration** instead of Normal Database configuration
```angular2html
- Set DB_HOST=db # must be the service name of the mysql container
- DB_PASSWORD must be provided. Already a password is provided in env.example. Change if you want to give your own password.
- Other DB configuration change if you want to provide your own.
```
5. In case of **Linux OS:** in `docker-compose.yml` file, remove comment from
```angular2html
user: "1000:1000" 
```
_**This solves storage log permission denied problem**_

8. Build and up the docker containers. run `docker compose up -d`
9. Now, go to the shell of **php** container: run `docker-compose exec php sh`
   1. Now run the following commands
```shell
$ composer install
$ php artisan key:generate
$ php artisan jwt:secret
$ php artisan migrate
```
7. In case of database migrate failure, you need to give database permission specifically
   1. Go to **db** container shell: run `docker-compose exec db sh`
   2. Enter into mysql shell, run command like this: `mysql -u root -p` Give password.
   3. Check Database exists: `SHOW DATABASES;` You will find the database name there.
   4. Now, grant the user (_in this case **root**_) permissions to access the database
```mysql
GRANT ALL ON ip_address_management_private.* TO 'root'@'%';
FLUSH PRIVILEGES;
```
Exit from this container. Now go to php container and run migrate command again.


# Unit Test
Command samples to run test file/s:
- Command to run tests: `php artisan test`
- Command to run tests without tty: `php artisan test --without-tty`
- Command to run a specific test file: `php artisan test --filter LoginTest`
- Command to run a specific test file without tty: `php artisan test --without-tty --filter LoginTest`

- To get the change in **audits** table for audit log, from the console for test: update `'console' => true,` in `config/audit.php` file

### Note 1: To test any unit test file which needs a bearer token. 
For this, 
* At first, login with any email
* Take the **access_token** value from it
* Update **$this->token** value in the respective test file. Such as, for `IPAddressCreateTest` update value inside `setup()`

### Note 2: 
It's better to run each test file separately. Some tests results might fail because of dependency conflict. Such as, LoginTest with RegisterTest file


# Postman
- **Postman API collection** is provided here: `IP address management.postman_collection.json`
  **For environment Variable**,
- Set **BASE_URL** like, `http://localhost:port/api` 
