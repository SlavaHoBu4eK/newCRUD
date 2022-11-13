<?php

class CommentRepository
{
    private PDO $connection;

    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    public function findAll(int $id): array
    {
        try {
            $sql = $this->connection->prepare("SELECT * FROM comments WHERE client_id = :client_id  AND deleted_at IS NULL");
            $sql->execute(['client_id' => $id]);
            $sql->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Comment::class); //Чтобы указать PDO вызывать конструктор перед присвоением значений столбца свойствам объекта, комбинируем флаг PDO
            return $sql->fetchall();
        } catch (PDOException $error) {
            #ignore
        }
        return [];
    }


    public function create(Comment $comment): bool
    {
        try {
            return $this->connection
                ->prepare("INSERT INTO comments (body, client_id) VALUES (?,?)")
                ->execute([
                    $comment->getBody(),
                    $comment->getClientId()
                ]);
        } catch (PDOException $error) {
            #ignore
            return false;
        }
    }
}