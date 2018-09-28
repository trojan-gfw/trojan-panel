@extends('layouts.app')

@section('content')

@include('human')

@php
    list($quota, $download, $upload, $remain) = human_string(Auth::user()->quota, Auth::user()->download, Auth::user()->upload);
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th scope="row">Username</th>
                                <td>{{ Auth::user()->username }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Email</th>
                                <td>{{ Auth::user()->email }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Quota</th>
                                <td>{{ $quota }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Download</th>
                                <td>{{ $download }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Upload</th>
                                <td>{{ $upload }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Remain</th>
                                <td>{{ $remain }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
