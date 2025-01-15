<?php

namespace Core\Data;


class Migration
{
    public function __construct()
    {
        Database::getConnection();
    }

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
        Database::$instance->query(file_get_contents($pathFile));
        Database::$instance->query('INSERT INTO migrations (migration, batch) VALUES (?,?)', [$filename, $batch]);

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

            $doneMigration = Database::$instance->query('SELECT * FROM migrations WHERE migration = ?', [$file])->getOne();

            if (!$doneMigration) $this->postMigration($file, $batch);
        }

        echo 'The migration process is completed successfully' . PHP_EOL;
    }


    /**
     * The function rolls back the migrations of the given group
     * and deletes these entries from the migration table
     * @param int $batch - migration group number
     * @return void
     */
    public function rollback(int $batch): void
    {
        $rollbackMigrations = Database::$instance->query('SELECT migration FROM migrations
                 WHERE batch = ? ORDER BY id DESC', [$batch])->getColumn();

        foreach ($rollbackMigrations as $rollbackMigration) {

            try {
                $pathFile = MIGRATION_DIR_DOWN . '/' . $rollbackMigration;

                Database::$instance->query(file_get_contents($pathFile));
                Database::$instance->query('DELETE FROM migrations WHERE migration = ?', [$rollbackMigration]);

                echo 'Migration rollback is done:' . $rollbackMigration . PHP_EOL;

            } catch (\Exception $e) {
                echo 'Migration rollback failed: ' . $rollbackMigration . 'Response: ' . $e->getMessage() . PHP_EOL;
            }
        }

        echo 'Rollback of migration group №' . $batch . ' completed' . PHP_EOL;
    }
}