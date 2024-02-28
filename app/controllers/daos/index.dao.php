<?php
class IndexDAO
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

    public function INSERT(int $id): bool
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
