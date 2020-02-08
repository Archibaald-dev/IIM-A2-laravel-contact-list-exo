
@extends('layouts.app')

    @section('content')
<div class="container">

    
    @forelse ($users as $user)
<p>L'utilisateur "{{$user->name}}" à "{{$user->contacts->count( )}}" contact</p>
    @empty
         <p>Il n'y a pas encore d'utilisateur</p>

    @endforelse
   
</div>
@endsection
