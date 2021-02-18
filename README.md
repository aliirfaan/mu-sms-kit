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

## License

The MIT License (MIT)

Copyright (c) 2020

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.