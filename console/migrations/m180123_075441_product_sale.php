<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m180123_075441_product_sort
 */
class m180123_075441_product_sale extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}', 'new_price', Schema::TYPE_INTEGER);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171225_064657_product_sort cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171225_064657_product_sort cannot be reverted.\n";

        return false;
    }
    */
}
