<?php

namespace Mightymango\QuickDb\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableStyle;

class ListTablesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:tables {--c|columns : Show the number of columns in the table} {--i|indexes : List the indexes by name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List all tables in your connected database.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $connection = DB::connection();

        $platform = DB::getDoctrineSchemaManager()->getDatabasePlatform();
        $platform->registerDoctrineTypeMapping('enum', 'string');

        $platform = DB::getDoctrineConnection()->getDatabasePlatform();
        $platform->registerDoctrineTypeMapping('enum', 'string');

        $schemeManager = $connection->getDoctrineSchemaManager();
        $tables = $schemeManager->listTables();

        $tablesRows = [];
        $counter = 1;

        foreach ($tables as $table) {

            if (!in_array($table->getName(), config('quick-db.skip'), true)) {
                $row = [
                    $counter++,
                    $table->getName(),
                ];

                if ($this->option('columns')) {
                    $row[] = count($table->getColumns());
                }

                if ($this->option('indexes')) {
                    $primaryKey = $table->getPrimaryKey();
                    $indexList = '';
                    foreach (array_keys($table->getIndexes()) as $index) {
                        $indexList .= $index . PHP_EOL;
                    }
                    $row[] = optional($primaryKey)->getName();
                    $row[] = $indexList;
                }
                $tablesRows[] = $row;
            }

        }

        // Create a new Table instance.
        $table = new Table($this->output);

        //Set the column styles for right aligned columns
        $style = new TableStyle();
        $style->setPadType(STR_PAD_LEFT);
        $table->setColumnStyle(0, $style); //#
        $table->setColumnStyle(2, $style); //columns

        // Set the table headers.
        $headers = ['#', 'table_name'];
        if ($this->option('columns')) {
            $headers[] = 'columns';
        }

        if ($this->option('indexes')) {
            $headers[] = 'primary_key';
            $headers[] = 'indexes';
        }

        $table->setHeaders($headers);

        // Set the contents of the table.
        $table->setRows($tablesRows);

        // Render the table to the output.
        $table->render();

        return 0;
    }
}
