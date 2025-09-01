@extends('layouts.master')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h2 class="text-center">Welcome to the Dashboard</h2>
    </div>

    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h4>Users</h4>
                    <p>Manage application users</p>
                    <a href="" class="btn btn-primary btn-sm">Manage Users</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h4>Roles</h4>
                    <p>Define and assign roles</p>
                    <a href="" class="btn btn-success btn-sm">Manage Roles</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center">
                    <h4>Permissions</h4>
                    <p>Control access to features</p>
                    <a href="" class="btn btn-warning btn-sm">Manage Permissions</a>
                </div>
            </div>
        </div>
    </div>
@endsection
