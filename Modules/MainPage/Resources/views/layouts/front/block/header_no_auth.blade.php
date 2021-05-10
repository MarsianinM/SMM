
<header class="header-2">
    <div class="header-menu-2">
        <div class="header-container-2">
            <div class="header-body-2">
                <a href="{{ route('home') }}">
                    @if($websiteSetting && $websiteSetting->hasMedia('settings'))
                        <img src="{{ $websiteSetting->getFirstMediaUrl('settings', 'logo') }}" alt="{{ $websiteSetting->title }}" class="logo">
                    @else
                        <img src="{{ asset('frontend/img/_src/logo.png') }}" alt="Лого" class="logo">
                    @endif
                </a>
                <nav>
                    <ul class="menu__main">
                        <li class="menu__item-2"><a href="https://smm.ua/news" class="menu__link-2">Новости</a></li>
                        <li class="menu__item-2"><a href="https://smm.ua/questions" class="menu__link-2">Вопросы и ответы</a></li>
                        <li class="menu__item-2"><a href="https://smm.ua/rules" class="menu__link-2">Правила работы</a></li>
                        <li class="menu__item-2"><a href="https://smm.ua/price" class="menu__link-2">Тарифы</a></li>
                    </ul>
                </nav>
                <div class="registr">


                    <a href="#signin-form" rel="modal:open">Регистрация</a>

                    <a href="#login-form"  rel="modal:open">Вход</a>
                </div>
            </div>
        </div>
    </div>
</header>
