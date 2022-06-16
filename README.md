# api-test

## Init this project

- Clone and cd into this project
- ```docker volume create pg_db```
- ```docker-compose up -d```
- ```docker exec -it test_api-php-workspace bash```
- ```cp .env.example .env```
- ```php composer install```
- ```php composer update```
- ```php artisan migrate```
- ```php artisan module:seed User```

## Project Business logic
- app\Containers
- app\Core

## Endpoits
- ```https://domain.com/api/auth/register | POST ```
- ```https://domain.com/api/auth/login | POST ```
- ```https://domain.com/api/user/companies | GET ```
- ```https://domain.com/api/user/companies | POST ```

## TODO
- add endpoint: recover-password
- need to replace the controller with action (ADR)
- add service layer for tasks
- tests
- add api-doc or swagger for endpoints

## Stack:
- Lumen
- PostgreSQL

## Task:
Create RESTFull API.

## Description:
Create the API to share the company's information for the logged users.

## Details:

Create DB migrations for the tables: users, companies, etc.
Suggest the DB structure. Fill the DB with the test data.

## Endpoints:
- ```https://domain.com/api/user/register```
- ```method POST```
- ```fields: first_name [string], last_name [string], email [string], password [string], phone [string]```

- ```https://domain.com/api/user/sign-in```
- ```method POST```
- ```fields: email [string], password [string]```

- ```http://localhost/api/user/recover-password```
- ```method POST/PATCH```
- ```fields: email [string]``` // allow to update the password via email token

- ```https://domain.com/api/user/companies``` 
- ```method GET```
- ```fields: title [string], phone [string], description [string]```
- ```show the companies, associated with the user (by the relation)```

- ```https://domain.com/api/user/companies```
- ```method POST```
- ```fields: title [string], phone [string], description [string]```
- ```add the companies, associated with the user (by the relation)```

Unit tests are optional.