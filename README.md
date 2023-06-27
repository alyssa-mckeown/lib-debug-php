# lib-debug v0.2.0

A PHP debug library.

## Requirements

* PHP 8.0+
* Composer

        sudo apt install php composer

## Installation

composer.json

    "require": {
        "alyssa-mckeown/lib-debug-php": "dev-main",
    },
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/alyssa-mckeown/lib-debug-php"
        },
    ]

&nbsp;

    composer install

## Example

    Debug::output(Debug::ERROR, 3, "An error occured");
