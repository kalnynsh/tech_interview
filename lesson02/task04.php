<?php

namespace lesson02;

/**
* 4. Опишите несколько структур данных из стандартной библиотеки PHP (SPL).
*     Приведите примеры использования.
*/
/*
    SplDoublyLinkedList — Двусвязные списки (DLL) - это список узлов, связанных в обоих направлениях друг с другом.
        Операции итератора, доступ к обоим концам, добавление или удаление узлов стоимостью O(1).

    SplStack (Стек) extends SplDoublyLinkedList implements Iterator , ArrayAccess , Countable
    SplStack наследник SplDoublyLinkedList с iteration mode IT_MODE_LIFO
    (Last In First Out – последний зашел, первый ушел) и IT_MODE_KEEP

    SplQueue (Очередь) -  IT_MODE_FIFO (First In First Out)

    SplHeap — Куча - бинарное дерево, каждый узел больше или равен своим потомкам.
        Применяестся общий метод сравнения для всей кучи.
    SplMaxHeap потомок SplHeap — Сортировка кучи по убыванию
    SplMinHeap потомок SplHeap — Сортировка кучи по возрастанию
    SplPriorityQueue — Приоритетные очереди
    SplFixedArray — Массив с ограниченной длиной
    SplObjectStorage — Хранилище объектов
*/

echo 'SplStack' . PHP_EOL;
$stack = new \SplStack();

echo  $stack->getIteratorMode() . PHP_EOL; // 6

// добавляем элемент в стек
$stack->push('Pushkin');
$stack->push('Marshack');
$stack->push('Barto');
$stack->add(3, 'Achmadulina');

print_r($stack);
/*
SplStack Object
(
    [flags:SplDoublyLinkedList:private] => 6
    [dllist:SplDoublyLinkedList:private] => Array
        (
            [0] => Pushkin
            [1] => Marshack
            [2] => Barto
            [3] => Achmadulina
        )

)
*/
echo ''. PHP_EOL;

echo $stack->count() . PHP_EOL; // 4
echo $stack->top() . PHP_EOL; // Achmadulina
echo $stack->bottom() . PHP_EOL; // Pushkin
echo $stack->serialize() . PHP_EOL; // i:6;:s:7:"Pushkin";:s:8:"Marshack";:s:5:"Barto";:s:11:"Achmadulina";

// извлекаем элементы из стека
echo $stack->pop() . PHP_EOL; // Achmadulina
echo $stack->pop() . PHP_EOL; // Barto
echo $stack->pop() . PHP_EOL; // Marshack

$stack->push('Mayackovsky');
$stack->offsetExists(0) ? print($stack->offsetGet(0)) : print('offset 0 not exists');
echo PHP_EOL . '----------------------'. PHP_EOL;

// Возвращаем итератор в начало
echo $stack->rewind();

echo PHP_EOL . 'SplQueue' . PHP_EOL;

$queue = new \SplQueue();
$queue->setIteratorMode(\SplQueue::IT_MODE_DELETE);

$queue->enqueue('one');
$queue->enqueue('two');
$queue->enqueue('three');

$queue->dequeue();
$queue->dequeue();

echo $queue->top() . PHP_EOL;
echo '----------------------'. PHP_EOL;

echo PHP_EOL . 'SplMaxHeap' . PHP_EOL;
$maxHeap = new \SplMaxHeap();
$maxHeap->insert('111');
$maxHeap->insert('555');
$maxHeap->insert('999');

echo $maxHeap->extract() . PHP_EOL;
echo $maxHeap->extract() . PHP_EOL;
echo $maxHeap->extract() . PHP_EOL;

echo PHP_EOL . 'SplMinHeap' . PHP_EOL;
$minHeap = new \SplMinHeap();
$minHeap->insert('111');
$minHeap->insert('555');
$minHeap->insert('999');

echo $minHeap->extract() . PHP_EOL;
echo $minHeap->extract() . PHP_EOL;
echo $minHeap->extract() . PHP_EOL;

echo PHP_EOL . 'SplPriorityQueue' . PHP_EOL;
$queue = new \SplPriorityQueue();
$queue->setExtractFlags(\SplPriorityQueue::EXTR_DATA); // только значения
$queue->insert('F', 1);
$queue->insert('I', 2);
$queue->insert('S', 3);
$queue->insert('H', 4);

echo 'On top: '. $queue->top() . PHP_EOL;

while ($queue->valid()) {
    echo $queue->current() . PHP_EOL;
    $queue->next();
}

echo PHP_EOL . 'SplObjectStorage' . PHP_EOL;
$storage = new \SplObjectStorage();

$object1 = new \StdClass;
$object2 = new \StdClass;
$object3 = new \StdClass;

$storage[$object1] = 'Data for object 1';
$storage[$object2] = [9, 6, 2];
$storage[$object3] = 'Data for object 3';

var_dump($storage);
/*
class SplObjectStorage#2 (1) {
  private $storage =>
  array(3) {
    '000000007a8440fd000000001664588b' =>
    array(2) {
      'obj' =>
      class stdClass#6 (0) {
        ...
      }
      'inf' =>
      string(17) "Data for object 1"
    }
    '000000007a8440fc000000001664588b' =>
    array(2) {
      'obj' =>
      class stdClass#7 (0) {
        ...
      }
      'inf' =>
      array(3) {
        ...
      }
    }
    '000000007a8440f3000000001664588b' =>
    array(2) {
      'obj' =>
      class stdClass#8 (0) {
        ...
      }
      'inf' =>
      string(17) "Data for object 3"
    }
  }
}
*/
