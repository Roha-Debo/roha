@extends('frontend.partials.master')

@section('login')

<div class="container">
        <div class="dividers"></div>
            <div class="breadcrumb-account login-page">
                <h1>دخول لحسابك</h1>
                <p>ليس لديك حساب ؟ <a href="register.html"> سجل الان</a></p>
            </div>
    
            <div class="uk-container-center container-small uk-margin-large-top">
                <h1 class="title-site uk-text-center uk-margin-bottom">دخول</h1>
    
                <form id="login-form" method="POST" action="http://127.0.0.1:8000/login">
                    <input type="hidden" name="_token" value="2TwyOejgtVnpJKtdwj6W3rX5WtRSpmHIEbpKIKxt">                <div class="uk-form-row">
                        <div class="form-group field-loginform-identity required">
                            <input type="text" id="username" class="uk-form-large uk-width-1-1 uk-text-center form-control" name="email" value="" required autofocus placeholder="اسم المستخدم او الايميل">
                            <div class="help-block">
                                                        </div>
                        </div></div>
                    <div class="uk-form-row">
                        <div class="form-group field-loginform-password required">
    
                            <input type="password" id="password" class="uk-form-large uk-width-1-1 uk-text-center form-control" name="password" required placeholder="كلمة المرور">
                            <div class="help-block">
                                                        </div>
                        </div></div>
                    <div class="terms-links">
                        <div class="form-group field-loginform-rememberme">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" >
    
                            <label class="form-check-label" for="remember">
                                تذكرني المرة القادمة
                            </label>
    
                            <div class="help-block"></div>
                        </div></div>
                    <div class="uk-form-row">
                        <button type="submit" id="login_btn" class="uk-button-large uk-button uk-button-primary uk-width-1-1" >دخول</button>
                    </div>
                    <div class="alert alert-danger" id="error-msg" style="display: none;margin-top: 10px"></div>
                </form>
                <div class="uk-margin-large uk-text-center">
                    <a class="btn btn-link" href="reset.html">
                        نسيت كلمة المرور
                    </a>
                </div>
            </div>
    
    
</div>
@endsection



