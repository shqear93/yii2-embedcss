thanks for [mitrii/yii2-embedjs](https://github.com/mitrii/yii2-embedjs.git)

Yii2 embed Css
=============
Embed Css with IDE checking or intellisense

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist shqear/yii2-embedcss "*"
```

or add

```
"shqear/yii2-embedcss": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php \shqear\widgets\EmbedCss::begin(); ?>
<style type="text/css">
    html { background: red; }
</style>
<?php \shqear\widgets\EmbedCss::end(); ?>
```
Or with 'depends' option
```php
<?php \shqear\widgets\EmbedCss::begin(['depends' => '\yii\web\JqueryAsset']); ?>
<style>
    html { background: red; }
</style>
<?php \shqear\widgets\EmbedCss::end(); ?>
```
