<?php

use yii\db\Migration;

/**
 * Class m211023_090746_populate_table_animal_type
 */
class m211023_090746_populate_table_animal_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('animal_type',array(
            'name' => 'Cat',
            'description' => 'Indoor Cats',
        ));
        $this->insert('animal_type',array(
            'name' => 'Dog',
            'description' => 'Indoor Dogs',
        ));
        $this->insert('animal_type',array(
            'name' => 'Turtle',
            'description' => 'Indoor Turtles',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211023_090746_populate_table_animal_type cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211023_090746_populate_table_animal_type cannot be reverted.\n";

        return false;
    }
    */
}
