# README for REST MODULE#
Данный документ представляет инструкцию по использованию веб-сервиса, предоставляющего данные по заданным URL адресам.

## Используемые методы запросов: ##
* *GET*
* *POST*

## Поддерживаемый тип данных ##
* *JSON*


### Получение списка маркеров ###
Запрос на список использует метод GET.
Запрос - [/markers](/markers)
```
#!php
// Формат возвращаемого результата: 
[
  {
    "id": 1,
    "name": "Гора",
    "description": "Крутая гора для прыжков с парашютом",
    "date": "2016-10-13 11:41:58",
    "author_id": 1,
    "category_id": 1,
    "coordinate": "\"lat\":55.752063,\"lng\":37.608549",
    "rating": 4,
    "city_id": 1
  },
  ...
  {
    "id": {n},
    "name": "name{n}",
    "description": "description{n}",
    "date": "date{n}",
    "author_id": 1,
    "category_id": 1,
    "coordinate": "\"lat\":55.752063,\"lng\":37.608549",
    "rating": 5,
    "city_id": 15
  },
]
...
```

### Получение списка маркеров по ID города ###
Запрос на список использует метод GET.
Запрос - [/markers/?cityId={id}](/markers/?cityId={id})

```
#!php
// Формат возвращаемого результата: 
[
  {
    "id": 1,
    "name": "Гора",
    "description": "Крутая гора для прыжков с парашютом",
    "date": "2016-10-13 11:41:58",
    "author_id": 1,
    "category_id": 1,
    "coordinate": "\"lat\":55.752063,\"lng\":37.608549",
    "rating": 4,
    "city_id": 1
  }
]
```

### Добавление оценки (Рейтинга) ###
Использует метод POST.
Запрос - [/article/{article_id}/add_rating](/article/{article_id}/add_rating)

```
#!php
// Формат запроса: 
{
"id_article" = "1",
"user_id" = "1"
"rating" = "3",
}
```