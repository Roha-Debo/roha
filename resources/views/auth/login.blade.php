@extends('frontend.partials.master')

@section('login')

<div class="container">
        <div class="dividers"></div>
            <div class="breadcrumb-account login-page">
                <h1>{{__('cp.go_to_your_account')}}</h1>
                <p>{{__('cp.you_do_not_have_account?')}}<a href="register.html"> {{__('cp.register_now')}}</a></p>
            </div>
    
            <div class="uk-container-center container-small uk-margin-large-top">
                <h1 class="title-site uk-text-center uk-margin-bottom">{{__('cp.login')}}</h1>
    
                <form id="login-form" method="POST" action="login">
                    @csrf
                    <input type="hidden" name="_token" value="2TwyOejgtVnpJKtdwj6W3rX5WtRSpmHIEbpKIKxt">                <div class="uk-form-row">
                        <div class="form-group field-loginform-identity required">
                            <input type="text" id="username" class="uk-form-large uk-width-1-1 uk-text-center form-control" name="email" value="" required autofocus placeholder="{{__('cp.username_or_email')}}">
                            <div class="help-block">
                                                        </div>
                        </div></div>
                    <div class="uk-form-row">
                        <div class="form-group field-loginform-password required">
    
                            <input type="password" id="password" class="uk-form-large uk-width-1-1 uk-text-center form-control" name="password" required placeholder="{{__('cp.password')}}">
                            <div class="help-block">
                                                        </div>
                        </div></div>
                    <div class="terms-links">
                        <div class="form-group field-loginform-rememberme">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" >
    
                            <label class="form-check-label" for="remember">
                                {{__('cp.remember_me')}}
                            </label>
    
                            <div class="help-block"></div>
                        </div></div>
                    <div class="uk-form-row">
                        <button type="submit" id="login_btn" class="uk-button-large uk-button uk-button-primary uk-width-1-1" >{{__('cp.login')}}</button>
                    </div>
                    <div class="alert alert-danger" id="error-msg" style="display: none;margin-top: 10px"></div>
                </form>
                <div class="uk-margin-large uk-text-center">
                    <a class="btn btn-link" href="reset.html">
                        {{__('cp.forgot_password')}}
                    </a>
                </div>
            </div>
    
    
</div>
@endsection



