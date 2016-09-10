<?php

class UserEntity
{
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $address;

    public function __construct(array $data)
    {
        $this->address = $data['firstname'];
        $this->address = $data['lastname'];
        $this->address = $data['email'];
        if(isset($data['address']))
        {
            $this->address = $data['address'];
        }
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->firstName;
    }

    public function getEmail()
    {
        return $this->firstName;
    }

    public function getAddress()
    {
        return $this->firstName;
    }
}
?>