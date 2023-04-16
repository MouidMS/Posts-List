@extends('layouts.main')

@section('title','Landpage')

@section('content')

    <div class="row">
        <div class="row">
            <div class="col">
                <div class="bg-dark w-10 p-3 my-2 rounded"style="height: 100px;" >
                    <p class="text-white text-center lead fs-1">Welcome to PostLite!</p>
                </div>
            </div>
            <div class="col">
                <div class="bg-dark w-10 p-3 my-2 rounded"style="height: 100px;" >
                    <p class="text-white text-center lead fs-1">Hi {{\Illuminate\Support\Facades\Auth::user()->name}} !</p>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="bg-primary w-100 p-3 my-4 rounded"style="height:auto;" >
                <p class="text-white text-left lead fs-1">Features
                </p>
                <ol class="list-group">
                    <li class="list-group-item">
                        Create Note
                    </li>
                    <li class="list-group-item">
                        Delete Note
                    </li>
                    <li class="list-group-item">
                        Update Note
                    </li>
                    <li class="list-group-item">
                        Trashed Note
                    </li>
                    <li class="list-group-item">
                        Show Note
                    </li>
                </ol>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col">
            <div class="bg-light w-100 p-3 my-2 rounded border border-dark" style="height: 250px;">
                <p class="text-dark text-center lead fs-1 fw-bold ro">Create Note</p>
                <p>You can create new notes and save them in your files.</p>
            </div>
        </div>
        <div class="col">
            <div class="bg-danger w-100 p-3 my-5 rounded border border-dark" style="height: 250px;">
                <p class="text-white text-center lead fs-1 fw-bold ">Delete Note</p>
                <p class="text-white">You can delete your notes and move them to the trash.</p>
            </div>
        </div>
        <div class="col">
            <div class="bg-light w-100 p-3 my-2 rounded border border-dark" style="height: 250px;">
                <p class="text-dark text-center lead fs-1 fw-bold">Update Note</p>
                <p>You can update your notes and save the changes.</p>
            </div>
        </div>
        <div class="col">
            <div class="bg-danger w-100 p-3 my-5 rounded border border-dark" style="height: 250px;">
                <p class="text-white text-center lead fs-1 fw-bold">Trashed Note</p>
                <p class="text-white">You can view and restore notes that you have deleted and sent to the trash.</p>
            </div>
        </div>
    </div>

@endsection


