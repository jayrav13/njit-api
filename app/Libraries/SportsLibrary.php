<?php

namespace App\Libraries;

use DB;
use App\Models\Sport;
use App\Models\Athlete;
use App\Jobs\SendJobCompletedEmail;

use Mail;

/**
 *  SportsLibrary.php
 *
 *  The purpose of the SportsLibrary is to manage all ETL components of Sports-related data.
 */
class SportsLibrary {

    /**
     *  getSports
     *
     *  This publicly accessible static function kicks off the process of 
     *  collecting all teams.
     */
    public static function getSports()
    {
        DB::transaction(function() {

            // Start with empty array to store all sports. Execute query.
            $sports = [];
            exec('python storage/scripts/sports/sports.py', $sports);

            DB::statement('TRUNCATE sports CASCADE');

            foreach($sports as $sport)
            {
                $sport = explode("\t", $sport);

                $sport = Sport::create([
                    "name" => $sport[0],
                    "roster_url" => $sport[1],
                    "schedule_url" => $sport[2],
                    "archives_url" => $sport[3],
                ]);

                // Attempt to determine gender.
                if(strpos($sport->name, "Men's") !== false)
                {
                    $sport->gender = 'm';
                }
                else if(strpos($sport->name, "Women's") !== false)
                {
                    $sport->gender = 'w';
                }
                else
                {
                    $sport->gender = 'o';
                }

                self::getAthletes($sport, $sport->roster_url);
                self::getCoaches($sport, $sport->roster_url);

                $sport->save();
            }

        });
    }

    /**
     *  getAthletes
     *
     *  This private method is called from the getSports method. Given a reference to
     *  a Sport object and the URL for its respective roster, this method will
     *  scrape and create Athlete objects per team.
     */
    private static function getAthletes(&$sport, $roster_url)
    {
        //  Start with empty array to store all sports. Execute query.
        $athletes = [];
        exec('python storage/scripts/sports/athletes.py ' . $roster_url, $athletes);

        //  Iterate through every athlete in the roster and decode the JSON output
        //  from the Python file.
        foreach($athletes as $athlete)
        {
            $athlete = json_decode($athlete, true);

            //  Execute the create statement in a try...catch block
            try
            {
                $sport->athletes()->create($athlete);
            }
            catch (Exception $e)
            {

            }
        } 
    }

    /**
     *  getCoaches
     *
     *  This private method is called from the getSports method. Given a reference to
     *  a Sport object and the URL for its respective roster, this method will
     *  scrape and create Coach objects per team.
     */
    private static function getCoaches(&$sport, $roster_url)
    {
        $coaches = [];
        exec ('python storage/scripts/sports/coaches.py ' . $roster_url, $coaches);

        foreach($coaches as $coach)
        {
            $coach = json_decode($coach, true);

            try
            {
                $sport->coaches()->create($coach);
            }
            catch (Exception $e)
            {

            }
        }
    }

}