<?php

namespace App\Model;

use PDO;
use PDOException;

date_default_timezone_set("Asia/Kolkata");

class MyModel
{
    protected static ?PDO $conn = null;
    // private PDO $conn;

    public static function connect_db()
    {
        try {
            self::$conn = new PDO(getenv("DB_URI"), getenv("DB_USER"), getenv("DB_PWD"));
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $err) {
            die("Connection failed: " . $err->getMessage());
        }
    }

    public static function is_connected()
    {
        if (self::$conn === null) {
            self::connect_db();
        }
    }

    public static function create_blog_table(): void
    {

        self::is_connected();

        $sql = <<<END
        Create Table If NOT EXISTS Blogs(
            id INT NOT NULL AUTO_INCREMENT,
            title VARCHAR(500) NOT NULL,
            excerpt VARCHAR(500) NOT NULL, 
            body TEXT NOT NULL,
            author TINYTEXT NOT NULL,
            PRIMARY KEY (id)
        )
        END;

        self::$conn->exec($sql);
    }

    public static function create_blog(string $title, string $excerpt, string $body, string $author): bool|string
    {
        try {
            self::is_connected();
            $query = self::$conn->prepare("INSERT INTO Blogs (title, excerpt, body, author) VALUES (?, ?, ?, ?)");
            $query->execute([$title, $excerpt, $body, $author]);
            return true;
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }

    public static function get_all_blogs()
    {
        try {
            self::is_connected();
            $query = self::$conn->prepare("SELECT * FROM Blogs");
            $query->execute();
            $query->setFetchMode(PDO::FETCH_ASSOC);
            return $query->fetchAll();
        } catch (PDOException $err) {
            return $err->getMessage();
        }
    }
}

MyModel::create_blog_table();