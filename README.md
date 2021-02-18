# Send SMS
Helper class to work with Mauritius operator SMS gateway. Note that you need credentials to be able to use this package.

## Features
- Send SMS using operator API
- Get transaction reference, error code and description as response

## Installation

```bash
$ composer require aliirfaan/mu-sms-kit
```

## Basic Usage

```php
<?php

require 'vendor/autoload.php';

use  Aliirfaan\SmsKit\Sms;

// instantiate class with your credentials
$sms = new Sms('my_username', 'my_password', 'my_sender_id', 'my_api_endpoint');

// use
$message = 'Hello';
$phoneNumber = '23057777777';

$sendSms = $sms->sendSms($phoneNumber, $message);
```

### Requirements
- PHP 5.6.0 or above
- cURL