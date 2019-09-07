<?php
namespace App\Http\Controllers;

use App\Repositories\Contract\UserInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function lists(UserInterface $user,Request $request)
    {
        $limit=$request->get('limit',10);
        $users=$user->getUserLists($limit);

        return view('im_chat_user.lists',compact('users'));
    }
}