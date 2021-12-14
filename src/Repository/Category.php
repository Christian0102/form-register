<?php
class Category
{

    public static function getAll(int $limit = 10, int $offset = 0)
    {
        try {

            $db = Db::getConnection();
            $query = "SELECT category.id, category.name from category  LIMIT :offset, :limit";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return  $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            throw new Exception($error->getMessage(), 500);
        }
    }
    public function insertByUserId(int $userId, array $categories)
    {
        try {
            $db = Db::getConnection();
            foreach ($categories as $category) {
                $query = "INSERT INTO user_category 
                                     (user_id, category_id) 
                               VALUES
                                     (:userId,:categoryId)";
                $sql = $db->prepare($query);
                $sql->bindParam(':userId', $userId, PDO::PARAM_INT);
                $sql->bindParam(':categoryId', $category, PDO::PARAM_STR);
                $sql->execute();
            }
        } catch (PDOException $error) {
            throw new Exception($error->getMessage(), 500);
        }
    }
}
