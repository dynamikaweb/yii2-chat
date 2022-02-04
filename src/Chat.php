<?php
namespace dynamikaweb\chat;

use yii\widgets\BaseListView;
use yii\helpers\Inflector;
use yii\helpers\Html;

class Chat extends BaseListView
{
    public $receive;

    public $file_messenger = '@vendor/dynamikaweb/yii2-chat/assets/messenger.html';
    public $file_message = '@vendor/dynamikaweb/yii2-chat/assets/message.html';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        ChatAsset::register($this->view);
    }
    
    public function renderItems()
    {
        $models = $this->dataProvider->getModels();
        $keys = $this->dataProvider->getKeys();
        $rows = [];

        foreach (array_values($models) as $index => $model) {
            $rows[] = $this->renderItem($model, $keys[$index], $index);
        }

        return strtr($this->view->renderFile($this->file_messenger), [
            '{{messages}}' => implode("\n", $rows)
        ]);
    }

    public function renderItem($model, $key, $index)
    {
        $receive = (object) call_user_func($this->receive, $model, $key, $index, $this);
        return strtr($this->view->renderFile($this->file_message), [
            '{{key}}' => Inflector::slug("{$receive->title}-{$key}"),
            '{{sign}}' => $receive->right? 'right': 'left',
            '{{message}}' => $receive->message,
            '{{title}}' => $receive->title,
            '{{attachment}}' => $receive->attachment ? "<strong>Anexos:</strong><br/>{$receive->attachment}" : '',
        ]);
    }
}
