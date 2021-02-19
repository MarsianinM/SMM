@extends('layouts.app')

@section('content')
    <main class="content">
        <div class="container">

            <div class="d-flex justify-content-between mb-3">
                <h1 class="h4">Финансы</h1>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-uppercase">Пополнение счёта</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row no-gutters">
                                        <div class="form-group">
                                            <label for="category_id">Выберите валюту</label>
                                            <select class="form-control">
                                                <option value="rub" selected>{{ Auth::user()->getBalanceByCurrency('RUB') }} RUB</option>
                                                <option value="usd">{{ Auth::user()->getBalanceByCurrency('USD') }} USD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="form-group">
                                            <label for="domain">Сумма</label>
                                            <input type="number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 d-flex justify-content-center align-items-center">
                                    <button class="btn btn-lg btn-success">Пополнить</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="text-uppercase">Способы пополнения</h6>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input name="payment_type" type="radio" class="form-check-input" value="webmoney" id="webmoney" checked>
                                                <label class="form-check-label" for="webmoney">WebMoney</label>
                                            </div>
                                            <div class="form-check">
                                                <input name="payment_type" type="radio" class="form-check-input" value="umoney" id="umoney">
                                                <label class="form-check-label" for="umoney">ЮMoney</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input name="payment_type" type="radio" class="form-check-input" value="visamastercard" id="visamastercard">
                                                <label class="form-check-label" for="visamastercard">Visa и Mastercard</label>
                                            </div>
                                            <div class="form-check">
                                                <input name="payment_type" type="radio" class="form-check-input" value="qiwi" id="qiwi">
                                                <label class="form-check-label" for="qiwi">Qiwi</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <h6 class="font-weight-bold">Внимание!</h6>
                                    <p class="text-secondary">Не делайте прямой перевод на счета биржи, пополняйте только через форму выше.</p>
                                    <p class="text-secondary">Баланс должен быть пополнен автоматически, в течение 5-ти минут, после выполнения платежа, если этого не произошло - пишите в поддержку.</p>
                                    <p class="text-secondary">Для оплаты по безналичному расчету обратитесь в поддержку. Комиссия составляет 10%, минимальная сумма 5000 руб.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="text-uppercase">Вывод средств</h4>
                            <div class="row">
                                <div class="col-6">
                                    <div class="row no-gutters">
                                        <div class="form-group">
                                            <label for="category_id">Выберите валюту</label>
                                            <select class="form-control">
                                                <option value="rub" selected>{{ Auth::user()->getBalanceByCurrency('RUB') }} RUB</option>
                                                <option value="usd">{{ Auth::user()->getBalanceByCurrency('USD') }} USD</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row no-gutters">
                                        <div class="form-group">
                                            <label for="domain">Сумма</label>
                                            <input type="number" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 d-flex justify-content-center align-items-center">
                                    <button class="btn btn-lg btn-success">Вывести</button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="text-uppercase">Способы вывода</h6>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input name="payment_type" type="radio" class="form-check-input" value="umoney" id="umoney">
                                                <label class="form-check-label" for="umoney">ЮMoney</label>
                                            </div>
                                            <div class="form-check">
                                                <input name="payment_type" type="radio" class="form-check-input" value="visamastercard" id="visamastercard">
                                                <label class="form-check-label" for="visamastercard">Visa и Mastercard</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-check">
                                                <input name="payment_type" type="radio" class="form-check-input" value="qiwi" id="qiwi">
                                                <label class="form-check-label" for="qiwi">Qiwi</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-12">
                                    <h6 class="font-weight-bold">Внимание!</h6>
                                    <p class="text-secondary">Комиссия зависит от способа вывода средств. Вывод в рублях на Webmoney приостановлен.</p>

                                    <p class="text-secondary">
                                        <span>Webmoney - 0.8%;</span><br>
                                        <span>Qiwi - 2.2%;</span><br>
                                        <span>Visa/MasterCard RUB - 3% и 60 руб.;</span><br>
                                        <span>Visa/MasterCard UAH - 1%, курс 0.365;</span><br>
                                        <span>ЮMoney (Яндекс.Деньги) - 2%;</span><br>
                                    </p>

                                    <p class="text-secondary">Запрещено пополнять счет через одну систему и выводить на другую.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
