<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%urlget}}`.
 */
class m220710_101851_create_urlget_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('urlget', 'user_agent', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%urlget}}');
    }
}
