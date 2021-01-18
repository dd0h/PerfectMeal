<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository
{

    public function getUserByUsernameOrEmail(string $login): ?User
    {
        $stmt = $this->connection->prepare('
            SELECT * FROM public.users WHERE email = :login or username = :login
        ');
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['id'],
            $user['username'],
            $user['email'],
            $user['password']
        );
    }

    public function getUserById(int $id): ?User
    {
        $stmt = $this->connection->prepare('
            SELECT * FROM public.users WHERE id = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['id'],
            $user['username'],
            $user['email'],
            $user['password']
        );
    }

    public function addUser(User $user)
    {
        $stmt = $this->connection->prepare('
            INSERT INTO users (email, password, username)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user->getEmail(),
            $user->getPassword(),
            $user->getUsername()
        ]);
    }
}