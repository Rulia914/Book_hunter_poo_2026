<?php

namespace App\Models;

use \Core\DB;
use \PDO;

abstract class BooksManager
{
    public static function findAll(int $limit = 9): array
    {
        $sql = "SELECT b.*, ROUND(AVG(us.note), 2) AS notation
                FROM books b
                LEFT JOIN users_notations us ON us.book_id = b.id
                GROUP BY b.id
                ORDER BY notation DESC
                LIMIT :limit;";

        //$rs = $connexion->prepare($sql);
        $rs = DB::getConnexion()->prepare($sql);
        $rs->bindValue(':limit', $limit, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_CLASS, Book::class); //pour hydratation
    }

    public static function findAllByAuthorId(int $id): array
    {
        $sql = "SELECT b.*
                FROM books b
                WHERE author_id=:id
                ORDER BY created_at DESC;";

        //$rs = $connexion->prepare($sql);
        $rs = DB::getConnexion()->prepare($sql);
        $rs->bindValue(':id', $id, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_CLASS, Book::class); //pour hydratation
    }
}
