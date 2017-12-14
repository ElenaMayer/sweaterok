<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m171213_081534_size
 */
class m171213_081534_size extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {

        $this->addColumn('{{%product}}', 'sizes',Schema::TYPE_STRING);
        $this->addColumn('{{%order_item}}', 'size',Schema::TYPE_STRING);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171213_081534_size cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171213_081534_size cannot be reverted.\n";

        return false;
    }
    */
}
