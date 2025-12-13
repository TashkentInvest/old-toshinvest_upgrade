<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImportOldDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->info('Importing data from SQL dump...');

        // Disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $sqlFile = base_path('tashken4_old_toshinvest.sql');
        
        if (!file_exists($sqlFile)) {
            $this->command->error("SQL file not found at: $sqlFile");
            return;
        }

        $this->command->info('Reading SQL file...');
        
        // Read the entire SQL file
        $sql = file_get_contents($sqlFile);
        
        // Remove comments and split into statements
        $sql = preg_replace('/^--.*$/m', '', $sql);
        $sql = preg_replace('/^\/\*.*?\*\//ms', '', $sql);
        
        // Split by semicolon (only outside of quotes)
        $statements = $this->splitSqlStatements($sql);
        
        $this->command->info('Executing SQL statements...');
        
        $count = 0;
        foreach ($statements as $statement) {
            $statement = trim($statement);
            if (empty($statement)) {
                continue;
            }
            
            try {
                // Skip DROP and CREATE DATABASE statements
                if (stripos($statement, 'DROP DATABASE') === 0 || 
                    stripos($statement, 'CREATE DATABASE') === 0 ||
                    stripos($statement, 'USE ') === 0) {
                    continue;
                }
                
                DB::unprepared($statement);
                $count++;
                
                if ($count % 100 === 0) {
                    $this->command->info("Executed $count statements...");
                }
            } catch (\Exception $e) {
                // Log the error but continue
                $this->command->warn('Error executing statement: ' . substr($statement, 0, 100));
                $this->command->warn('Error: ' . $e->getMessage());
            }
        }

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $this->command->info("Data imported successfully! Executed $count statements.");
    }
    
    private function splitSqlStatements($sql)
    {
        $statements = [];
        $buffer = '';
        $inString = false;
        $stringChar = '';
        
        for ($i = 0; $i < strlen($sql); $i++) {
            $char = $sql[$i];
            
            if (!$inString && ($char === '"' || $char === "'")) {
                $inString = true;
                $stringChar = $char;
            } elseif ($inString && $char === $stringChar && ($i === 0 || $sql[$i - 1] !== '\\')) {
                $inString = false;
            } elseif (!$inString && $char === ';') {
                $statements[] = $buffer;
                $buffer = '';
                continue;
            }
            
            $buffer .= $char;
        }
        
        if (!empty(trim($buffer))) {
            $statements[] = $buffer;
        }
        
        return $statements;
    }
}
