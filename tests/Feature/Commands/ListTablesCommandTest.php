<?php

namespace Mightymango\QuickDb\Tests\Feature\Commands;

use Mightymango\QuickDb\Tests\TestCase;

class ListTablesCommandTest extends TestCase
{
    /** @test */
    public function it_can_list_tables(): void
    {
        $this->artisan('db:tables')
//            ->expectsTable([
//                '#',
//                'table_name',
//            ], [
//                [1, 'migrations'],
//                [2, 'password_resets'],
//                [3, 'users']
//            ])
            ->assertExitCode(0);
    }
}
