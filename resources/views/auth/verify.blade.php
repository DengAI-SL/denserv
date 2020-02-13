@extends('layouts.admin_no_side')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link. Check  you spam folder if the verification mail is not inside the mailbox.') }}
                    {{ __('If you did not receive the email') }},
                        <form action="{{ route('verification.resend') }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="submit" class="btn btn-xs btn-danger" value="{{ __('click here to request another') }}">
                        </form>
                        {{--<a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.--}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
