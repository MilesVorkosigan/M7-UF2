<?php
require_once ("./conexions/autoload.php");

class DaoUser
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function create(User $user)
    {
        $stmt = $this->pdo->prepare("INSERT INTO usuari (alias, name, email, contrasenya, admin) VALUES (?, ?, ?, ?, ?)");
        $hash = hash('sha256', $user->getPass());
        $stmt->execute([$user->getName(), $user->getSurname(), $user->getEmail(), $hash, $user->getAdm()]);
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuari WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update(User $user,$idUser)
    {
        $stmt = $this->pdo->prepare("UPDATE usuari SET alias = ?, name = ?, email = ?, contrasenya = ?, admin = ? WHERE id = ?");
        $hash = hash('sha256', $user->getPass());
        return $stmt->execute([$user->getName(), $user->getSurname(), $user->getEmail(), $hash, $user->getAdm(), $idUser]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM usuari WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getPasswordByAlias($name)
    {
        $stmt = $this->pdo->prepare("SELECT contrasenya FROM usuari WHERE alias = ?");
        $stmt->execute([$name]);
        return $stmt->fetchColumn();
    }

    public function isAliasRegistered($alias)
    {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) FROM usuari WHERE alias = ?");
        $stmt->execute([$alias]);
        return $stmt->fetchColumn() > 0;
    }

    public function getPassbyId($id)
    {
        $stmt = $this->pdo->prepare("SELECT pass FROM usuari WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetchColumn();
    }

    public function getAllUsers()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuari");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $users = [];
        foreach ($result as $row) {
            $user = new User(
                $row['alias'],
                $row['name'],
                $row['email'],
                $row['admin'],
                $row['contrasenya']
            );
            $user->setId($row['id']);
            $users[] = $user;
        }

        return $users;
    }
    public function getUserbyName($name)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM usuari where alias=?");
        $stmt->execute([$name]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $user = new User(
            $result['alias'],
            $result['name'],
            $result['email'],
            $result['admin'],
            $result['contrasenya']
        );
        $user->setId($result['id']);
        return $user;
    }
    public function getIdByAlias($alias)
    {
        $stmt = $this->pdo->prepare("SELECT id FROM usuari WHERE alias = ?");
        $stmt->execute([$alias]);
        return $stmt->fetchColumn();
    }
}

?>