@extends('layouts/layout')

@section('title')
    Регистрация
@endsection


<x-guest_navbar/>
@section('content')
    <div class="page-wrapper auth">
        <div class="page-inner bg-brand-gradient">
            <div class="page-content-wrapper bg-transparent m-0">
                <div class="flex-1"
                     style="background: url(/img/svg/pattern-1.svg) no-repeat center bottom fixed; background-size: cover;">
                    <div class="container py-4 py-lg-5 my-lg-5 px-4 px-sm-0">
                        <div class="row">
                            <div class="col-xl-12">
                                <h2 class="fs-xxl fw-500 mt-4 text-white text-center">
                                    Регистрация
                                    <small class="h3 fw-300 mt-3 mb-5 text-white opacity-60 hidden-sm-down">
                                        Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает
                                        сосредоточиться.
                                        <br>
                                        По своей сути рыбатекст является альтернативой традиционному lorem ipsum

                                    </small>
                                </h2>
                            </div>
                            <div class="col-xl-6 ml-auto mr-auto">
                                <div class="card p-4 rounded-plus bg-faded">

                                    <!-- <div class="alert alert-danger text-dark" role="alert">
                                        <strong>Уведомление!</strong> Этот эл. адрес уже занят другим пользователем.
                                    </div> -->
                                    <x-errors/>
                                    <form action="{{ route('register') }}" id="js-login" novalidate="" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label" for="userpassword">Имя<br></label>
                                            <input type="text" name="name" id="username" value="{{ old('name') }}"
                                                   class="form-control"
                                                   placeholder="" required>
                                            <div class="invalid-feedback">Заполните поле.</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="emailverify">Email</label>
                                            <input type="email" name="email" value="{{ old('email') }}" id="emailverify"
                                                   class="form-control" placeholder="Эл. адрес" required>
                                            <div class="invalid-feedback">Заполните поле.</div>
                                            <div class="help-block">Эл. адрес будет вашим логином при авторизации</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="password">Пароль</label>
                                            <input type="password" name="password" id="userpassword"
                                                   class="form-control"
                                                   placeholder=""
                                                   required>
                                            <div class="invalid-feedback">Заполните поле.</div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="userpassword">Повторите пароль<br></label>
                                            <input type="password" name="password_confirmation" id="password_confirm"
                                                   class="form-control"
                                                   placeholder="" required>
                                            <div class="invalid-feedback">Заполните поле.</div>
                                        </div>

                                        <div class="row no-gutters">
                                            <div class="col-md-4 ml-auto text-right">
                                                <button id="js-login-btn" type="submit"
                                                        class="btn btn-block btn-danger btn-lg mt-3">
                                                    Регистрация
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="js/vendors.bundle.js"></script>
    <script>
        $("#js-login-btn").click(function (event) {

            // Fetch form to apply custom Bootstrap validation
            var form = $("#js-login")

            if (form[0].checkValidity() === false) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.addClass('was-validated');
            // Perform ajax submit here...

        };

    </script>
@endsection

