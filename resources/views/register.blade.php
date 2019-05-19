@extends('app')
@section('content')
    <section class="register-page">
        <div class="wrapper">
            <div class="page-header">
                <div class="page-header-image"></div>
                <div class="content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 offset-lg-0 offset-md-3">
                                <div id="square7" class="square square-7"></div>
                                <div id="square8" class="square square-8"></div>
                                <div class="card card-register">
                                    <div class="card-header">
                                        <img class="card-img" src="/img/square1.png" alt="Card image">
                                        <h4 class="card-title">Register</h4>
                                    </div>
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="tim-icons icon-single-02"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Full Name">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="tim-icons icon-email-85"></i>
                                                    </div>
                                                </div>
                                                <input type="text" placeholder="Email" class="form-control">
                                            </div>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        <i class="tim-icons icon-lock-circle"></i>
                                                    </div>
                                                </div>
                                                <input type="text" class="form-control" placeholder="Password">
                                            </div>
                                            <div class="form-check text-left">
                                                <label class="form-check-label">
                                                    <input class="form-check-input" type="checkbox">
                                                    <span class="form-check-sign"></span>
                                                    I agree to the
                                                    <a href="javascript:void(0)">terms and conditions</a>.
                                                </label>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer">
                                        <a href="javascript:void(0)" class="btn btn-info btn-round btn-lg">Get Started</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="register-bg"></div>
                        <div id="square1" class="square square-1"></div>
                        <div id="square2" class="square square-2"></div>
                        <div id="square3" class="square square-3"></div>
                        <div id="square4" class="square square-4"></div>
                        <div id="square5" class="square square-5"></div>
                        <div id="square6" class="square square-6"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection