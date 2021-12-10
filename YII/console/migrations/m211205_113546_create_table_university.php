<?php

use yii\db\Migration;

/**
 * Class m211205_113546_create_table_university
 */
class m211205_113546_create_table_university extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table = 'CREATE TABLE University (id INT(11) AUTO_INCREMENT PRIMARY KEY,name VARCHAR(255),count_of_students int(11),count_of_teachers int(11));';
        Yii::$app->db->CreateCommand($table)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $table = 'DROP TABLE University;';
        Yii::$app->db->CreateCommand($table)->execute();
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211205_113546_create_table_university cannot be reverted.\n";

        return false;
    }
    */
}
