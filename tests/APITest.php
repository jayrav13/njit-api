<?php


use App\Models\User;

class APITest extends TestCase
{
    /**
     *  testBuildings().
     *
     *  Using the master account's API token, confirm that /api/v0.1/buildings works.
     */
    public function testBuildings()
    {
        $user = User::where('email', env('MASTER_USERNAME'))->first();
        $this->get('/api/v0.1/buildings?api_token='.$user->api_token)
            ->seeJson([
                'status' => 200,
            ]);
    }

    /**
     *  testEvents().
     *
     *  Using the master account's API token, confirm that /api/v0.1/events works.
     */
    public function testEvents()
    {
        $user = User::where('email', env('MASTER_USERNAME'))->first();
        $this->get('/api/v0.1/events?api_token='.$user->api_token)->seeJson(['status' => 200]);
    }
}
