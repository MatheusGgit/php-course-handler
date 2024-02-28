<?php
require_once 'controller.php';
class IndexController
{
    private PDO $PDO;
    public function __construct()
    {
        global $PDO;
        $this->PDO = $PDO;
        $this->VerificaTabelas([
            'usuarios' => [
                'id INTEGER PRIMARY KEY AUTOINCREMENT',
                'nome TEXT',
                'senha TEXT'
            ],
            'cursos' => [
                'id INTEGER PRIMARY KEY AUTOINCREMENT',
                'nome TEXT',
                'link TEXT',
                'id_usuario INTEGER FOREIGN KEY (id) REFERENCES usuarios(id)'
            ]
        ]);
    }

    /**
     * Verifica se a tabela ou tabelas existem no banco de dados, se não existe, a tabela é criada (vázia)
     * @param array|string $table nome da tabela ou tabelas
     * @return void
     */
    public function VerificaTabelas(array|string $tabelas): void
    {
        try {
            $tabelas_sql = '';
            $this->VerificaArquivoDB();
            foreach ($tabelas as $key => $value) {
                $tabelas_sql .= "'" . $key . "'";
                if ($key !== array_key_last($tabelas)) {
                    $tabelas_sql .= ',';
                }
            }
            $stmt = $this->PDO->prepare("SELECT name FROM sqlite_master WHERE type='table' AND name IN ({$tabelas_sql})");
            $stmt->execute();
        } catch (Throwable $th) {
            foreach ($tabelas as $key => $value) {
                $sql = 'CREATE TABLE IF NOT EXISTS ' . $key . '(';
                foreach ($value as $coluna) {
                    $sql .= $coluna . ';';
                }
                $sql .= ')';
                $stmt = $this->PDO->prepare($sql);
                $stmt->execute();
            }
        }
    }

    /**
     * Verifica se o arquivo de banco de dados existe, se não cria
     * @return void
     */
    private function VerificaArquivoDB(): void
    {
        if (!file_exists(__DIR__ . '/../database/banco_de_dados.db')) {
            file_put_contents(__DIR__ . '/../database/banco_de_dados.db', '');
        }
    }
}
