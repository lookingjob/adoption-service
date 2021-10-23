<?php

use yii\db\Migration;

/**
 * Class m211023_082018_create_table_shelter
 */
class m211023_082018_create_table_shelter extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('shelter', [
            'id' => $this->primaryKey(),
            'animal_id' => $this->integer()->notNull(),
            'status_id' => $this->integer()->notNull(),
            'adopted_date' => $this->date()->notNull(),
            'released_date' => $this->date()->defaultValue(null),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211023_082018_create_table_shelter cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211023_082018_create_table_shelter cannot be reverted.\n";

        return false;
    }
    */
}
