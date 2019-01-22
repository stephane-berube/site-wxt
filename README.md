Composer Project for Drupal WxT
===============================

[![Build Status][ci-badge]][ci]

Drupal WxT codebase for `Drupal WxT`.

## Requirements

* [Composer][composer]
* [Node][node]

## Docker Support via `drupal-scaffold-docker`

This project makes use of the `drupal-scaffold-docker` plugin for automatically
downloading and instantiating a Docker based Drupal infrastructure.

- [README.md][docker-scaffold-readme]
- [template/docker/README.md][docker-readme]

## OpenShift Support (s2i)

This fork is "Source to Image (s2i)" ready.  This fork can be built using the PHP 7.1 s2i builder.
[PHP 7.1 s2i](https://github.com/sclorg/s2i-php-container/tree/master/7.1)

## Maintenance

List of common commands are as follows:

| Task                                            | Composer                                               |
|-------------------------------------------------|--------------------------------------------------------|
| Latest version of a contributed project         | ```composer require drupal/PROJECT_NAME:8.*```         |
| Specific version of a contributed project       | ```composer require drupal/PROJECT_NAME:8.1.0-beta5``` |
| Updating all projects including Drupal Core     | ```composer update```                                  |
| Updating a single contributed project           | ```composer update drupal/PROJECT_NAME```              |
| Updating Drupal Core exclusively                | ```composer update drupal/core```                      |


[ci]:                       https://travis-ci.org/drupalwxt/site-wxt
[ci-badge]:                 https://travis-ci.org/drupalwxt/site-wxt.svg?branch=8.x
[composer]:                 https://getcomposer.org
[node]:                     https://nodejs.org
[docker-scaffold-readme]:   https://github.com/drupal-composer-ext/drupal-scaffold-docker/blob/master/README.md
[docker-readme]:            https://github.com/drupal-composer-ext/drupal-scaffold-docker/blob/master/template/docker/README.md
