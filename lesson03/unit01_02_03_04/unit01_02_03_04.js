// 1.) Что выведет alert(typeof NaN); ?

alert(typeof NaN); // "number"

// 2.) Что выведет alert(NaN === NaN); ?

alert(NaN === NaN); // false

// 3.) 0.1 + 0.2 == 0.3 ?

console.log(0.1 + 0.2 == 0.3); // false - ошибка округления двоичных чисел

// 4.) Какой тип будет иметь переменная a, если она создается при помощи следующего кода:

var a = "a,b".split(',');

console.log(a); // ['a', 'b']
