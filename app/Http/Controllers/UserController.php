<?php
namespace App\Http\Controllers;

use App\Repositories\Contract\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $user;
    public function __construct(UserInterface $imChatUser)
    {
        $this->user=$imChatUser;
    }
    public function lists(Request $request)
    {
        $limit=$request->get('limit',10);
        $users=$this->user->getUserLists($limit);

        return view('im_chat_user.lists',compact('users'));
    }
    public function addresses()
    {
    }
}