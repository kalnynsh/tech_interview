<?php

namespace lesson02;

/*
 2. Как реализуется паттерн Фабричный метод?

    В чем его отличие от паттерна Абстрактная Фабрика?
*/
/*
 Создается интерфейс определяющий interface Product для объектов, которые
 может произвести базовый (родительский) класс Creator (Создатель) и его
 подклассы (наследники) ConcreteCreatorA, ConcreteCreatorB.

 Каждый из ConcreteCreatorA, ConcreteCreatorB реализует Product interface,
 каждый по своему в createProduct(): Product.

 Абстрактная Фабрика служит для создания ряда семейств продуктов, описываемых
 отдельными иерахиями классов. Семейство продуктов реализует единый интерфейс.

 Отличие Фабричного метода от Абстрактной Фабрики в том, что Фабричного метод
 служит для создания одного конкретного объекта продукта (Button), а Абстрактная Фабрика
 реализует ряд методов по созданию нескольких семейств продуктов (Button, Checkbox, ..) в
 зависимости от конфирурации приложения (OS: Windows, Mac, Linux).
*/
