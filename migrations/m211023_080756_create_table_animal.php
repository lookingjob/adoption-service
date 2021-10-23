<?php

use yii\db\Migration;

/**
 * Class m211023_080756_create_table_animal
 */
class m211023_080756_create_table_animal extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('animal', [
            'id' => $this->primaryKey(),
            'animal_type_id' => $this->integer(255)->notNull(),
            'nickname' => $this->string(255)->notNull(),
            'age' => $this->integer(3)->notNull(),
            'description' => $this->text()->defaultValue(null),
        ]);
    
        $this->addForeignKey('FK_animal_type', 'animal', 'animal_type_id', 'animal_type', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211023_080756_create_table_animal cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211023_080756_create_table_animal cannot be reverted.\n";

        return false;
    }
    */
}
