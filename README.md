#Проект SMM
##Полезная информация
[Шаблон админки](https://coreui.io/demo/free/3.4.0/index.html)
___

###Документация
[Модули - Modules](https://nwidart.com/laravel-modules/v6/)
___
[Дебагбар](https://github.com/barryvdh/laravel-debugbar)
___
[Laravel IDE Helper Generator](https://github.com/barryvdh/laravel-ide-helper)
___
[Laravel-medialibrary](https://spatie.be/docs/laravel-medialibrary/v9/introduction)
___
[Laravel Localization](https://github.com/mcamara/laravel-localization)

##Модули приложения
___
##Нужно оформить Request и написать исключения
___
###MainPage - одуль главной страници
* оформление главной, админки и пользовательской страници
* Общий шаблон оформления Для всех остальных страниц
* Сайдбары

###Users - модуль пользователей
* Вывод списка пользователей и их прав
* Создание, редактирование, удаление, отключение, верификация.
* Основное оформление личного кабинета

###Pages - список статических страниц
* Вывод списка страниц
* Создание, редактирование, удаление, отключение, отношения.
* Основное оформлениея статических страниц
* Страница настроек
  * Размер картинок НУЖНО ДОДЕЛАТЬ

###Миграции
* php artisan migrate --path=/database/migrations - Сначала стандартные миграции, кторые вне модуля
* php artisan module:migrate Currency  - Очередность
* php artisan module:migrate  - Запустить все остальные
* php artisan module:migrate ProjectLimits - Почемуто не отработал
* php artisan db:seed - Прежде проверить и раскоментировать сиды
* php artisan module:seed Currency - Запустить Валюты


###News - страници новостей.
* Вывод списка страниц
* Создание, редактирование, удаление, отключение, отношения.
* Основное оформлениея статических страниц
* Страница настроек
    * Размер картинок
    * количество выводимых елементов на сраницу
    * т.д.
