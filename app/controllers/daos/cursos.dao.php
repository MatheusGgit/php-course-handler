<?php
class CursoDAO
{
    public function SELECT(int $id): array
    {
        try {
            global $PDO;
            $stmt = $PDO->prepare("SELECT * FROM cursos WHERE id = :id");
            $stmt->execute(":id", $id);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public function INSERT(string $nome, string $link, int $id_usuario): bool
    {
        try {
            global $PDO;
            $stmt = $PDO->prepare("INSERT INTO cursos (nome, link, id_usuario) VALUES (:nome, :link, :id_usuario)");
            $stmt->execute(":nome", $nome);
            $stmt->execute(":link", $link);
            $stmt->execute(":id_usuario", $id_usuario);
            return true;
        } catch (Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public function UPDATE(int $id): bool
    {
        try {
            global $PDO;
            $stmt = $PDO->prepare("SELECT * FROM cursos WHERE id = :id");
            $stmt->execute(":id", $id);
            return true;
        } catch (Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public function DELETE(int $id): bool
    {
        try {
            global $PDO;
            $stmt = $PDO->prepare("DELETE FROM cursos WHERE id = :id");
            $stmt->execute(":id", $id);
            return true;
        } catch (Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }
}
