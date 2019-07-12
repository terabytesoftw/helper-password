<p align="center">
    <a href="https://github.com/terabytesoftw/helper-password" target="_blank">
        <img src="https://lh3.googleusercontent.com/D9TFw1F6ddPuheDc_tpNptTdvTg-FNNpjLSBN14X6Sc-3JDiOxfE67rEh4OZfygonx1tKei2b2DEOHDLjF6T3xl8e-rkEEPZeGqLTWcS_v2cBRlyo0vcZLDHG5ivSDGIWCsenbol=w2400" height="50px;">
    </a>
    <h1 align="center">Helper Password</h1>
</p>

<p align="center">
    <a href="https://packagist.org/packages/terabytesoftw/helper-password" target="_blank">
        <img src="https://poser.pugx.org/terabytesoftw/helper-password/v/unstable.svg" alt="Unstable Version">
    </a>
    <a href="https://travis-ci.org/terabytesoftw/helper-password" target="_blank">
        <img src="https://travis-ci.org/terabytesoftw/helper-password.svg?branch=master" alt="Build Status">
    </a>  
    <a href="https://scrutinizer-ci.com/g/terabytesoftw/helper-password/" target="_blank">
        <img src="https://scrutinizer-ci.com/g/terabytesoftw/helper-password/badges/build.png?b=master" alt="Build Status">
    </a>
    <a href="https://scrutinizer-ci.com/g/terabytesoftw/helper-password/" target="_blank">
        <img src="https://scrutinizer-ci.com/g/terabytesoftw/helper-password/badges/coverage.png?b=master" alt="Build Status">
    </a>    
    <a href="https://scrutinizer-ci.com/g/terabytesoftw/helper-password/?branch=master" target="_blank">
     	<img src="https://scrutinizer-ci.com/g/terabytesoftw/helper-password/badges/quality-score.png?b=master" alt="Code Quality">
    </a>
    <a href="https://scrutinizer-ci.com/code-intelligence" target="_blank">
     	<img src="https://scrutinizer-ci.com/g/terabytesoftw/helper-password/badges/code-intelligence.svg?b=master" alt="Code Intelligence Status">
    </a>
    <a href="https://codeclimate.com/github/terabytesoftw/helper-password/maintainability" target="_blank">
        <img src="https://api.codeclimate.com/v1/badges/9bbe65b6fda1abd74c2c/maintainability" alt="Maintainability">
    </a>		
</p>

</br>

### **DIRECTORY STRUCTURE:**

```
config/             contains application configurations
src/                contains source files
tests/              contains tests codeception for the web application
vendor/             contains dependent 3rd-party packages
```

### **REQUIREMENTS:**

- The minimum requirement by this project template that your Web server supports:
    - PHP 7.2 or higher.

### **INSTALLATION:**

<p align="justify">
If you do not have <a href="http://getcomposer.org/" title="Composer" target="_blank">Composer</a>, you may install it by following the instructions at <a href="http://getcomposer.org/doc/00-intro.md#installation-nix" title="getcomposer.org" target="_blank">getcomposer.org</a>.
</p>

You can then install this extension using the following command composer:

~~~
composer require terabytesoftw/helper-password '^1.0@dev'
~~~

or add composer.json:

~~~
"terabytesoftw/helper-password":"^1.0@dev"
~~~

### **USAGE:**

~~~
<?php

use terabytesoft\helpers\Password;

// config params defaults config/helperpassword.php

    // config default 3 - ARGON2DI - PHP >= 7.3
    'helper.password.algo' => 3, // 1 BCRYPT, 2 ARGON2I, 3 ARGON2DI
    'helper.password.options' => [
        'memory_cost' => 1<<17,
        'time_cost'   => 3,
        'threads'     => 4,
    ]

    /** 
     * config 2 - ARGON2I - PHP >= 7.2
     * 'helper.password.algo' => 2, // 1 BCRYPT, 2 ARGON2I, 3 ARGON2DI
     * 'helper.password.options' => [
     * 'memory_cost' => 1<<17,
     * 'time_cost'   => 3,
     * 'threads'     => 4,
     * ]
     **/

    /**
     * config 1 - BCRYPT
     * 'helper.password.algo' => 1, // 1 BCRYPT, 2 ARGON2I, 3 ARGON2DI
     * 'helper.password.options' => [
     *   'cost' => 8,
     * ]
     **/

// generate password ramdom

$passwordrandom = $this->password->generate(8);

// generate hash:

$hash = $this->password->hash(
    $passwordrandom,
    \Yii::$app->params['helper.password.algo'],
    \Yii::$app->params['helper.password.options']
);

// validate password

$this->password->validate($passwordrandom, $hash);
~~~

### **RUN TESTS CODECEPTION:**

~~~
// download all composer dependencies root project
$ composer update --prefer-dist -vvv

// run all tests with code coverage
$ vendor/bin/codecept run unit --coverage-xml
~~~

### **WEB SERVER SUPPORT:**

- Apache.
- Nginx.
- OpenLiteSpeed.

### **DOCUMENTATION STYLE GUIDE:**

[Style CI Documentation PSR2.](https://docs.styleci.io/presets#psr2)

### **LICENCE:**

[![License](https://poser.pugx.org/terabytesoftw/helper-password/license.svg)](LICENSE.md)
[![YiiFramework](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](https://www.yiiframework.com/)
[![Total Downloads](https://poser.pugx.org/terabytesoftw/helper-password/downloads.svg)](https://packagist.org/packages/terabytesoftw/helper-password)
[![StyleCI](https://github.styleci.io/repos/195531459/shield?branch=master)](https://github.styleci.io/repos/195531459)
