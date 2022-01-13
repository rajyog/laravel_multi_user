@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add role') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form method="POST" action="{{ route('postRoledata') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="role_name" class="col-md-4 col-form-label text-md-right">{{ __('Role name') }}</label>

                            <div class="col-md-6">
                                <input id="role_name" type="text" class="form-control @error('role_name') is-invalid @enderror" name="role_name" value="{{ old('role_name') }}"   autofocus>

                                @error('role_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description"  >

                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add role') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 100px;">
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
                <div class="row mb-3">
<!--                    <div class="col-md-1">
                        <label for="role_name" class="col-form-label text-md-right">{{ __('show') }}
                            <select class="form-control "> 
                                <option>10</option>
                                <option>20</option>
                                <option>30</option>

                            </select>
                            {{ __('entries') }}
                        </label>

                    </div>-->

                    <div class="offset-md-9 col-md-3">
                        <label for="role_name" class="col-form-label text-md-right">{{ __('search') }}</label>
                        <input id="serach" type="text" class="form-control " name="search" >
                        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                    </div>
                </div>
                <div id="showdata">
                      @include('user.rolepagination') 
                </div>

            </div>
        </div>
    </div>
    <script src="{{ asset('js/admin/role.js') }}" ></script>
    @endsection
