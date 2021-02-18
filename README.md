# Send SMS
Helper class to work with my.t SMS gateway

## Features
- Send SMS using BMP API
- Get transaction reference, error code and description as response

## Installation

### Authorizing composer using auth.json file

- Create a new file called `auth.json` in your project root directory and add the following to it.
- Replace your-github-token with your github token.
- **You should never commit this file to github. Doing so will give unauthorized users access to your github repositories if the token is compromised.**

```bash
{
    "github-oauth": {
        "github.com": "your-github-token"
    }
}
```

- Open `composer.json` file in your project and add the following code to it.

```bash
    "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/your-github-username/your-repository-name"
        }
    ]
```

### Install the latest version with

```bash
$ composer require mt/sms
```

## Basic Usage

```php
<?php

require 'vendor/autoload.php';

use  Mt\Sms\MytSms;

// instantiate class
$mytSms = new MytSms('my_username', 'my_password', 'my_sender_id');

// use
$message = 'Hello';
$phoneNumber = '23057777777';

$sendSms = $mytSms->sendSms($phoneNumber, $message);
```

### Requirements
- PHP 5.6.0 or above
- cURL