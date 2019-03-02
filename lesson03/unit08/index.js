/** 8. Привести пример замыкания. */
/** Замыкание - это функция со всеми внешними переменными, которые ей доступны */

/*
    Все переменные и параметры функций являются свойствами объекта переменных LexicalEnvironment.
    Каждый запуск функции создает новый такой объект.
    На верхнем уровне им является «глобальный объект», в браузере – window.
    При создании функция получает системное свойство [[Scope]],
    которое ссылается на LexicalEnvironment, в котором она была создана.
    При вызове функции, куда бы её ни передали в коде – она будет искать переменные сначала у себя,
    а затем во внешних LexicalEnvironment с места своего «рождения».
*/

function sayHiBye(firstName, lastName) {
    alert('Hello, ' + getFullName());
    alert('Bey, ' + getFullName());

    function getFullName() { // getFullName.[[Scope]] = объект переменных sayHiBye
        return firstName + ' ' + lastName; // firstName, lastName - получаем из замыкания
    }
}

sayHiBye('John', 'Dohe');

function makeCounter() {
    // LexicalEnvironment = {currentCount: undefined}

    var currentCount = 1;
    // LexicalEnvironment = {currentCount: 1}

    return function() { // [[Scope]] -> LexicalEnvironment
        return currentCount++;
    }
}

var counter1 = makeCounter();
alert(counter1()); // [[Scope]] -> {currentCount: 1}
alert(counter1()); // [[Scope]] -> {currentCount: 2}

var counter2 = makeCounter(); // Создание нового объекта
alert(counter2()); // [[Scope]] -> {currentCount: 1}, не зависит от 1-го
alert(counter2()); // [[Scope]] -> {currentCount: 1}
