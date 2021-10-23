<?php

use yii\db\Migration;

/**
 * Class m211023_084803_alter_table_shelter
 */
class m211023_084803_alter_table_shelter extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('FK_shelter_animal_id', 'shelter', 'animal_id', 'animal', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211023_084803_alter_table_shelter cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211023_084803_alter_table_shelter cannot be reverted.\n";

        return false;
    }
    */
}
