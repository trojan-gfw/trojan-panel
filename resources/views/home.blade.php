@extends('layouts.app')

@section('content')

@php
    function human($bytes, $decimals = 2)
    {
        $size = array('B','KB','MB','GB','TB','PB','EB','ZB','YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        return sprintf("%.{$decimals}f %s (%d Bytes)", $bytes / pow(1024, $factor), @$size[$factor], $bytes);
    }
    $quota = Auth::user()->quota;
    $download = Auth::user()->download;
    $upload = Auth::user()->upload;
    $remain = $quota - $download - $upload;
    if ($remain < 0) {
        $remain = 0;
    }
    $download = human($download);
    $upload = human($upload);
    if ($quota < 0) {
        $quota = 'Infinity';
        $remain = 'Infinity';
    } else {
        $quota = human($quota);
        $remain = human($remain);
    }
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
