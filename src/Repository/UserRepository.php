<?php

namespace App\Repository;

use App\Models\User;
use PDO;

class UserRepository extends BaseRepository
{
    public function getUserByEmail(string $email): ?User {
        $sql = 'SELECT * FROM view_user_data WHERE email = :email';
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
            $user['surname'],
            $user['id'],
            $user['id_role']
        );
    }

    public function addUserDetails(User $user): void
    {
        $sql = 'INSERT INTO user_details (name, surname) VALUES (?, ?)';
        $db = $this->getPdo()->prepare($sql);
        $db->execute([
            $user->getName(),
            $user->getSurname(),
        ]);
    }

    public function addUser(User $user): void
    {
        $sql = 'INSERT INTO users (id_user_details, email, password) VALUES (?, ?, ?);';
        $db = $this->getPdo()->prepare($sql);
        $db->execute([
            $user->getUserDetails(),
            $user->getEmail(),
            $user->getPassword(),
        ]);
    }

    public function addUserDetailsLastInsertedId(User $user): void
    {
        $sql = "SELECT currval('user_details_id_seq');";
        $userDetailsId = $this->getPdo()->query($sql)->fetch(PDO::FETCH_ASSOC);
        $user->setUserDetails($userDetailsId['currval']);
    }
}