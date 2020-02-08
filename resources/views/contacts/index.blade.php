@extends('layouts.app');

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-primary float-right" href="{{ route('contacts.create') }}">Ajouter un contact</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nom du contact</th>
                        <th scope="col">Téléphone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                       
                            @forelse ($contacts as $contact)  
                            @if($contact->user_id === Auth::user()->id)
                            <tr>
                                <td>{{$contact->id}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->tel}}</td>
                                <td>{{$contact->email}}</td>
                                <td>
                                        <a class="btn btn-primary" href="{{ route('contacts.edit', $contact->id)}}">Modifier</a>

                                        <a class="btn btn-danger"
                                        onclick="document.getElementById('delete-form-{{$contact->id}}').submit()">Supprimer</a>
                                      
                                        <form id="delete-form-{{$contact->id}}" action="{{ route('contacts.destroy', $contact->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                </td>
                            </tr>
                            @endif
                            @empty
                            <tr>
                                <td>Vous n'avez pas de contact</td>
                            </tr>
                            
                            @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
