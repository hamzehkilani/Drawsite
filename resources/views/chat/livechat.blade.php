@extends('layout')

@section('content')

<style>
    /* Add your styling for sender and receiver messages */
    .sender-message {
        /* Styles for sender messages */
        transition: transform 0.3s ease-in-out; /* Define a transition property for smooth sliding */
    }

    .receiver-message {
        /* Styles for receiver messages */
        transition: transform 0.3s ease-in-out; /* Define a transition property for smooth sliding */
    }

    .message-container {
        /* Container styles to hold the messages and control the overflow */
        overflow-y: auto;
        max-height: 300px; /* Adjust the maximum height as needed */
    }

</style>

<livewire:testchat/>


@endsection

