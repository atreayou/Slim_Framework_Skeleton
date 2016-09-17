<?php

class UserEntity
{
    protected $firstName;
    protected $lastName;
    protected $email;
    protected $address;
    protected $rowDate;

    public function __construct(array $data)
    {
        $this->firstName = $data['FIRST_NAME'];
        $this->lastName = $data['LAST_NAME'];
        $this->email = $data['EMAIL'];
        if(isset($data['ADDRESS']))
        {
            $this->address = $data['ADDRESS'];
        }
        $this->rowDate = $data['ROW_DATE'];
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getRowDate()
    {
        return $this->rowDate;
    }

    public function getArray()
    {
        return array('First_Name' => $this->getFirstName(), 'Last_Name' => $this->getLastName(), 'Email' => $this->getEmail(), 'Address' => $this->getAddress(), 'Member_Since' => $this->getRowDate());
    }
}
?>