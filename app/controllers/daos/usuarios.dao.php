<?php
class UsuarioDAO
{
    /**
     * Busca as informações do usuário no banco de dados
     * @param int $id id do usuário
     * @return array
     */
    public function SELECT(int $id): array
    {
        try {
            global $PDO;
            $stmt = $PDO->prepare("SELECT * FROM usuarios WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    /**
     * Busca todos os registros no banco de dados
     * @return array
     */
    public function SELECT_ALL() : array
    {
        global $PDO;
        try {
            $stmt = $PDO->prepare("SELECT * FROM usuarios");
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    /**
     * Insere um novo usuário no banco de dados
     * @param string $nome
     * @param string $senha
     * @return bool
     */
    public function INSERT(string $nome, string $senha): bool
    {
        try {
            global $PDO;
            $stmt = $PDO->prepare("INSERT INTO usuarios (nome, senha) VALUES (:nome, :senha)");
            $stmt->bindParam(":nome", $nome);
            $stmt->bindValue(":senha", $this->GenerateHashCode($senha));
            $stmt->execute();
            return true;
        } catch (Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    /**
     * Atualiza informçãoes do usuário no banco de dados
     * @param string $nome
     * @param string $senha
     * @param int $id
     * @return bool
     */
    public function UPDATE(string $nome, string $senha, int $id): bool
    {
        try {
            global $PDO;
            $stmt = $PDO->prepare("UPDATE usuarios SET nome = :nome, senha=:senha WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":nome", $nome);
            $stmt->bindValue(":senha", $this->GenerateHashCode($senha));
            $stmt->execute();
            return true;
        } catch (Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    /**
     * Exclui registro do banco de dados
     * @param int $id
     * @return bool
     */
    public function DELETE(int $id): bool
    {
        try {
            global $PDO;
            $stmt = $PDO->prepare("DELETE FROM usuarios WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            return true;
        } catch (Throwable $th) {
            throw new Exception($th->getMessage());
        }
    }

    /**
     * Encripta Senha de usuário
     * @param string $senha senha para ser encriptada
     * @return string
     */
    private function GenerateHashCode(string $senha): string
    {
        // todo
        return $senha;
    }

    /**
     * Decripta a SENHA do usuário
     * @param string $senha
     * @return string
     */
    private function DecryptPassword(string $senha): string
    {
        //todo
        return $senha;
    }
}
