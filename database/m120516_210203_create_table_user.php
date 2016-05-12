<?php

use yii\db\Migration;

class m120516_210203_create_table_user extends Migration {
    
    public $tableName = '{{%tbl_user}}';
    
    public function up() {
        
        $tableOptions = null;
        
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);
        
        $this->insert($this->tableName, [ 
            'id' => 1, 
            'username' => 'admin', 
            'auth_key' => 'hrabwA7XmYwLyZarnxXM76zoduIGCtfQ', 
            'password_hash' => '$2y$13$Jg3E26kxJJj7fo/YZ4ZzbeNiDn1rEUHnKuSau9ATDMuK3L1j3yBNO', // admin59@drivesource.co 
            'password_reset_token' => null, 
            'email' => 'admin@gmail.com', 
            'status' => '10', 
            'created_at' => time(), 
            'updated_at' => time(), 
        ]);
        
    }

    public function down(){
        $this->dropTable($this->tableName);
    }
    
}