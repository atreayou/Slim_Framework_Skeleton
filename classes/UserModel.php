<?php
class UserModel extends Model
{
    public function getUser($userId)
    {
        $sql = 'SELECT FIRST_NAME, LAST_NAME, EMAIL, ADDRESS, ROW_DATE FROM USER_INFO WHERE ROW_ID = :userId';
        $stmt = $this->db->prepare($sql);
        $result = $stmt->execute(['userId' => $userId]);
        if($result)
        {
            return new UserEntity($stmt->fetch());
        }
    }

    public function create(UserEntity $user)
    {
        $sql = 'INSERT INTO USER_INFO (FIRST_NAME, LAST_NAME, EMAIL, ADDRESS) VALUES (:firstName, :lastName, :email, :address);';
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['firstName' => $user->getFirstName(), 'lastName' => $user->getLastName(), 'email' => $user->getEmail(), 'address' => $user->getAddress()]);
    }
}
?>