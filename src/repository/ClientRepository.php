<?php

class ClientRepository
{
    private PDO $connection;


    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }


    public function findOne(int $id): ?Client
    {
        try {
            $sql = $this->connection->prepare("SELECT * FROM client WHERE id = :client_id AND deleted_at IS NULL");
            $sql->execute(['client_id' => $id]);
            $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Client::class);
            return $sql->fetch();
        } catch (PDOException $error) {
            # ignore
        }
        return null;
    }

    /**
     * @return Client[]
     */


    public function findAll(): array
    {
        try {
            $sql = $this->connection->prepare("SELECT * FROM client WHERE deleted_at IS NULL");
            $sql->execute();
            $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Client::class);
            return $sql->fetchAll();
        } catch (PDOException $error) {
            # ignore
        }
        return [];
    }


    public function create(Client $client): bool
    {
        try {
            return $this->connection
                ->prepare("INSERT INTO client (last_name,name,middle_name,birthday,phone) VALUES (?,?,?,?,?)")
                ->execute([
                    $client->getLastName(),
                    $client->getName(),
                    $client->getMiddleName(),
                    $client->getBirthday(),
                    $client->getPhone()
                ]);
        } catch (PDOException $error) {

        }
        return false;
    }


    public function update(Client $client): bool
    {
        try {
            $statement = $this->connection->prepare("UPDATE client SET
                  last_name = ?,
                  name = ?,
                  middle_name = ?,
                  birthday = ?,
                  phone = ?
              WHERE id = ?");

            return $statement->execute([
                $client->getLastName(),
                $client->getName(),
                $client->getMiddleName(),
                $client->getBirthday(),
                $client->getPhone(),
                $client->getId()
            ]);

        } catch (PDOException $error) {
            #ignore

        }
        return false;
    }


    public function delete(int $id): bool
    {
        try {
            return $this->connection
                ->prepare("UPDATE  client SET deleted_at = :deleted_at WHERE  id = :id ")
                ->execute([
                    'id' => $id,
                    'deleted_at' => time()
                ]);
        } catch (PDOException $error) {
            # ignore
        }
        return false;
    }
}