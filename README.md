# Laravel Project Base - OACP Team

## About the project

A simple and clean boilerplate to start a new SPA project with authentication, user, roles, permissions management and more features. This boilerplate uses the following tools:

[![](https://img.shields.io/badge/vue.js-v3.5-04C690.svg)](https://vuejs.org)
[![](https://img.shields.io/badge/Laravel-v11.x-ff2e21.svg)](https://laravel.com)
[![](https://img.shields.io/badge/bootstrap-v5.3-712cf9.svg)](https://getbootstrap.com)
[![](https://img.shields.io/badge/axios-v1.7-5A29E4.svg)](https://axios-http.com)
[![](https://img.shields.io/badge/vite-v5.0-646cff.svg)](https://vitejs.dev)

- [Laravel 11.x](https://github.com/laravel/laravel)
- [Laravel Sanctum](https://laravel.com/docs/11.x/sanctum)
- [Vue 3](https://github.com/vuejs/vue)
- [Vue Router](https://router.vuejs.org/)
- [Pinia](https://pinia.vuejs.org/)
- [Bootstrap](https://getbootstrap.com/)
- [Vue I18n](https://vue-i18n.intlify.dev)
- [Laravel Request Docs](https://github.com/rakutentech/laravel-request-docs)

## Environment

- PHP 8.3.0
- Laravel 11.x
- Node 18
- MySQL 8

## Demo

## Features

The following Sanctum features are implemented in this Vue SPA:

- ✅ Login
- ✅ Password Reset
- ✅ Registration
- ✅ Admin Panel
- ✅ Profile Management
- ✅ User Management
- ✅ Roles Management
- ✅ Permissions Management
- ✅ Password Change
- ✅ E-Mail Verification
- ✅ Posts Management
- ✅ Frontend Blog
- ✅ Automatic Api Documentation -- route /api-docs

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

Follow this file:
[Rules](https://gitlab.com/tuananh.pham3/base-php-laravel/-/blob/main/docs/policy.md)

### HTTP Status Codes in API

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

## API documents

View in the browser on /request-docs/
https://github.com/rakutentech/laravel-request-docs?tab=readme-ov-file
