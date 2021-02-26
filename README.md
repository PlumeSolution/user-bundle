# user-bundle

[![Latest Stable Version](https://poser.pugx.org/plume-solution/user-bundle/v)](//packagist.org/packages/plume-solution/user-bundle)
[![Build Status](https://travis-ci.com/PlumeSolution/user-bundle.svg?branch=master)](https://travis-ci.com/PlumeSolution/user-bundle)
[![Maintainability](https://api.codeclimate.com/v1/badges/d20bbb487f681bbc6c6e/maintainability)](https://codeclimate.com/github/PlumeSolution/user-bundle/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/d20bbb487f681bbc6c6e/test_coverage)](https://codeclimate.com/github/PlumeSolution/user-bundle/test_coverage)
[![Total Downloads](https://poser.pugx.org/plume-solution/user-bundle/downloads)](//packagist.org/packages/plume-solution/user-bundle)
[![License](https://poser.pugx.org/plume-solution/user-bundle/license)](//packagist.org/packages/plume-solution/user-bundle)

A new simple bundle for easy user management
____________________________________________

Instalation
===========

Before all, make sure you have php 7.4 or 8.0 and Symfony 4.4 or 5.x (kernel 5.1.5 for security issue with 5.x version).

You can easily install this with composer like:

`composer require plume-solution/user-bundle`
_____________________________________________

Usage
=====

### User entity

Create an entity (or use existent) that extend `PlumeSolution\UserBundle\Models\BaseUser`.

After that, you can choice a Trait for adding some basic field to your user.

Disposable Trait:
- EmailAndNicknamePasswordTrait : Support user that have Email and username (called nickname)
- EmailPasswordTrait : For user that log without nickname (the username is the email, you can add the NicknameTrait for add a nickname not used in login system.).
- NicknamePasswordTrait : For user that log with username and without usage of email.

For the login usage, see the Login section.

Probably more features in the future :smile:

### User Manipulation

For user manipulation, you can use the `PlumeSolution\UserBundle\Manager\UserManager` Service.

Is auto-wire, just inject in Controller action or service constructor.

After is injected, you can consult PHP Doc for usage (so basic :smile: ).

### User Login

The bundle provides a controller you can 'extends' in your app code

Just create a class that use the `PlumeSolution\UserBundle\Controllers`.

The controller is built with override in mind, you have multiple internal action you can customize
:
- `__invoke(Request $request)` : This method is the action called by Router, you have to override with parent call for usage of annotation.
- `redirectIfAlreadyLogged()` : This is used for redirect user on a route if already fully authenticated.
- `getLoginForm()` : Used to build the LoginForm, by default it use `PlumeSolution\UserBundle\Form\LoginType` with the minimum for a login.
- `renderTemplate(FormInterface $form)` : Used for render template with form.

### User Login Configuration

use this example for security.yaml and adapt if you need :

```yaml
security:
    encoders:
        App\Entity\User:
          algorithm: auto
    # https://symfony.com/doc/current/security.html#where-do-users-come-from-user-providers
    providers:
        users:
            entity:
                # the class of the entity that represents users
                class: 'App\Entity\User'
                # the property to query by - e.g. username, email, etc
                property: 'nickname'
    firewalls:
        dev:
            pattern: ^/(_(profiler|wdt)|css|images|js)/
            security: false
        main:
            anonymous: ~
            form_login:
                login_path: login
                check_path: login
                default_target_path: index
                failure_path: login
                always_use_default_target_path: true
                username_parameter: "login[username]"
                password_parameter: "login[password]"
            remember_me:
                secret:   '%kernel.secret%'
                lifetime: 604800 # 1 week in seconds
                path:     login
                remember_me_parameter: 'login[remember]'
```
_______________________________________________________________________
Support
=======

Thanks for using our job ! :smile:

Don't hesitate to open issue or PR if you want to contribute with code and/or idea !
