<?php

namespace Core;

class Migration extends Database
{
    /**
     * The function performs the migration and makes a record about it in the migrations table
     * @param string $filename - a name of a sql file
     * @param int $batch - migration group number
     * @return void
     */
    private function completingMigration(string $filename, int $batch): void
    {
        $pathFile = MIGRATION_DIR_UP . '/' . $filename;
        $this->query(file_get_contents($pathFile));
        $this->query('INSERT INTO migrations (migration, batch) VALUES (?,?)', [$filename, $batch]);

        echo 'Migration ' . $filename . ' completed' . PHP_EOL;
    }


    /**
     *The function starts the migration process and checks which migrations have not yet been performed
     * @param int $batch - migration group number
     * @return void
     */
    public function runMigrations(int $batch): void
    {
        $migrations = scandir(MIGRATION_DIR_UP);

        foreach ($migrations as $file) {
            if ($file === '.' || $file === '..') continue; // Skipping hidden directories

            $doneMigration = (new \Core\Database())->query('SELECT * FROM migrations WHERE migration = ?', [$file])->getOne();

            if (!$doneMigration) $this->completingMigration($file, $batch);
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

        try {
            $this->query(file_get_contents($pathFile));
            $this->query('DELETE FROM migrations WHERE migration = ?', [$filename]);

            echo 'Migration rollback is done:' . $filename . PHP_EOL;

        } catch (\Exception $e) {
            echo 'Migration rollback failed: ' . $filename . 'Error: ' . $e->getMessage() . PHP_EOL;
        }
    }

    /**
     * The function starts the migration rollback process of the given group
     * @param int $batch - migration group number
     * @return void
     */
    public function rollbackMigrations(int $batch): void
    {
        $rollbackMigrations = (new \Core\Database())->query('SELECT migration FROM migrations
                 WHERE batch = ? ORDER BY id DESC', [$batch])->getColumn();

        foreach ($rollbackMigrations as $rollbackMigration) {
            $this->deleteMigration($rollbackMigration);
        }

        echo 'Rollback of migration group №' . $batch . ' completed' . PHP_EOL;
    }

}