@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                   @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                <div class="card-header">{{ __('Reset Password') }}</div>
             
                <div class="card-body">

                    <form method="POST" action="{{ route('password.post_reset_password') }}">
                        @csrf


                        <div class="row mb-3">
                            <label for="new_password" class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>


                            <div class="col-md-6">
                                <input id="" type="hidden" class="form-control @error('otp_number') is-invalid @enderror" name="id" value="{{ $id }}" >
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" value="" >

                                @error('new_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                         <div class="row mb-3">
                            <label for="con_password" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            <div class="col-md-6">
                                <input id="con_password" type="password" class="form-control @error('con_password') is-invalid @enderror" name="con_password" value="" >

                                @error('con_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset') }}
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
