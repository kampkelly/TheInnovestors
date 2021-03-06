<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Startup;
use App\Category;
use App\StartupsPhoto;
use App\Thread;
//use App\Friendship;
use Hootlex\Friendships\Models\Friendship;
use App\FriendFriendshipGroups;
use LRedis;
use App\Events\AcceptConnection;
use App\Events\SendConnection;
use App\Mail\NewConnectionOnTheinnovestors;
use App\Http\Controllers\Mail\Mailer;
use Illuminate\Support\Facades\Mail;

class FriendshipController extends Controller
{
   

    public function addfriend($username, $message)
    {
      //  return $message;
        $user = User::where('username', $username)->first();
        $auth = Auth::user();
        if($user->id != Auth::user()->id){
            Auth::user()->befriend($user);
            $selected = Friendship::where('sender_id', Auth::user()->id)->where('recipient_id', $user->id)->where('status', 0)->first();
             $selected->message = $message;
             $selected->save();
            $receiver_request_id = $user->id;
            if(count( $user->getFriendRequests() ) >= 1){
                $request_id = 1;
            }else{
                $request_id = 0;
            }
            $data = ['request_id' => $request_id, 'receiver_request_id' => $receiver_request_id, 'fullname' => Auth::user()->fullname, 'username' => Auth::user()->username];
            event(new SendConnection($user, $auth));
            \Mail::to($user)->send(new NewConnectionOnTheinnovestors($user, $auth));
            return 'Connection request sentt!';
        }else{
            session()->flash('message', 'Unauthorized Operation!');
            return redirect()->back();
        }
    } 
 
    public function acceptfriend($username)
    {
        $user = User::where('username', $username)->first();
        $auth = Auth::user();
        if($user->id != Auth::user()->id){
        Auth::user()->acceptFriendRequest($user, $auth);
        ///create thread
        $slug = Auth::user()->username.'_messages_with_'.$username;
        $thread = Thread::create([
            'title' => 'Connected',
            'user_id' => Auth::user()->id,
            'sender_id' => Auth::user()->id,
            'receiver_id' => $user->id,
            'slug' => $slug
        ]);
        //create thread
        event(new AcceptConnection($user, $auth));
        return 'Connection request accepted!';
        }else{
            session()->flash('message', 'Unauthorized Operation!');
            return redirect()->back();
        }
    }  

    public function rejectfriend($username)
    {
        $user = User::where('username', $username)->first();
        if($user->id != Auth::user()->id){
        Auth::user()->denyFriendRequest($user);
        return 'Connection request rejected!';
        }else{
            session()->flash('message', 'Unauthorized Operation!');
            return redirect()->back();
        }
    } 

    public function unfollowfriend($username)
    {
        $user = User::where('username', $username)->first();
        if($user->id != Auth::user()->id){
            Auth::user()->unfriend($user);
        return 'Friend unfollowed';
        }else{
            session()->flash('message', 'Unauthorized Operation!');
            return redirect()->back();
        }
    } 

    public function blockfriend($username)
    {
        $user = User::where('username', $username)->first();
        if($user->id != Auth::user()->id){
        Auth::user()->blockFriend($user);
        return 'Friend blocked';
        }else{
            session()->flash('message', 'Unauthorized Operation!');
            return redirect()->back();
        }
    } 

}
