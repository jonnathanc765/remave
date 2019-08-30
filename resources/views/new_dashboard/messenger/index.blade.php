@extends('new_dashboard.layouts.app')

@section('messenger', 'active')

@section('title', 'Mensajeria')

@section('content')

<div class="container-fluid p-0">
    <div class="email-inbox-header">
        <div class="row">
            <div class="col-lg-12">
                <div class="email-title">
                    <span class="icon">
                        <i class="fas fa-inbox"></i>
                    </span>
                    Inbox
                    @if ($unreads->isNotEmpty())
                    <span class="new-messages">
                        ({{ $unreads->sum() }}
                        {{ $unreads->sum() > 1 ? 'mensajes nuevos' : 'mensaje nuevo'}})
                    </span>
                    @else
                    <span>No hay mensajes disponibles</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @forelse ($threads as $thread)
    <a href="{{ route('messages.show', $thread) }}">
        <div class="email-list">
            <div
                class="email-list-item email-list-item{{ ($thread->isUnread(Auth::id())) ? '--unread' : '' }}">
                <div class="email-list-detail">
                    <span class="date float-right">
                        <span class="icon"><i class="fas fa-paperclip"></i></span>
                        {{ $thread->updated_at->diffForHumans() }}
                    </span>
                    <span class="from">{{ $thread->creator()->name }}</span>
                    <p class="msg">{{ $thread->subject }} <i style="color: green">{{ $thread->userUnreadMessagesCount(Auth::id()) }}</i></p>
                </div>
            </div>
        </div>
    </a>
    @empty

    @endforelse
    <div class="pagination pt-3">
        {{ $threads->links() }}
    </div>
</div>

@endsection
