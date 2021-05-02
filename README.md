<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Driver rides

This project is a simple DDD API to store and read rides.

##  Steps to get project running 🛠

This project is Dockerized

1. Default environment parameters can be found and updated in `.env.example` 

2. When running on the first time: to install containers and dependencies, run `make install-app`.

3. migrate & seed: to generate migrations run command `docker compose exec laravel.test php artisan migrate:fresh`. 
   Then run seeds with `docker compose exec laravel.test php artisan db:seed`.

## Running project 🚀

Docker containers auto-starts in background whe the application is installed.
To serve the app, run `make run` and app containers will start. Application is served on port 80.
To stop containers and remove containers, networks, volumes, and images created, run `make down`

## Api docs 📚

Documentation is generated with Swagger. To read endpoints docs, go to `/api/documentation` in your browser.
If you have used Docker default configuration, it will be available in [http://localhost/api/documentation](http://localhost/api/documentation).

## TODOS ⚠
- Testing

## Vulnerabilities & contributions

If you discover a security vulnerability, please send an e-mail to Sergio Martín via [sergyzen@gmail.com](mailto:sergyzen@gmail.com).
All security vulnerabilities will be promptly addressed.

## License

This software is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## About the architecture

This project has been developed following the principles of DDD & hexagonal architecture. 
This books & projects has been used as reference

- [Scaling Laravel Architecture](https://mattdoescode.com/articles/scaling-laravel-architecture-2018-11-09).
- [Domain-Driven Design in PHP](https://beta.packtpub.com/reader/book/application_development/9781787284944/2/ch02lvl1sec14).
- [Awesome Domain-Driven Design](https://github.com/heynickc/awesome-ddd).
