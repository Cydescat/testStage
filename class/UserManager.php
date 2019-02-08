<?php
/**
 * Created by PhpStorm.
 * User: Caryl
 * Date: 28/07/2018
 * Time: 04:42
 */

class UserManager
{
    private $dataBase;

    public function __construct()
    {
        $this->dataBase = new PDO('mysql:host=localhost;dbname=teststage;charset=utf8', 'root', '');
    }

    public function create($fn, $ln)
    {
        $fn = ucfirst(strtolower($fn));
        $ln = strtoupper($ln);

        $req = $this->dataBase->prepare("insert into users (firstName, lastName) values (:firstName, :lastName)");
        $req->bindValue('firstName', $fn, PDO::PARAM_STR);
        $req->bindValue('lastName', $ln, PDO::PARAM_STR);
        $req->execute();
    }

    public function findBy(String $id = "", String $firstName = "", String $lastName = "")
    {
        $users = [];

        $req = $this->dataBase->prepare("select * from users 
                                                    where id LIKE :id 
                                                    AND LOWER(firstName) LIKE LOWER(:firstName) 
                                                    AND LOWER(lastName) LIKE LOWER(:lastName)");
        $req->bindValue('id', '%' . $id . '%', PDO::PARAM_INT);
        $req->bindValue('firstName', '%' . $firstName . '%', PDO::PARAM_STR);
        $req->bindValue('lastName', '%' . $lastName . '%', PDO::PARAM_STR);
        $req->execute();

        while ($result = $req->fetch())
            $users[] = new User($result);
        return $users;
    }
}