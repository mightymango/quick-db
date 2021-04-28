<?php

namespace Mightymango\QuickDb\Tests\Feature\Commands;

use Mightymango\QuickDb\Tests\TestCase;

class ListTableCommandTest extends TestCase
{
    /** @test */
    public function it_can_list_a_table(): void
    {
        $this->artisan('db:table password_resets')
            ->expectsTable([
                '#',
                'column_name',
                'data_type',
            ], [
                [1, 'email', 'string'],
                [2, 'token', 'string'],
                [3, 'created_at', 'datetime'],
            ])
            ->assertExitCode(0);
    }
}
