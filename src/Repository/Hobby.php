<?php
class Hobby
{
    public static function getAll(int $limit = 10, int $offset = 0)
    {
        try {
            $db = Db::getConnection();
            $query = "SELECT hobby.id, hobby.name from hobby  LIMIT :offset, :limit";
            $stmt = $db->prepare($query);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
            $stmt->execute();
            return  $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $error) {
            throw new Exception($error->getMessage(), 500);
        }
    }
}
