{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
@extends('layouts.app')
{{-- @extends('admin.student.activities') --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   
                    <h1>Welcome, {{ Auth::user()->name }}</h1>
                    <p>This is your dashboard.</p>


                    <h2>Create Submission</h2>
                    <form action="{{ route('submissions.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="activity_id">Activity:</label>
                          
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Section_name</th>
                                        <th>Subject_name</th>
                                        <th>Activity_name</th>
                                        <th>Due_date</th>
                                        <th>Name</th>
                                        <th>Section_name</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        {{dd($activities)}}
                                   
                                    @foreach ($activities as $activity)
                                        
                                   
                                    <tr>
                                        <td>{{ $activity->id }}</td>
                                        <td>{{ $activity->name }}</td>
                                        <td>{{ $activity->section_name }}</td>
                                        <td>{{ $activity->subject_name }}</td>
                                        <td>{{ $activity->activitie_name }}</td>
                                        <td>{{ $activity->due_date }}</td>
                                        <td>{{ $activity->name }}</td>
                                        <td>{{ $activity->section_name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <select class="form-control" id="activity_id" name="activity_id">
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file">File:</label>
                            <input type="file" class="form-control-file" id="file" name="file">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection