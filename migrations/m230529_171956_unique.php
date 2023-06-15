<?php

use yii\db\Migration;

/**
 * Class m230529_171956_unique
 */
class m230529_171956_unique extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $this->alterColumn('usuario', 'Login', 'string unique');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->alterColumn('usuario', 'Login', 'string');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230529_171956_unique cannot be reverted.\n";

        return false;
    }
    */
}
