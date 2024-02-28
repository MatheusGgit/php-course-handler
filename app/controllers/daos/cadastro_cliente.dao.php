<?php
class ClienteDAO
{
    public function SELECT(int $id): array
    {
        try {
            global $PDO;
            $stmt = $PDO->prepare("SELECT * FROM usuarios WHERE id = :id");
            $stmt->execute(":id", $id);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public function INSERT(string $nome, string $senha): bool
    {
        try {
            global $PDO;
            $stmt = $PDO->prepare("INSERT INTO clientes (nome, senha) VALUES (:nome, :senha)");
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":senha", $senha);
            $stmt->execute();
            return true;
        } catch (Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    public function UPDATE(int $id): bool
    {
        try {
            global $PDO;
            $stmt = $PDO->prepare("SELECT * FROM usuarios WHERE id = :id");
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
            $stmt = $PDO->prepare("DELETE FROM usuarios WHERE id = :id");
            $stmt->execute(":id", $id);
            return true;
        } catch (Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }
}
