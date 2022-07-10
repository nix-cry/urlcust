<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%urlget}}`.
 */
class m220708_124708_create_urlget_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('urlget', 'diff_time', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%urlget}}');
    }
}
