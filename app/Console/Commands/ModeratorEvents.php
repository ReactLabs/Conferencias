<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Event;
use Illuminate\Support\Facades\Mail;
use App\Mail\EventNotification;
use DateTime;
use App\User;

class ModeratorEvents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'moderator:events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a email to the moderators informing upcoming events';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $from = new DateTime();

        $to = (new DateTime())->modify('+7 day');

        $eventsTime = Event::whereBetween('deadline', [$from, $to])->get();

        $users = User::all();

        if ($eventsTime->count() != 0) {

            foreach ($users as $user) {
                Mail::to($user->email)->send(new EventNotification($eventsTime, '/moderator/event/'));
            }

        }

    }
}
