<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notification)
    {
        $notification->update([
            'status'    => 'read'
        ]);

        return redirect()->back()->with('success', 'Marked as read.');
    }

    public function updateAll(User $user)
    {
        $notifications = Notification::where('user_id', $user->id)->where('status', 'unread')->get();
        foreach($notifications as $notification){
            $notification->update([
                'status'    => 'read'
            ]);
        }
        

        return redirect()->back()->with('success', 'All Marked as read.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        $notification->delete();
        return redirect()->back()->with('success', 'Notification Deleted.');
    }
    public function destroyAllRead($id)
    {
        $notifications = Notification::where('user_id', $id)->where('status', 'read')->get();

        foreach($notifications as $notification){
            $notification->delete();
        }

        return redirect()->back()->with('success', 'Deleted all readed notifications');
    }

    public function destroyAll($id)
    {
        $notifications = Notification::where('user_id', $id)->get();

        foreach($notifications as $notification){
            $notification->delete();
        }

        return redirect()->back()->with('success', 'Deleted all notifications');
    }
}
