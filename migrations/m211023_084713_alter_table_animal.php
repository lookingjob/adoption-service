<?php

use yii\db\Migration;

/**
 * Class m211023_084713_alter_table_animal
 */
class m211023_084713_alter_table_animal extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('FK_animal_type_id', 'animal', 'type_id', 'animal_type', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211023_084713_alter_table_animal cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211023_084713_alter_table_animal cannot be reverted.\n";

        return false;
    }
    */
}
