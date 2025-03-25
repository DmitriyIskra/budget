## Инструкция
1. Статьи дохода выпадающий список те что есть, заполняются из базы данных, а также видны на странице Статьи дохода 
(поидее, величина постоянная от месяца к месяцу). (это сохраненные данные, как шаблон)
2. Статьи расхода выпадающий список те что есть, заполняются из базы данных, а также видны на странице Статьи расхода
тоже в принципе постоянны, просто можно корректировать.(это сохраненные данные, как шаблон)
3. В статьях отражается сумма которая приходит полностью, не уменьшается, уменьшается баланс

4. Ниже в левую часть списка попадают статьи расхода,которые еще не проведены.
В правую которые проведены и от них уже считается остаточный баланс

5. Поэтому сначала мы заполняем статьи дохода от них сумируется баланс
6. Потом статьи расхода от них заполняется список планируемых расходов и в дальнейшем минусуется от баланса при проведении.

7. Для перехода в следующий месяц, проведенные расходы удаляются перезаполняется список планируемых расходов, обновляется (пересчитывается) баланс из доходов

БАЗА ДАННЫХ
Статьи доходов name summ
Статьи поланируемых расходов
Статьи проведенных расходов

СТАТЬИ ДОХОДА
8. Кнопка Изменить сумму меняет корректирует сумму по выбранному доходу
9. + добавляет доход
10 - удаляет доход
11. Обнуляет суммы и пересчитывает баланс исходя из наличия и суммы проведенных расходов

12. Открыть все, ведет на страницу с доходами или расходами.

13. Все расчеты ведуться на бекенде и возвращаются данные, js только отрисовывает

14. баланс отображается из базы данных

## Конфигурация приложения:
Панель админа
Панель пользователя

Планы на развитие
1/      для контроллера authForms добавить enum
2/ для передаваемых параметров, например id добавить проверку по регулярном выражению в boot в AppServiceProvider
3/ если нужно использовать обозначение не обязательных параметров
4/ При открытии страницы например с данными пользователя использовать явную или не явную привязку модели
5/ Подменять методы форм для поддержки REST (скрытые поля форм PUT и тд)
6/       Выводить ошибки в blade шаблоне (должны быть кастомными)
7/       Сделать автонаполнение базы
8/ Если пользователь админ показывать ему кнопку перехода в админку (защитить эту страницу, только для админов)
9/ Ограничитель запросов
10/ Переделать стандартные сообщения об ошибках через js
11/ Касты на дату например 
12/ Carbon
13/ Отправка EMAIL при регистрации

!!! ЧИТАТЬ и Смотреть
Остановился читать на посредниках
Модели
Отношения
Миграции 
Валидация (Requests это валидации форм)


!!! ОСТАНОВИЛСЯ


!!! ДЕЛАТЬ
Читать все вышеуказанное
Зарегистрировать пользователя
Роли
Сделать страницу board
Layout



/ при развертывании на сервере использовать кеш маршрутов

- Ограничители запросов в Laravel


КОМАНДЫ ARTISAN
php artisan lang:publish - опубликовать языковые файлы (например: тексты ошибок, информационных сообщений)

ДЕПЛОЙ
ВАЖНО если в консоли нужно использовать нужную версию то скрипты вызываются через указание версии
для beget - php8.2 ..скрипт..
для timeweb - /opt/php56/bin/php имя_скрипта.php где 56 это версия 5.6
Например: /opt/php82/bin/php --version  -  получим версию php
На каком хостинге что использовать смотреть инструкцию к хостингу
 
1. устанавливаем composer.phar
в проект
Так как на хостинге возможно используется composer версии ниже 2. (можно проверить в консоли), 
а обновить composer мы не можем, устанавливаем его локально
2. удаляем public_html, переносить будем в папку с сайтом
3. связываем хостинг и git репозиторий по ssh чтобы можно было сделать git clone
 a. в нужном репозитории заходим в settings вкладка Deploy keys, кнопка add deploy key
 b. в консоли хостинга вводим ssh-keygen (если в первый раз, если деплоим не в первый, то ключи уже есть и мы можем их перезаписать, это чревато последствиями, тогда нужно обратиться к уже существующему файлу с публичными ключами(есть еще приватные ключи))
 со всем соглашаемся
 с. cat ...путь к публичному файлу с ключами..
 d. вносим этот ключ на гитхаб в deploy keys
 галочку лучше не ставить, это можно ли редактировать гитхаб из хостинга, обычно этого не делается,
 но если будем редактировать код на хостинге и запушивать на гит, тогда ставим.
5. конфигурируем символические ссылки
это ссылки (файлы) которые при обращении к ним переадресуют в по указанному адресу
так как у нас нет public_html, а основной файл лежит в паке public в проекте, нужна символическая ссылка
 a. заходим в config>filesystems.php листаем вниз, там есть массив links - это и есть конфигуратор символических ссылок в ларавел
 b. добавляем строку base_path('public_html') => base_path('public')
    команда php artisan storage:link - сконфигурирует ссылку и она появится в корне проекта
    php artisan storage:unlink - уничтожит сконфигурированные ссылки
    это нужно сделать в консоли хостинга
 с. обязательно добавляем в .gitignore
 
4. клонируем содержимое репозитория на хостинг, в консоли git clone ... . - точка означает что клонируем в данную папку
5. далее на хостинге с помощью composer.phar устанавливаем зависимости (папка vendor)
   /opt/php82/bin/php composer.phar install
6. конфигурируем символические ссылки
   в консоли на хостинге php artisan storage:link - конфигурируем ссылки
   в нашем случае /opt/php82/bin/php artisan storage:link

APP_ENV=production
APP_DEBUG=false
APP_KEY= может быть пустым, тогда /opt/php82/bin/php artisan key:generate
LOG_CHANNEL=daily - чтобы каждый день создавался новый файл с логами, а не копилось все в одном файле
DB_HOST=127.0.0.1 - для open server там нужно MySQL-8.2, соответственно меняем
если в пароле есть разные символы лучше его записать в кавычках
https://www.youtube.com/watch?v=yo3FqtA2J9c

переписать в конспектах
разобраться как автоматизировать деплой, новой версии - https://www.youtube.com/watch?v=4WEUYuIIdxQ
как найти файлы ssh
деплой реакт

Получить уже созданный когда то публичный ключ ssh можно cat ~/.ssh/id_rsa.pub
приватный cat ~/.ssh/id_rsa
