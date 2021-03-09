dynamikaweb/yii2-chat 
===========================
[![Latest Stable Version](https://img.shields.io/github/v/release/dynamikaweb/yii2-chat)](https://github.com/dynamikaweb/yii2-chat/releases)
[![Total Downloads](https://poser.pugx.org/dynamikaweb/yii2-chat/downloads)](https://packagist.org/packages/dynamikaweb/yii2-chat)
[![License](https://img.shields.io/github/license/dynamikaweb/yii2-chat)](https://github.com/dynamikaweb/yii2-chat/blob/master/LICENSE)

Installation
------------
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```SHELL
$ composer require dynamikaweb/yii2-chat "*"
```

or add

```JSON
"dynamikaweb/yii2-chat": "*"
```

to the `require` section of your `composer.json` file.

How to Use
----------
```PHP
use dynamikaweb\chat\Chat;

echo ChatView::widget([
    'dataProvider' => $dataProvider,
    'receive' => function ($model, $key, $index) {
        return [
            'right' => $index % 2,
            'title' => $model->title,
            'message' => $model->message
        ];
    }
]);
```