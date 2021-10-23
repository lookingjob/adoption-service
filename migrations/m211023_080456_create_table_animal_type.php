<?php

use yii\db\Migration;

/**
 * Class m211023_080456_create_table_animal_type
 */
class m211023_080456_create_table_animal_type extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('animal_type', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->notNull(),
            'description' => $this->text()->defaultValue(null),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211023_080456_create_table_animal_type cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211023_080456_create_table_animal_type cannot be reverted.\n";

        return false;
    }
    */
}
