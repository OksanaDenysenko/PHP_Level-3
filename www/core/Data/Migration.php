<?php

namespace Core\Data;


class Migration extends Database
{
    /**
     * The function for selecting the migration process
     * @param string $functionName - a name of a function in class Migration
     * @param int $batch - migration group number
     * @return void
     */
    public function migration(string $functionName, int $batch): void
    {
        if (!method_exists($this, $functionName)) {
            echo "Function not found: $functionName";
        }

        $this->$functionName($batch);
    }

    /**
     * The function performs the migration and makes a record about it in the migrations table
     * @param string $filename - a name of a sql file
     * @param int $batch - migration group number
     * @return void
     */
    private function postMigration(string $filename, int $batch): void
    {
        $pathFile = MIGRATION_DIR_UP . '/' . $filename;
        $this->query(file_get_contents($pathFile));
        $this->query('INSERT INTO migrations (migration, batch) VALUES (?,?)', [$filename, $batch]);

        echo 'Migration completed: ' . $filename . PHP_EOL;
    }


    /**
     *The function starts the migration process and checks which migrations have not yet been performed
     * @param int $batch - migration group number
     * @return void
     */
    public function run(int $batch): void
    {
        $migrations = scandir(MIGRATION_DIR_UP);

        foreach ($migrations as $file) {
            if ($file === '.' || $file === '..') continue; // Skipping hidden directories

            $db = Database::getInstance();

            $doneMigration = $db->query('SELECT * FROM migrations WHERE migration = ?', [$file])->getOne();

            if (!$doneMigration) $this->postMigration($file, $batch);
        }

        echo 'The migration process is completed successfully' . PHP_EOL;
    }


    /**
     * The function executes an SQL query to roll back the migration and delete it from the table migrations
     * @param string $filename - a name of a sql file
     * @return void
     */
    private function deleteMigration(string $filename): void
    {
        $pathFile = MIGRATION_DIR_DOWN . '/' . $filename;

        $this->query(file_get_contents($pathFile));
        $this->query('DELETE FROM migrations WHERE migration = ?', [$filename]);
    }

    /**
     * The function starts the migration rollback process of the given group
     * @param int $batch - migration group number
     * @return void
     */
    public function rollback(int $batch): void
    {
        $db = Database::getInstance();
        $rollbackMigrations = $db->query('SELECT migration FROM migrations
                 WHERE batch = ? ORDER BY id DESC', [$batch])->getColumn();

        foreach ($rollbackMigrations as $rollbackMigration) {

            try {
                $this->deleteMigration($rollbackMigration);

                echo 'Migration rollback is done:' . $rollbackMigration . PHP_EOL;

            } catch (\Exception $e) {
                echo 'Migration rollback failed: ' . $rollbackMigration . 'Response: ' . $e->getMessage() . PHP_EOL;
            }
        }

        echo 'Rollback of migration group №' . $batch . ' completed' . PHP_EOL;
    }
}