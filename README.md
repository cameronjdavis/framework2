# Framework2

My attempt to implement a feature-complete framework. Framework1 failed, obviously. :)

## Install

1) Clone this repo.

2) Serve `www` folder as a website.

3) View the website in your browser.

You can also run `./console`.

## Features

* Lazy-loading services. Also, controllers are services that are lazy-loaded just like any other service.

* Environment-specific config and services. E.g. Override authentication while developing.

* Routing from URI to controller and action. E.g. `/users/12` -> `UserController::viewUser()`.

* RESTful JSON-based API.

* Console entry point. E.g. `./console routes:list`.

## Constraints

* All config can be found in top-level files `config.php`, `services.php`, `routes.php`. No hidden config files.

* Do no more than route, provide access to inputs and simplify output.

* Once the route is determined from the request, all actions (e.g. authentication, sending headers, echoing content) must be triggered by the controller. This avoids the need for knowledge of hidden processes being triggered outside the chosen controller.

* No external dependencies.

* Use PHP for config/routes/services. No need for YAML etc.

* Lots of testing.

## Tests

Run tests with `phpunit`.