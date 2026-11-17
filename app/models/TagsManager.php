<?php

namespace App\Models;

use \Core\DB;
use \PDO;

abstract class TagsManager
{
    public static function findAll(): array
    {
        $sql = '
            SELECT *
            FROM tags
            ORDER BY name ASC;';
        $rs = DB::getConnexion()->prepare($sql);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_CLASS, Tag::class);
    }

    public static function findAllByBookId(int $id): array
    {
        $sql = '
            SELECT t.*
            FROM tags t
            INNER JOIN books_has_tags ON books_has_tags.tag_id = t.id
            WHERE books_has_tags.book_id = :id
            ORDER BY t.name ASC;';
        $rs = DB::getConnexion()->prepare($sql);
        $rs->bindValue(':id', $id, PDO::PARAM_INT);
        $rs->execute();
        return $rs->fetchAll(PDO::FETCH_CLASS, Tag::class);
    }
}
