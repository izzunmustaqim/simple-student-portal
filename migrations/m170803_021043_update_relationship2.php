<?php

use yii\db\Migration;

class m170803_021043_update_relationship2 extends Migration
{
    public function safeUp()
    {
        // STUDENT - LECTURER
        $this->createIndex('lecturer_id_idx3', 'student', 'lecturer_id');
        $this->addForeignKey('lecturer_id_fk3', 'student', 'lecturer_id', 'lecturer', 'id', 'RESTRICT', 'RESTRICT');

        // LECTURER - TASK
        $this->createIndex('lecturer_id_idx2', 'task', 'lecturer_id');
        $this->addForeignKey('lecturer_id_fk2', 'task', 'lecturer_id', 'lecturer', 'id', 'RESTRICT', 'RESTRICT');

        // FIX TASK ID
        $this->addColumn('document', 'task_id', $this->integer()->notNull());

        // TASK - DOCUMENT
        $this->createIndex('task_id_idx', 'document', 'task_id');
        $this->addForeignKey('task_id_fk', 'document', 'task_id', 'task', 'id', 'RESTRICT', 'RESTRICT');

        // FIX STUDENTID
        $this->dropColumn('document', 'lecturer_id');
        $this->addColumn('document', 'student_id', $this->integer()->notNull());

        // STUDENT - DOCUMENT
        $this->createIndex('student_id_idx3', 'document', 'student_id');
        $this->addForeignKey('student_id_fk3', 'document', 'student_id', 'student', 'id', 'RESTRICT', 'RESTRICT');

    }

    public function safeDown()
    {
        echo "m170803_021043_update_relationship2 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170803_021043_update_relationship2 cannot be reverted.\n";

        return false;
    }
    */
}
