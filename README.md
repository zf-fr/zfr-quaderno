ZfrQuaderno
===========

[![Latest Stable Version](https://poser.pugx.org/zfr/zfr-quaderno/v/stable.png)](https://packagist.org/packages/zfr/zfr-quaderno)

ZfrQuaderno is a modern PHP library based on Guzzle for [Quaderno invoicing system](https://quadernoapp.com).

## Dependencies

* PHP 5.4+
* [Guzzle](http://www.guzzlephp.org): >= 5.0

If you are using ZF2, you can use the module that simplify its usage: [ZfrQuadernoModule](https://github.com/zf-fr/zfr-quaderno-module)

## Installation

Installation of ZfrQuaderno is only officially supported using Composer:

```sh
php composer.phar require zfr/zfr-quaderno:1.*
```

## Tutorial

> Currently, ZfrQuaderno only implements a very limited subset of the Quaderno API. It will be extended in the future.

First, you need to instantiate the Quaderno client, passing your account name and token (you can find those in your
Quaderno dashboard). A third parameter can be passed to true to enable the client in sandbox mode.

```php
$client = new QuadernoClient('account-name', 'my_token');
$client->createWebhook([
    'url'         => 'https://mylistener.com',
    'event_types' => ['invoice.created']
]);
```

### Complete reference

Here is a complete list of all methods:

CONTACT RELATED METHODS:

* array getContacts(array $args = array())
* array getContact(array $args = array())

INVOICE RELATED METHODS:

* array getInvoices(array $args = array())
* array getInvoice(array $args = array())

WEBHOOK RELATED METHODS:

* array getWebhooks(array $args = array())
* array getWebhook(array $args = array())
* array createWebhook(array $args = array())
* array updateWebhook(array $args = array())
* array deleteWebhook(array $args = array())
