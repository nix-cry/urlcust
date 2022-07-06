<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%addurl}}`.
 */
class m220705_165139_create_addurl_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%addurl}}', [
            'id' => $this->primaryKey(),
            'url_name' => $this->text(),
            'url_new_name' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%addurl}}');
    }
}
