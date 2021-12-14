<?php

/**
 * User Repository class
 */
class User
{
      public static function getUserByEmail(string $email)
      {
            try {
                  $db = Db::getConnection();

                  $sql = 'SELECT * FROM users WHERE email = :email';

                  $result = $db->prepare($sql);
                  $result->bindParam(':email', $email, PDO::PARAM_STR);
                  $result->execute();
                  $data =   $result->fetchAll(PDO::FETCH_ASSOC);
                  if (isset($data[0])) {
                        return $data[0];
                  }
                  return false;
            } catch (PDOException $error) {
                  throw new Exception($error->getMessage(), 500);
            }
      }

      public static function create(array $credentials)
      {

            try {
                  $db = Db::getConnection();
                  $credentials['password'] = password_hash($credentials['password'], PASSWORD_DEFAULT);
                  $query = "INSERT INTO users 
                                         (username, email, hash_password, hobby, department) 
                                   VALUES
                                           (:username  ,:email, :hash_password, :hobby, :department)";
                  $sql = $db->prepare($query);
                  $sql->bindParam(':username', $credentials['username'], PDO::PARAM_STR, 50);
                  $sql->bindParam(':email', $credentials['email'], PDO::PARAM_STR);
                  $sql->bindParam(':hash_password', $credentials['password'], PDO::PARAM_STR);
                  $sql->bindParam(':hobby', $credentials['hobby'], PDO::PARAM_INT);
                  $sql->bindParam(':department', $credentials['department'], PDO::PARAM_INT);
                  $sql->execute();
                  return $db->lastInsertId();
            } catch (PDOException $error) {
                  throw new Exception($error->getMessage(), 500);
            }
      }
      /**
       * get User by id
       *
       * @param integer $id
       * @return mixed
       */
      public static function getUserById(int $id)
      {
            try {
                  $db = Db::getConnection();
                  $sql = 'SELECT users.username, users.email  FROM users
                     WHERE users.id = :id';
                  $result = $db->prepare($sql);
                  $result->bindParam(':id', $id, PDO::PARAM_INT);
                  $result->setFetchMode();
                  $result->execute();
                  return $result->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $error) {
                  throw new Exception($error->getMessage(), 500);
            }
      }


      public static function checkUser(string $name, string $email)
      {
            try {
                  $db = Db::getConnection();
                  $sql = 'SELECT users.username FROM users WHERE users.username = :username AND users.email = :email';
                  $result = $db->prepare($sql);
                  $result->bindParam(':username', $name, PDO::PARAM_STR, 50);
                  $result->bindParam(':email', $name, PDO::PARAM_STR, 50);
                  $result->setFetchMode();
                  $result->execute();
                  return $result->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $error) {
                  throw new Exception($error->getMessage(), 500);
            }
      }
}
