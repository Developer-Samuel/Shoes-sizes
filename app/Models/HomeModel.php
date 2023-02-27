<?php

class HomeModel 
{
    public $db;

    public function getAllShoes()
    {
        try
        {
            $stmt = $this->db->prepare("SELECT * FROM shoes");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e) { echo 'An error occurred: ' . $e->getMessage(); }
    }

    public function getAllSizes()
    {
        try
        {
            $stmt = $this->db->prepare("SELECT * FROM sizes");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(Exception $e) { echo 'An error occurred: ' . $e->getMessage(); }
    }


    public function AddShoes($name, $us_size)
    {
        try
        {
            $cm_size = null;
            $uk_size = null;
            $eu_size = null;

            $query = "SELECT * FROM shoes WHERE name = :name";

            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':name', $name, \PDO::PARAM_STR);
            $stmt->execute();

            if($stmt->rowCount() == 0)
            {
                $lowercase_name = strtolower($name);
                if(strpos($lowercase_name, 'nike') !== false)
                {
                    $cm_size = $us_size * 3;
                    $uk_size = $us_size * 1.12;
                    $eu_size = $us_size / 1.03;
                }
                elseif(strpos($lowercase_name, 'adidas') !== false)
                {
                    $cm_size = $us_size * 2.3;
                    $uk_size = $us_size * 1.112;
                    $eu_size = $us_size / 1.03;
                }

                $query = "INSERT INTO shoes (name, us_size, cm_size, uk_size, eu_size) VALUES (:name, :us_size, :cm_size, :uk_size, :eu_size)";
                $stmt = $this->db->prepare($query);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':us_size', $us_size, PDO::PARAM_STR);
                $stmt->bindParam(':cm_size', $cm_size, PDO::PARAM_STR);
                $stmt->bindParam(':uk_size', $uk_size, PDO::PARAM_STR);
                $stmt->bindParam(':eu_size', $eu_size, PDO::PARAM_STR);
                $stmt->execute();

                return 1;
            }
            else
            {
                return -1;
            }
        }
        catch(Exception $e) { echo 'An error occurred: ' . $e->getMessage(); }
    }
}