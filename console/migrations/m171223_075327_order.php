<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m171223_075327_order
 */
class m171223_075327_order extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('{{%order}}', 'shipping_cost',Schema::TYPE_INTEGER);
        $this->addColumn('{{%order}}', 'city',Schema::TYPE_STRING);
        $this->addColumn('{{%order}}', 'shipping_method',Schema::TYPE_STRING);
        $this->addColumn('{{%order}}', 'shipping_point',Schema::TYPE_STRING);
        $this->addColumn('{{%order}}', 'zip',Schema::TYPE_INTEGER);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171223_075327_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171223_075327_order cannot be reverted.\n";

        return false;
    }
    */
}
