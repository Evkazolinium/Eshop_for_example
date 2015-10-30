# КРАТКИЕ ХАРАКТЕРИСТИКИ

- Проект представляет собой интернет-магазин с базовым функционалом. 
- Написан на "чистом" PHP. 
- Использовалась концепция MVC.

# ОПИСАНИЕ

В проекте реализована пользовательская и административная части. 

Пользовательская часть представленна: отображением каталога товаров, отображением отдельного товара, комментариями, сортировкой по категориям, личным кабинетом а также корзиной. 

Административная часть представленна: системой CRUD для товаров, категорий а также реализованно удаление и просмотр заказов.


# СТРУКТУРА ДЕРРИКТОРИИ

	config/	            конфигурации (настройки БД и пути) 
	core/               ядро проекта (здесь хранятся "базовые" классы)
	controllers/        контроллеры
	models/             модели
	views/              отображение
	upload/             загруженные элементы
	template/           CSS и JS подключаемые файлы
	index.php           представляет собой FrontController
