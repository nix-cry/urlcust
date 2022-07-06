<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%urlget}}`.
 */
class m220706_012121_create_urlget_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('urlget', 'ip', $this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%urlget}}');
    }
}
