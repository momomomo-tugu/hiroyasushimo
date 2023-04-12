<?php

require_once('../../Common.php');

class Tag extends Common
{
    private function tagRegist()
    {
        // タグをDBに保存
        try {
            $pdo = $this->server();
            $stmt = $pdo->prepare('INSERT INTO tags (tag_name) SELECT * FROM (SELECT :TAG_NAME) as tmp where not exists (select * from tags where tag_name = :TAG_NAME)');
            $stmt->bindParam(':TAG_NAME', $this->tag_name);
            return $stmt->execute();
        } catch (PDOException $e) {
            var_dump($stmt);
            return false;
        }
    }

    public function set_tagRegist()
    {
        return $this->tagRegist();
    }

    private static function allTags()
    {
        // 登録されているタグをすべて検索
        $tags = [];
        try {
            $pdo = self::static_server();
            $stmt = $pdo->prepare('SELECT * FROM tags ORDER BY tag_name');
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($tags, $row);
            }
        } catch (PDOException $e) {
            var_dump($stmt);
        }
        return $tags;
    }

    public static function get_allTags()
    {
        return self::allTags();
    }

    private static function searchRelatedItem($tag_name)
    {
        // 選択されたタグ名に関連したアイテムを検索
        $tagSearch = [];
        try {
            $pdo = self::static_server();
            $target = '%' . $tag_name . '%';
            $stmt = $pdo->prepare('SELECT * FROM items WHERE tags LIKE :TAG_NAME ORDER BY title');
            $stmt->bindParam(':TAG_NAME', $target);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                array_push($tagSearch, $row);
            }
        } catch (PDOException $e) {
            var_dump($stmt);
        }
        return $tagSearch;
    }

    public static function get_searchRelatedItem($tag_name)
    {
        return self::searchRelatedItem($tag_name);
    }
}
