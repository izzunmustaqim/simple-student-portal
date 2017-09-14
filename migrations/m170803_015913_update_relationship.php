<?php

use yii\db\Migration;

class m170803_015913_update_relationship extends Migration
{
    public function safeUp()
    {
        $this->insert('lecturer', [
            'id' => 1,
            'name' => "ahmad"
        ]);

        $this->addForeignKey('student_id_fk', 'student', 'id', 'user', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('lecturer_id_fk', 'lecturer', 'id', 'user', 'id', 'RESTRICT', 'RESTRICT');

    }

    public function safeDown()
    {
        echo "m170803_015913_update_relationship cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170803_015913_update_relationship cannot be reverted.\n";

        return false;
    }
    */
}
