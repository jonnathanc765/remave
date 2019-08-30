<?php

use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thread::truncate();
        Participant::truncate();
        Message::truncate();
        factory(Thread::class, 50)->create()->each(function ($thread) {
            factory(Participant::class)->create(['thread_id' => $thread->id]);
            factory(Message::class)->create(['thread_id' => $thread->id]);
        });
    }
}
