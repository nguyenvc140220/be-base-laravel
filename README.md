# Laravel Project Base - OACP Team

## About the project

This is a base api project developed by OACP team. It is built on top of Laravel 11.x and uses the Laravel Request Docs package to automatically generate API documentation.

[![](https://img.shields.io/badge/Laravel-v11.x-ff2e21.svg)](https://laravel.com)

- [Laravel 11.x](https://github.com/laravel/laravel)
- [Laravel Request Docs](https://github.com/rakutentech/laravel-request-docs)

## Environment

- PHP 8.3.0
- Laravel 11.x
- Node 18
- MySQL 8

## Features

- ✅ Login (authentication + authorization)
- ✅ Password Reset (Send email reset password)
- ✅ Refresh token
- ✅ Logout
- ✅ Automatic Api Documentation -- route /request-docs

## Structure

```
.app
├── Domain
│   └── User
│       ├── Actions
│       ├── DTO
│       ├── Entities
│       └── Repositories
├── Http
│   ├── Api
│   │   ├── Controllers
│   │   ├── Exceptions
│   │   ├── Middleware
│   │   ├── Requests
│   │   └── Resources
│   └── Web
│   │   ├── Controllers
│   │   ├── Exceptions
│   │   ├── Middleware
│   │   ├── Requests
│   │   └── Resources
├── Infrastructures
│   ├── Models
│   └── Repositories
├── ...

```

Main folders:

- Domain: this folder contains the business logic of the application.
  - Actions: contains the actions that the application can perform.
  - DTO: contains the data transfer objects.
  - Entities: contains the entities of the application.
  - Repositories: contains the repositories of the application.
- Http: contains the controllers, requests, resources, and middleware.
  - Api: contains the controllers, requests, resources, and middleware for the API.
  - Web: contains the controllers, requests, resources, and middleware for the web.
- Infrastructures: contains the models and repositories.

## ⚡️ How to install

### Requirements

Make sure the following are installed:

- Docker Desktop

### VS code setup

```bash
### setup extensions on Linux / Mac:
  $ make extensions-linux

### on Windows:
  $ make extensions-windows

### Reload Window:
### Cmd+Shift+P (MAC) or Ctrl+Shift+P (Windows) -> 'Reload Window'
```

### Docker

```bash
# run first time
$ make init

# run project in next times:
$ make start

# run front-end
$ cd laravel-app
$ npm install
$ npm run dev
```

## Conventions

### Command List

- Lint: [Larastan](https://github.com/nunomaduro/larastan)の Lint Check

```bash
$ make lint
```

- Format: [PHP-CS-Fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer)の Format Check

```bash
$ make fmt
```

### Rule

## HTTP Status Codes in API

Below are some common conventions when building **RESTful API**:

### **1. GET (Retrieve data)**

- **200 OK**: Successfully returned data.
- **404 Not Found**: Requested resource not found.

### **2. POST (Create new resource)**

- **201 Created**: Successfully created a new resource.
- **400 Bad Request**: Invalid or missing data.
- **422 Unprocessable Entity**: Input data validation error.

### **3. PUT/PATCH (Update resource)**

- **200 OK**: Successfully updated and returned the updated resource.
- **204 No Content**: Successfully updated but no content to return.
- **404 Not Found**: Resource to update not found.

### **4. DELETE (Delete resource)**

- **204 No Content**: Successfully deleted.
- **404 Not Found**: Resource to delete not found.

### **5. Authentication and Authorization**

- **401 Unauthorized**: Missing or incorrect authentication information.
- **403 Forbidden**: No permission to access the resource.

Follow this file:
[Rules](https://gitlab.com/tuananh.pham3/base-php-laravel/-/blob/main/docs/policy.md)
