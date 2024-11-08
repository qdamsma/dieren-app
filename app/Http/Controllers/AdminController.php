<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Afspraak;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function blockUser($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->is_blocked = true; // Assuming you have an `is_blocked` column
            $user->save();
            return back()->with('success', 'User has been blocked.');
        }
        return back()->with('error', 'User not found.');
    }

    public function deleteRequest($id)
    {
        $afspraak = Afspraak::find($id);
        if ($afspraak) {
            $afspraak->delete();
            return back()->with('success', 'Request has been deleted.');
        }
        return back()->with('error', 'Request not found.');
    }

    public function unblockUser($id)
{
    $user = User::find($id);
    if ($user) {
        $user->is_blocked = false;
        $user->save();
        return back()->with('success', 'User has been unblocked.');
    }
    return back()->with('error', 'User not found.');
}

}