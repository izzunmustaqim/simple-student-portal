<?php

use yii\db\Migration;

class m170803_011801_init_db extends Migration
{
    public function safeUp()
    {
        $this->createTable('student', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'lecturer_id' => $this->integer()->notNull()
        ]);

        $this->createTable('lecturer', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

        $this->createTable('task', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'due' => $this->dateTime()->notNull(),
            'limit' => $this->integer()->notNull()->defaultValue(3),
            'lecturer_id' => $this->integer()->notNull()
        ]);

        $this->createTable('document', [
            'id' => $this->primaryKey(),
            'path' => $this->string()->notNull(),
            'due' => $this->dateTime()->notNull(),
            'limit' => $this->integer()->notNull()->defaultValue(3),
            'lecturer_id' => $this->integer()->notNull()
        ]);

    }

    public function safeDown()
    {
        echo "m170803_011801_init_db cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170803_011801_init_db cannot be reverted.\n";

        return false;
    }
    */
}
