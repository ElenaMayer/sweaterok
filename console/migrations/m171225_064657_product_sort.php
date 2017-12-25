<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m171225_064657_product_sort
 */
class m171225_064657_product_sort extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->addColumn('{{%product}}', 'sort',Schema::TYPE_INTEGER);
        $this->execute('UPDATE `product` SET `sort`= id');
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
