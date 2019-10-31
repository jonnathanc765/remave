<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::forUser(Auth::id())->latest('updated_at')->paginate(10);
        $unreads = collect([]);
        if ($threads->isNotEmpty()) {

            //foreach ($threads as $key => $thread) {
              //  if ($key == 1) {
                //    $unreads->push($thread->latestMessage->unreadForUser(Auth::id())->get()->count());
                //}
            //}
           // $messageId = $threads->first()->messages->first()->id;
        }
        return view('new_dashboard.messenger.index', compact('threads', 'unreads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('id', '!=', Auth::id())->get();

        return view('messenger.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input  = Input::all();
        $thread = Thread::create([
            'subject' => $input['subject'],
        ]);

        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id'   => Auth::id(),
            'body'      => $input['message'],
        ]);

        // Sender
        Participant::create([
            'thread_id' => $thread->id,
            'user_id'   => Auth::id(),
            'last_read' => new Carbon,
        ]);

        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipant($input['recipients']);
        }

        return redirect()->route('messages');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thread = Thread::with('messages.user')->findOrFail($id);
        $userId = Auth::id();

        if ($thread) {
            if ($thread->hasParticipant($userId)) {

                $thread->markAsRead($userId);

                return view('new_dashboard.messenger.show', compact('thread'));
            } else {
                return redirect()->route('messages.index')->withError('Usted no puede ver este mensaje');
            }
        } else {
            return redirect()->route('messages.index')->withError('El Hilo con el id: ' . $id . ' no existe');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            $request->validate([
                'message' => 'required|string'
            ]);

            $thread = Thread::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            Session::flash('error_message', 'The thread with ID: ' . $id . ' was not found.');

            return redirect()->route('messages.index');
        }
        $thread->activateAllParticipants();

        // Message
        Message::create([
            'thread_id' => $thread->id,
            'user_id'   => Auth::id(),
            'body'      => $request->message,
        ]);

        // Add replier as a participant
        $participant = Participant::firstOrCreate([
            'thread_id' => $thread->id,
            'user_id'   => Auth::id(),
        ]);
        $participant->last_read = new Carbon;
        $participant->save();

        return redirect()->route('messages.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
