<?php
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
                'id_usuario INTEGER',
                'FOREIGN KEY (id_usuario) REFERENCES usuarios(id)'
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
            $sql = "SELECT name FROM sqlite_master WHERE type='table' AND name IN ($tabelas_sql)";
            $stmt = $this->PDO->prepare($sql);
            $stmt->execute();
            if ($stmt->rowCount() <= 0) {
                throw new Exception('create_table');
            }
        } catch (Throwable $th) {
            foreach ($tabelas as $key => $value) {
                $sql = 'CREATE TABLE IF NOT EXISTS ' . $key . '(';

                $lastKey = end(array_keys($value));
                foreach ($value as $colunaKey => $coluna) {
                    $sql .= $coluna;
                    if ($colunaKey !== $lastKey) {
                        $sql .= ',';
                    }
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

    public function ShowBootstrapAlert(string $class, string $message){
        return '<div class="alert alert-'.$class.'" role="alert">'.$message.'</div>';;
    }
}
