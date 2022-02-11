<?php

namespace Tests\Feature;

use App\Events\NewEntryRecievedEvent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;

class ContestRegistrationTest extends TestCase
{
    use RefreshDatabase;

    protected function setup(): void {
        parent::setUp();

        Event::fake();
    }

    /**
     * @test
     */
    public function an_email_can_be_entered_into_the_contest()
    {
        $this->post('/contest', [
            'email' => 'abc@abc.com',
        ]);

        $this->assertDatabaseCount('contest_entries', 1);
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function email_is_required()
    {

//        $this->withoutExceptionHandling();
        $this->post('/contest', [
            'email' => '',
        ]);

        $this->assertDatabaseCount('contest_entries', 0);
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function email_needs_to_be_an_email()
    {
        $this->post('/contest', [
            'email' => 'sgrfgbv',
        ]);

        $this->assertDatabaseCount('contest_entries', 0);
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function an_event_is_fired_when_user_registers()
    {
        $this->post('/contest', [
            'email' => 'abc@abc.com',
        ]);

        Event::assertDispatched(NewEntryRecievedEvent::class);

    }
}
