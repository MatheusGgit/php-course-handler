<?php
class CursoDAO
{
    /**
     * Seleciona informções do curso informado
     * @param int $id
     * @return array
     */
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

    /**
     * Busca todos os registros no banco de dados
     * @return array
     */
    public function SELECT_ALL(): array
    {
        global $PDO;
        try {
            $stmt = $PDO->prepare("SELECT * FROM cursos");
            $stmt->execute();
            return $stmt->fetchAll();
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

    public function UPDATE(string $nome, string $link, int $id): bool
    {
        try {
            global $PDO;
            $stmt = $PDO->prepare("UPDATE cursos SET nome = :nome, link = :link WHERE id=:id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":link", $link);
            $stmt->execute();

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
