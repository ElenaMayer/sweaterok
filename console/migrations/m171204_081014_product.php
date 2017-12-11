<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m171204_081014_product
 */
class m171204_081014_product extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->addColumn('{{%product}}', 'article',Schema::TYPE_STRING);
        $this->addColumn('{{%product}}', 'sex',Schema::TYPE_STRING);
        $this->addColumn('{{%product}}', 'is_in_stock',Schema::TYPE_BOOLEAN);
        $this->addColumn('{{%product}}', 'is_active',Schema::TYPE_BOOLEAN);
        $this->addColumn('{{%product}}', 'is_novelty',Schema::TYPE_BOOLEAN);
        $this->addColumn('{{%product}}', 'color',Schema::TYPE_STRING);
        $this->addColumn('{{%product}}', 'structure',Schema::TYPE_STRING);
        $this->addColumn('{{%product}}', 'time',Schema::TYPE_TIMESTAMP. ' NOT NULL DEFAULT NOW()');

        $this->addColumn('{{%category}}', 'is_active',Schema::TYPE_BOOLEAN);
        $this->addColumn('{{%category}}', 'description',Schema::TYPE_STRING);
        $this->addColumn('{{%category}}', 'image',Schema::TYPE_STRING);
        $this->addColumn('{{%category}}', 'time',Schema::TYPE_TIMESTAMP. ' NOT NULL DEFAULT NOW()');

        $this->addColumn('{{%order}}', 'fio',Schema::TYPE_STRING);

        $this->createTable('{{%product_sizes}}', [
            'id' => Schema::TYPE_PK,
            'product_id' => Schema::TYPE_INTEGER,
            'size' => Schema::TYPE_INTEGER,
            'count' => Schema::TYPE_INTEGER,
        ], $tableOptions);

        $this->addForeignKey('fk-product_sizes-product_id-product-id', '{{%product_sizes}}', 'product_id', '{{%product}}', 'id', 'CASCADE');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m171204_081014_product cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171204_081014_product cannot be reverted.\n";

        return false;
    }
    */
}
