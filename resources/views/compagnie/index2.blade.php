@extends('layouts.app')

@section('content')
    <div class="container" id="app">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Messenger
                    </div>

                <ChatComponent2 :user="{{Auth::user()}}"/>






                </div>
            </div>
        </div>
    </div>




@endsection
