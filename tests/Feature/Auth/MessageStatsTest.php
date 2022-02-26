<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Models\Message;
use App\Models\Room;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MessageStatsTest extends TestCase
{
    use RefreshDatabase;

    public function test_users_can_authenticate_message_stats()
    {
        $user = User::factory()->create();

        $room_general = Room::factory()->create([
            'name' => 'general',
        ]);
        $room_1 = Room::factory()->create([
            'name' => 'room1',
        ]);
        $room_2 = Room::factory()->create([
            'name' => 'room2',
        ]);
        $room_3 = Room::factory()->create([
            'name' => 'room3',
        ]);
        $room_4 = Room::factory()->create([
            'name' => 'room4',
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);

        $count_actual = count(Message::where('user_id', $user->id)->get()->toArray());
        $this->assertTrue(0 == $count_actual);

        $msg_expected = 'message bla bla';
        $response = $this->post('/message', [
            'message' => $msg_expected,
            'room' => 'room1',
        ]);
        $response->assertStatus(200);

        $count_actual = count(Message::where('user_id', $user->id)->get()->toArray());
        
        //print var
        //$myDebugVar = array($count_actual);
        //fwrite(STDERR, print_r($myDebugVar, TRUE));
        $this->assertTrue(1 == $count_actual);
    }

}
