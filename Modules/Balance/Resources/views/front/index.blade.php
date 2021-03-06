@extends('mainpage::layouts.front.app')

@section('content')
    <div class="project__title">
        @lang('balance::balance.title_page')
    </div>

    <div class="finance__flex">
        <form  class="finance__item" action="{{ route('balance.store') }}" method="POST">
            @csrf
            <input type="hidden" name="user_id" value="{{ auth()->id() }}" />
            <input type="hidden" id="payment_method" name="payment_method" value="" />
            <input type="hidden" id="type" name="type" value="insert" />
            <div class="finance__title">
                @lang('balance::balance.add_balance')
            </div>
            <div class="inputs__finance">
                @if(!empty($currency) && count($currency))
                    <div class="left__valuta">
                        <p class="choose__text__both">
                            @lang('balance::balance.enter_currency')
                        </p>
                        <select class="custom-select sources" name="currency_id" placeholder="@lang('balance::balance.enter_currency')" id="">
                            @foreach($currency as $cur)
                                <option  value="{{ $cur->id }}">{{$cur->code}}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <div class="right__summa">
                    <p class="choose__text__both">
                        @lang('balance::balance.enter_sum')
                    </p>
                    <input type="number" name="amount" placeholder="0.00" value="" step="1.0" min="10">
                </div>
            </div>

            <p class="minimum__price">
                Минимальная сумма для пополнения <span>10 RUB</span>
            </p>

            <div class="subtitle__finance">
                @lang('balance::balance.enter_choose_the_replenishment')
            </div>

            <div class="choose__sposob" id="add_balance">
                @foreach($balance_type as $type)
                    <a href="#" data-type="{{ $type }}" class="sposob__item">
                        <span><img src="{{ asset('img/_src/'.$type.'.png') }}" alt="sposob__icon"></span><p>@lang('balance::balance.entry_'.$type.'')</p>
                    </a>
                @endforeach
            </div>
            <div class="create__project__btn" style="margin-bottom: 20px">
            <button type="submit" class="btn__top-menu green__btntop">@lang('balance::balance.add_balance')</button>
            </div>
            <div class="warning__finance">
                <div class="warning__subtitle">
                    Внимание!
                </div>

                <p>Не делайте прямой перевод на счета биржи, пополняйте только через
                    форму выше.</p>

                <p>Баланс должен быть пополнен автоматически, в течение 5-ти минут,
                    после выполнения платежа, если этого не произошло - пишите в
                    поддержку.</p>

                <p>Для оплаты по безналичному расчету обратитесь в поддержку. <br>
                    Комиссия составляет 10%, минимальная сумма 5000 руб.</p>
            </div>

            <div class="more__method__a">
                <a href="#">Подробнее о методах оплаты</a>
            </div>
        </form>


        <div class="finance__item">
            <div class="finance__title">
                Вывод средств
            </div>



            <div class="inputs__finance">
                <div class="left__valuta">
                    <p class="choose__text__both">
                        Выберите валюту
                    </p>
                    <select class="custom-select sources" placeholder="change text" id="">
                        <option value="Группа1">250.03 RUB</option>
                        <option value="Группа2">451.02 RUB</option>
                        <option value="Группа3">221.11 RUB</option>
                        <option value="Группа4">154.42 RUB</option>
                    </select>
                </div>

                <div class="right__summa">
                    <p class="choose__text__both">
                        Введите сумму
                    </p>
                    <input type="text" placeholder="0.00">

                </div>

            </div>
            <p class="minimum__price">
                Минимальная сумма для пополнения <span>10 RUB</span>
            </p>

            <div class="subtitle__finance">
                Выберите способ вывода
            </div>

            <div class="choose__sposob">
                <a href="#" class="sposob__item">
                    <span><img src="{{ asset('img/_src/sposob2.png') }}" alt="sposob__icon"></span><p>Visa</p>
                </a>
                <a href="#" class="sposob__item">
                    <span><img src="{{ asset('img/_src/sposob4.png') }}" alt="sposob__icon"></span><p>Mastercard</p>
                </a>
                <a href="#" class="sposob__item">
                    <span><img src="{{ asset('img/_src/sposob3.png') }}" alt="sposob__icon"></span><p>Qiwi Wallet</p>
                </a>
            </div>

            <div class="warning__finance">
                <div class="warning__subtitle">
                    Внимание!
                </div>

                <p>Комиссия зависит от способа вывода средств. <br>
                    Вывод в рублях на Webmoney приостановлен.</p>

                <p>Webmoney - 0.8%; <br>
                    Qiwi - 2.2%; <br>
                    Visa/MasterCard RUB - 3% и 60 руб.; <br>
                    Visa/MasterCard UAH - 1%, курс 0.365; <br>
                    ЮMoney (Яндекс.Деньги) - 2%;</p>

                <p>Запрещено пополнять счет через одну систему и выводить на другую.</p>
            </div>
        </div>
    </div>
    {{-- History --}}
    <div class="project__title">
        История операций
    </div>


    <div class="table-wrap">
        <table>
            <thead>
            <tr>
                <th>Дата / Время</th>
                <th>Сумма</th>
                <th>Система</th>
                <th>Тип операции</th>
                <th>Статус</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td data-label="Дата / Время">21 Ноября 2021 (23:51)</td>
                <td data-label="Сумма">$ 460</td>
                <td data-label="Система">Mastercard</td>
                <td data-label="Тип операции">Вывод средств</td>
                <td data-label="Статус"><span class="green__data">Исполнен</span></td>
            </tr>
            <tr>
                <td data-label="Дата / Время">21 Ноября 2021 (23:51)</td>
                <td data-label="Сумма">$ 460</td>
                <td data-label="Система">Mastercard</td>
                <td data-label="Тип операции">Вывод средств</td>
                <td data-label="Статус"><span class="grey__data">В обработке</span></td>
            </tr>
            <tr>
                <td data-label="Дата / Время">21 Ноября 2021 (23:51)</td>
                <td data-label="Сумма">$ 460</td>
                <td data-label="Система">Mastercard</td>
                <td data-label="Тип операции">Вывод средств</td>
                <td data-label="Статус"><span class="red__data">Отклонён</span></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection

@section('script')
    <script type="application/javascript">
        $(document).ready(function (){

        });
        $(document).on('click', '#add_balance a', function(){
            let type = $(this).data('type');
            $('#payment_method').val(type);
            return false;
        });
    </script>
@endsection
