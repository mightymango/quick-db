<?php

namespace Mightymango\QuickDb\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Helper\TableStyle;

class ListTableCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:table {name : The name of the table} {--f|full : List full details}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display the structure of the table';

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
        $table = $schemeManager->listTableDetails($this->argument('name'));
        $columns = $table->getColumns();

        //Check if table exists
        if (! $columns) {
            $this->error('There is no table with that name.');
            return 1;
        }

        //Format the output
        $columnRows = [];
        $counter = 0;

        foreach ($columns as $column) {
            $counter++;
            $row = [
                $counter,
                $column->getName(),
                $row[] = ltrim(strtolower($column->getType()) . ($column->getUnsigned() ? ' unsigned' : ''), '\\')
            ];

            if ($this->option('full')) {
                $row[] = $column->getLength() > 0 ? $column->getLength() : '';
                $row[] = $column->getDefault();
                $row[] = $column->getNotNull() ? 'No' : 'Yes';
            }

            $columnRows[] = $row;
        }

        // Create a new Table instance.
        $table = new Table($this->output);

        //Set the column styles for right aligned columns
        $style = new TableStyle();
        $style->setPadType(STR_PAD_LEFT);
        $table->setColumnStyle(0, $style); //#
        if ($this->option('full')) {
            $table->setColumnStyle(3, $style); //length
            $table->setColumnStyle(4, $style); //column_default
        }

        // Set the table headers.
        $headers = ['#', 'column_name', 'data_type'];
        if ($this->option('full')) {
            array_push( $headers, 'length', 'column_default', 'is_nullable') ;
        }

        $table->setHeaders($headers);

        // Set the contents of the table.
        $table->setRows(
            $columnRows
        );

        $this->info('Table: ' . $this->argument('name'));

        // Render the table to the output.
        $table->render();

        return 0;
    }
}
