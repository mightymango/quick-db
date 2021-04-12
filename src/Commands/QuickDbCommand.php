<?php

namespace Mightymango\QuickDb\Commands;

use Illuminate\Console\Command;

class QuickDbCommand extends Command
{
    public $signature = 'quick_db';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
