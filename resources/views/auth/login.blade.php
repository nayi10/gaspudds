@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-5 mt-md-4">
            <div class="card ml-md-4">
                <h4 class="card-header">{{ __('Log in to your account') }}</h4>
                <div class="card-body">
                    @include('shared.alerts')
                    <form method="POST">
                        @csrf
                        <label for="student_id">{{ __('Student ID') }}</label>
                        <input id="student_id" class="form-control" name="student_id" value="{{ old('student_id') }}"  autocomplete="username" autofocus>
                        <br>
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control" name="password"  autocomplete="current-password">

                        <div class="form-check my-2">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                        <button type="submit" class="btn btn-raised float-right btn-info d-block">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-10 mt-5">
                    <legend class="log-header">Why You Should Login</legend>
                    <ul class="list-unstyled log-list mx-2">
                        <li class="mb-3">
                            <strong class="mdi mdi-check-circle" style="font-size: 1.8rem;margin-left:-18px"></strong> 
                            You'll be able to download learning materials for your course.
                        </li>
                        <li class="mb-3">
                            <strong class="mdi mdi-check-circle mr-1" style="font-size: 1.8rem;margin-left:-18px"></strong> 
                            You can submit articles and write-ups to be posted on the blog for students to read.
                        </li>
                        <li class="mb-1">
                            <strong class="mdi mdi-check-circle mr-1" style="font-size: 1.8rem;margin-left:-18px"></strong> 
                            You'll get access to help from experienced colleagues and experts in various fields
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
