@extends('auth.master')
@section('content')
    <!-- BEGIN CONTENT -->
    <div class="col-md-9 col-sm-9">
        <h1>Login Page</h1>
        @include('pages.error')
        <div class="content-form-page">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <form class="form-horizontal form-without-legend" role="form" method="POST"
                          action="{!! URL::to('/auth/login') !!}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label for="email" class="col-lg-4 control-label">Email <span
                                        class="require">*</span></label>

                            <div class="col-lg-8">
                                <input type="text" class="form-control" id="email" name="email"
                                       value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>

                            <div class="col-lg-8">
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-lg-8 col-md-offset-4 padding-left-0">
                                <div class="col-sm-6">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{!! URL::to('/password/email') !!}">Forgot Your Password?</a>
                                </div>

                            </div>
                        </div>
                        <div class="row">

                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END CONTENT -->
@stop

