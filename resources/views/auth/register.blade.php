@extends("auth.master")
@section("content")
    <!-- BEGIN CONTENT -->
    <div class="col-md-9 col-sm-9">
        <h1>Create an account</h1>
        @include('pages.error')
        <div class="content-form-page">
            <div class="row">
                <div class="col-md-7 col-sm-7">
                    <form class="form-horizontal" role="form" method="POST" action="{!! URL::to('/auth/register') !!}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <fieldset>
                            <legend>Your personal details</legend>

                            <div class="form-group">
                                <label for="name" class="col-lg-4 control-label">Name <span class="require">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-lg-4 control-label">Email <span class="require">*</span></label>
                                <div class="col-lg-8">
                                    <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Your password</legend>
                            <div class="form-group">
                                <label for="password" class="col-lg-4 control-label">Password <span class="require">*</span></label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm-password" class="col-lg-4 control-label">Confirm password <span class="require">*</span></label>
                                <div class="col-lg-8">
                                    <input type="password" class="form-control" id="confirm-password" name="password_confirmation">
                                </div>
                            </div>
                        </fieldset>
                        <div class="row">
                            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">
                                <button type="submit" class="btn btn-primary">Create an account</button>
                                <button type="button" class="btn btn-default">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- END CONTENT -->
@stop