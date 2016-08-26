<?php

namespace App\Console;

use App\Libraries\CoursesLibrary;
use App\Libraries\SportsLibrary;
use App\Models\Event;
use DB;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        // Commands\Inspire::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /*
         *  Task to scrape Events.
         */
        $schedule->call(function () {

            // Create a transaction.
            DB::transaction(function () {

                // Execute Python script and store in Array.
                $events = [];
                exec('python storage/scripts/events/events.py', $events);

                // Start by truncating table.
                Event::truncate();

                // Iterate through events to create each event.
                foreach ($events as $event) {

                    // Explode event by tab space.
                    $event = explode("\t", $event);

                    // Create new Event.
                    Event::create([
                        'name'         => $event[0],
                        'summary'      => $event[1],
                        'location'     => $event[2],
                        'dtstart'      => $event[3],
                        'dtend'        => $event[4],
                        'all_day'      => $event[5],
                        'organization' => $event[6],
                        'description'  => $event[7],
                        'category'     => $event[8],
                    ]);
                }
            });
        });

        /*
         *  Task to scrape Sports.
         */
        $schedule->call(function () {
            SportsLibrary::getSports();
        });

        /*
         *  Task to scrape Courses.
         */
        $schedule->call(function () {
            CoursesLibrary::getCourses();
        });
    }
}
