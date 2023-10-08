## REST API - Laravel

Разработка REST API для записной книжки. структура методов:

```
1.1. GET /api/v1/notebook/
1.2. POST /api/v1/notebook/
1.3. GET /api/v1/notebook/<id>
1.4. POST /api/v1/notebook/<id>
1.5. DELETE /api/v1/notebook/<id>
```

Поля для POST запискной книжки:

```
1. ФИО (обязательное)
2. Компания
3. Телефон (обязательное)
4. Email (обязательное)
5. Дата рождения 
6. Фото
```

Что имеется:

- Пагинация;
- Swagger для отображения методов api;
- Запуск проекта с Docker.
