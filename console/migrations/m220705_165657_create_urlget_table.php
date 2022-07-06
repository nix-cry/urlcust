<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%urlget}}`.
 */
class m220705_165657_create_urlget_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%urlget}}', [
            'id' => $this->primaryKey(),
            'url_name' => $this->text(),
            'date' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%urlget}}');
    }
}
