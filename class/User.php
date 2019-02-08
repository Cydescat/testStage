<?php
/**
 * Created by PhpStorm.
 * User: Caryl
 * Date: 28/07/2018
 * Time: 04:42
 */

class User
{
    private $id;
    private $firstName;
    private $lastName;

    public function __construct($values)
    {
        if (is_array($values))
            $this->hydrate($values);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     */
    public function setFirstName($firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     */
    public function setLastName($lastName): void
    {
        $this->lastName = $lastName;
    }

    private function hydrate(array $values)
    {
        if (is_array($values))
        {
            foreach($values as $key => $value)
            {
                $methodName = 'set'.ucfirst($key);
                if (method_exists($this, $methodName))
                    $this->$methodName($value);
                else if (!is_numeric($key))
                    echo "La methode $methodName n'existe pas";
            }
        }
    }
}