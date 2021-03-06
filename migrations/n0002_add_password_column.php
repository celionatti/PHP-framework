<?php

use nattiframework\core\Application;

/**User: Celio Natti ** */

/**
 * class n0002_add_password_column
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 */

class n0002_add_password_column
{
    public function up()
    {
        $db = Application::$app->db;
        $db->pdo->exec("ALTER TABLE users ADD COLUMN password VARCHAR(512) NOT NULL");
    }

    public function down()
    {
        $db = Application::$app->db;
        $db->pdo->exec("ALTER TABLE users DROP COLUMN password");
    }
}
