<?php

namespace App\Repository;

use App\Models\User;
use PDO;

class UserRepository extends BaseRepository
{
    public function getUserByEmail(string $email): ?User {
        $sql = 'SELECT * FROM users WHERE email = :email';
        $db = $this->getPdo()->prepare($sql);
        $db->bindValue(':email', $email);
        $db->execute();

        $user = $db->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            return null;
        }

        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
    }
}