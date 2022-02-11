<?php

namespace Tests\Feature;

use App\Events\NewEntryRecievedEvent;
use App\Mail\WelcomeContestEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContestRegistrationTest extends TestCase
{
    use RefreshDatabase;

    protected function setup(): void {
        parent::setUp();

        Mail::fake();
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
        Event::fake([
            NewEntryRecievedEvent::class,
        ]);
        $this->post('/contest', [
            'email' => 'abc@abc.com',
        ]);

        Event::assertDispatched(NewEntryRecievedEvent::class);
    }

    /**
     * A basic test example.
     * @test
     * @return void
     */
    public function a_welcome_email_is_sent()
    {
        $this->post('/contest', [
            'email' => 'abc@abc.com',
        ]);

        Mail::assertQueued(WelcomeContestEmail::class);
    }
}
