<?php

use yii\db\Migration;

/**
 * Class m240519_230517_likes
 */
class m240519_230517_likes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%likes}}', [
            'id'=> $this->bigPrimaryKey(20),
            'user_id' => $this->integer(),
            'user_ip' => $this->string(39)->notNull(),
            'entity_id' => $this->string(32)->notNull(),
            'target_id' => $this->integer()->null(),
            'is_like' => $this->tinyInteger(1)->null()->defaultValue(0),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->datetime()->defaultExpression('CURRENT_TIMESTAMP'),
        ], $tableOptions);

        $this->createIndex('idx_likes_user','{{%likes}}', ['user_id', 'user_ip'],false);
        $this->createIndex('idx_likes_condition','{{%likes}}', ['entity_id', 'target_id'],false);
        $this->createIndex('idx_likes_like','{{%likes}}', ['is_like'],false);

        // If exist module `Users` set foreign key `user_id` to `users.id`
        if(class_exists('\wdmg\users\models\Users') && isset(Yii::$app->modules['users'])) {
            $userTable = \wdmg\users\models\Users::tableName();
            $this->addForeignKey(
                'fk_likes_to_users',
                '{{%likes}}',
                'user_id',
                $userTable,
                'id',
                'NO ACTION',
                'CASCADE'
            );
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx_likes_user', '{{%likes}}');
        $this->dropIndex('idx_likes_condition', '{{%likes}}');
        $this->dropIndex('idx_likes_like', '{{%likes}}');

        if(class_exists('\wdmg\users\models\Users') && isset(Yii::$app->modules['users'])) {
            $userTable = \wdmg\users\models\Users::tableName();
            if (!(Yii::$app->db->getTableSchema($userTable, true) === null)) {
                $this->dropForeignKey(
                    'fk_likes_to_users',
                    '{{%likes}}'
                );
            }
        }

        $this->truncateTable('{{%likes}}');
        $this->dropTable('{{%likes}}');
    }

}
