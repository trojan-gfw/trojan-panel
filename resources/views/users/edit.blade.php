@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User</div>
                <div class="card-body">
                    <form action="." method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="username" class="col-sm-4 col-form-label text-md-right">Username</label>
                            <div class="col-md-6">
                                <label id="username" class="col-form-label">{{ $user->username }}</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Email</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="is_admin" class="col-sm-4 col-form-label text-md-right">Is Admin</label>
                            <div class="col-md-6">
                                <div class="col-form-check">
                                    <input id="is_admin" type="checkbox" class="col-form-check-input" name="is_admin" {{ $user->is_admin == 1 ? 'checked' : '' }}>
                                    <label class="col-form-label" for="is_admin">
                                        Is Admin
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="quota" class="col-sm-4 col-form-label text-md-right">Quota (in MB)</label>
                            <div class="col-md-6">
                                <input id="quota" type="text" class="form-control" name="quota" value="{{ $user->quota / 1048576 }}">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
