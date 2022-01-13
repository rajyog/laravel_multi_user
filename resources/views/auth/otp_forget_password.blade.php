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
                <div class="card-header">{{ __('Forget Password OTP') }}</div>
             
                <div class="card-body">

                    <form method="POST" action="{{ route("password.post_forget_password") }}">
                        @csrf


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Enter OTP Number') }}</label>


                            <div class="col-md-6">
                                <input id="otp_number" type="text" class="form-control @error('otp_number') is-invalid @enderror" name="otp_number" value="" required  autofocus>
                                <input id="" type="hidden" class="form-control @error('otp_number') is-invalid @enderror" name="id" value="{{ $id }}" >

                                @error('otp_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Varify OTP') }}
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
