@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add user') }}</div>
                <!--<img src="<?php //echo asset("storage/app/public/uploads/1639460639download.jpeg") ?>">-->
                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('postuserdata') }}" name="userValidate" id="userValidate" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-md-3">
                                <label for="name" class=" col-form-label text-md-right">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"   autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="email" class=" col-form-label text-md-right">{{ __('Email') }}</label>
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"   autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Con Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
                            </div>
                            <div class="col-md-3">
                                <label for="roles" class="col-form-label text-md-right">{{ __('Roles') }}</label>
                                <select class="form-control @error('city') is-invalid @enderror" name="roles" id="roles">
                                    <option value="">Select roles</option>
                                    @foreach($data as $res)
                                    <option value="{{ $res->id; }}" {{ old('roles') == "$res->id" ? "selected" : "" }}> {{ $res->role_name; }}</option>
                                    @endforeach 

                                </select>    
                                @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-3">
                                <label for="file" class="col-form-label text-md-right">{{ __('Gender') }}</label>
                                <div class="form-check">
                                    <input class="form-check-input invalid-feedback-radio" type="radio" name="gender" id="genderfemale"  {{ old('gender')=='1' ? 'checked' : '' }}  value="1">
                                    <label class="form-check-label" for="genderfemale">
                                        Female
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input invalid-feedback-radio" type="radio" name="gender" id="gendermale"  {{ old('gender')=='0' ? 'checked' : '' }} value="0" >
                                    <label class="form-check-label" for="gendermale">
                                        Male
                                    </label>
                                </div>
                                <label id="gender-error" class="invalid-feedback" for="gender"></label>
                                @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="country" class="col-form-label text-md-right">{{ __('Country') }}</label>
                                <select class="form-control @error('country') is-invalid @enderror" name="country" id="country">
                                    <option value="">Select country</option>
                                    @foreach($country as $res)
                                    <option value="{{ $res->id; }}" {{ old('country') == "$res->id" ? "selected" : "" }}> {{ $res->name; }}</option>
                                    @endforeach 
                                </select>    
                                @error('country')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="state" class="col-form-label text-md-right">{{ __('State') }}</label>
                                <select class="form-control @error('state') is-invalid @enderror" name="state" id="state">
                                    <option value="">Select state</option>
                                </select>    
                                @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="city" class="col-form-label text-md-right">{{ __('City') }}</label>
                                <select class="form-control @error('city') is-invalid @enderror" name="city" id="city">
                                    <option value="">Select city</option>
                                    <option value="1" {{ old('city') == 1 ? "selected" : "" }}>infgdddia</option>
                                    <option value="2" {{ old('city') == 2 ? "selected" : "" }}>dfgvdf</option>
                                </select>    
                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label for="file" class="col-form-label text-md-right">{{ __('file') }}</label>
                                <input id="file" type="file" class="form-control @error('files') is-invalid @enderror" name="file"  onchange="loadFile(event)">
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <img id="output"/>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add User') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Add user') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                    </div>
                    <table class="table table-striped" id="users-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Username</th>
                                <th>Phone</th>
                                <th>Image</th>
                                 <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/admin/uservalidate.js') }}" ></script>

        @endsection
