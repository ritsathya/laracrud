<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Description

Laracrud is a simple application that allows users to perform crud (create, read, update and delete) operation on Category and Post.

## Getting Started

First you need to have Docker Compose installed on your system.

On Linux (or Mac or WSL2), put the following alias in your .bashrc or .zshrc file (located in home directory):

```shell
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

Next, you need to clone this repo and change into the project directory:

```shell
# Clone the project into local machine

git clone https://github.com/ritsathya/laracrud.git

# Change into project directory

cd laracrud
```

Install Composer dependencies for the application by running the following command:

```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

Lastly, you need to config `.env`

```shell
cp .env.example .env

# open .env in your favorite code editor (e.g. VS Code), 
# and start configure DB_USER, DB_PASSWORD, and other necessary
# configuration
code .env
```



To start the project, run the sail as the following:

```shell
sail up

# To run sail command in detatch mode
sail up -d
```

To stop the project, simply run:

```shell
sail stop
```

Full document on how to use sail command: [Laravel Sail - Laravel - The PHP Framework For Web Artisans](https://laravel.com/docs/9.x/sail)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
