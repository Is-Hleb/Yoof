## Category 
Эта модель служит для определения категории товаров, 
категория -- это общая модель, которая имеет продукты,
описание их базовый свойста 

## Product 
Эта модель включает в себя имя продукта, его цену и другие возможные свойста 
Она имеет множется свойств, которые заданы в таблице **properties**

## Property 
Эта модель содеожит описание отдельного продукта, она относится к продукту,
к свойтву категории

## CategoryProperty 
Эта модель относитя только к категории, она описывает одно конкретное свойство категории

<img src="./Z_models.png" alt="Вид БД">