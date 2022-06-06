<p align="center"><a href="https://symfony.com" target="_blank">
    <img src="https://symfony.com/logos/symfony_black_02.svg">
</a></p>


Сборка
-------

1) docker-compose -f docker-compose-dev.yml up -d
2) docker exec -it  test_issue-web-1 bash
3) composer install
4) ./bin/console make:migration
5) ./bin/console doctrine:migrations:migrate
6) Далее есть команда ./bin/console app:start которая заполняет базу данных
криптовалютами из https://www.cryptocompare.com/. Параметры для api даннаго
ресурса можно изменить в .env CRYPTO_API_KEY - бесплатный ключ,CRYPTO_NAMES -
названия криптовалют которые загружаются и CRYPTO_CURRENCIES - валюты для
каждой криптовалюты
7) Чтобы запускать команду заполнения базы данных каждую минуту, нужно
добваить в corntab строку * * * * *  ./bin/console app:start
8) По ссылке /api/doc можно ознакомиться с документацие
9) Для получения криптовалют
GET ..../api/cryptos?name=BTC - отдает все по BTC
GET ..../api/cryptos?name=BTC&dateFrom=timestamp&dateTo=timestamp - для фильтро
по времени по умолчанию dateFrom = 0, dateTo = current_date, параметры dateFrom
и dateTo целы числа в формате timestamp

