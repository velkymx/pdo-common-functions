<?php

$conn = array(
  'host' => '',
  'database' => '',
  'login' => '',
  'password' => '',  
  );

function db_conn($conn)
    {

        $dbconf = new DATABASE_CONFIG();

        $db = false;

        // Connect to the DB

        try {

            return new PDO("mysql:host={$conn['host']};dbname={$conn['database']};charset=utf8mb4", $conn['login'], $conn['password']);
        } catch (PDOException $e) {

            return $e;
        }
    }

    function db_get($sql, $keyvalues = array(),$conn)
    {

        $db = db_conn($conn);

        try {

            $stmt = $db->prepare($sql);

            $stmt->execute($keyvalues);

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return $e;
        }
    }

    function db_set($sql, $keyvalues = array(),$conn)
    {

        $db = db_conn($conn);

        try {

            $stmt = $db->prepare($sql);

            return $stmt->execute($keyvalues);
        } catch (PDOException $e) {
            return $e;
        }
    }
