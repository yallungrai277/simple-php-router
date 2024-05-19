# Description

Simple router package.

## Installation

You can install this package using

```bash
composer require json/simple-php-router
```

## Usage

Usage.

```php
Router::handle('GET', '/', 'home.php');

Router::get('/', 'home.php');

Router::get('/', function () {
    echo 'This is the home page.';
});


function homePage() {
    return 'This is the home page.';
}

Router::get('/', 'homePage');
```
