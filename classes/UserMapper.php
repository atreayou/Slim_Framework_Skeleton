<?php

class UserMapper extends Mapper
{
    public function getUser($userId)
    {
        $sql = 'SELECT FIRST_NAME, LAST_NAME, EMAIL, ADDRESS, ROW_DATE FROM USER_INFO WHERE ROW_ID = :userId';
    }

}
?>