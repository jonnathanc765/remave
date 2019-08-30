@extends('new_dashboard.layouts.app')

@section('messenger', 'active')

@section('title', 'Mensajeria')

@section('content')

<div class="container pb-5">
    <h2>Conversacion</h2>
    {{--<h2>{{ $thread->subject }}</h2>--}}
</div>
<div class="content-container">
    <div class="chat-module">
        <div class="chat-module-top">
            <div class="chat-module-body">
                @foreach ($thread->messages as $message)
                <div class="media chat-item">
                    <img alt="{{ $message->user->name }}" src="{{ Storage::url($message->user->avatar) }}"
                        class="rounded-circle user-avatar-lg">
                    <div class="media-body">
                        <div class="chat-item-title">
                            <span class="chat-item-author">
                                {{ $message->user->name }}
                                <i>{{ $thread->creator() == $message->user ? '(Cliente)' : '(Proveedor)'}}</i>
                            </span>
                            <span>{{ $message->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="chat-item-body">
                            <p>{{ $message->body }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="chat-module-bottom">
            <form class="chat-form" method="POST" action="{{ route('messages.update', $thread) }}">
                @csrf
                @method('PUT')
                <textarea class="form-control" name="message" placeholder="Escribir mensaje" rows="1"></textarea>
                <div class="chat-form-buttons">
                    <button type="submit" class="btn">
                        <i class="fab fa-telegram-plane"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
