<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Code base laravel
## Getting started
### About the project
This is a code base for a laravel project. It includes some common features that are used in most projects such as:
- Authentication
- Updating...

### Environment
- PHP 8.3.0
- Laravel 11.x
### Run project with docker
1. Install docker and docker-compose
2. Install make
3. Clone this repository
4. Run `make init`: This command will build the docker image and run the container
5. Run project in next times: `make start`
6. Stop project: `make stop`

## Project conventions

### Project structure (updating...)
Main folders:
- Controller: receives HTTP requests from the client and decides what to do with them
- Service: separates complex business logic from the controller. Instead of handling all logic in the controller, a service class will take care of this.
- Repository: handles querying data from the database
- Resource: formats the returned data
- Model: represents the database table

### Convention for Using HTTP Status Codes in API

Below are some common conventions when building **RESTful API** or **GraphQL API**:

#### **1. GET (Retrieve data)**

- **200 OK**: Successfully returned data.
- **404 Not Found**: Requested resource not found.

#### **2. POST (Create new resource)**

- **201 Created**: Successfully created a new resource.
- **400 Bad Request**: Invalid or missing data.
- **422 Unprocessable Entity**: Input data validation error.

#### **3. PUT/PATCH (Update resource)**

- **200 OK**: Successfully updated and returned the updated resource.
- **204 No Content**: Successfully updated but no content to return.
- **404 Not Found**: Resource to update not found.

#### **4. DELETE (Delete resource)**

- **204 No Content**: Successfully deleted.
- **404 Not Found**: Resource to delete not found.

#### **5. Authentication and Authorization**

- **401 Unauthorized**: Missing or incorrect authentication information.
- **403 Forbidden**: No permission to access the resource.
