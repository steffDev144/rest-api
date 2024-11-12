Такс, для начала я использую openserver 5.x.x также на скриншоте настройки опен сервера а ниже данные от бд. Также бд для ипрота находиться в этом же архиве!

DB login - root password - root db_name - rest_api (utf8mb4_general_ci)

Далее расскажу про методы

getUsers - /users/ Получает всех существующих пользователей Метод GET

getUser - /users/1 Получает определенного пользователя по id Метод GET

addUser - /users/ Создает пользователя Метод POST

updateUser - /user/1 Изменяет данные пользователя по id Метод PATCH

deleteUser = /user/1 Удаляет пользователя по id Метод Delete
