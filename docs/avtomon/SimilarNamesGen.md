<small>avtomon</small>

SimilarNamesGen
===============

Класс реализующий функционал генерации имен похожих на поступившее на вход
путем добавления различных вариаций суффиксов

Описание
-----------

Class SimilarNamesGen

Сигнатура
---------

- **class**.

Свойства
----------

class устанавливает следующие свойства:

- [`$additionalStrings`](#$additionalStrings) &mdash; Набор суффиков
- [`$count`](#$count) &mdash; Количество возвращаемых значений
- [`$separator`](#$separator) &mdash; Разделитель для частей имен

### `$additionalStrings` <a name="additionalStrings"></a>

Набор суффиков

#### Сигнатура

- **protected** property.
- Значение `array`.

### `$count` <a name="count"></a>

Количество возвращаемых значений

#### Сигнатура

- **protected** property.
- Значение `int`.

### `$separator` <a name="separator"></a>

Разделитель для частей имен

#### Сигнатура

- **protected** property.
- Значение `string`.

Методы
-------

Методы класса class:

- [`__construct()`](#__construct) &mdash; SimilarNamesGen constructor.
- [`setCount()`](#setCount) &mdash; Установить количество возвращаемых значений
- [`setAdditionalStrings()`](#setAdditionalStrings) &mdash; Установить набор суффиков
- [`setSeparator()`](#setSeparator) &mdash; Установить разделитель частей имен
- [`objectNamesGenerator()`](#objectNamesGenerator) &mdash; Генератор в контексте объекта
- [`staticNamesGenerator()`](#staticNamesGenerator) &mdash; Статический генератор

### `__construct()` <a name="__construct"></a>

SimilarNamesGen constructor.

#### Сигнатура

- **public** method.
- Может принимать следующий параметр(ы):
    - `$additionalStrings` (`array`) &mdash; - набор суффиков
    - `$count` (`int`) &mdash; - количество возвращаемых значений
    - `$separator` (`string`) &mdash; - разделитель для частей имен
- Ничего не возвращает.

### `setCount()` <a name="setCount"></a>

Установить количество возвращаемых значений

#### Сигнатура

- **public** method.
- Может принимать следующий параметр(ы):
    - `$count` (`int`)
- Ничего не возвращает.

### `setAdditionalStrings()` <a name="setAdditionalStrings"></a>

Установить набор суффиков

#### Сигнатура

- **public** method.
- Может принимать следующий параметр(ы):
    - `$additionalStrings` (`array`)
- Ничего не возвращает.

### `setSeparator()` <a name="setSeparator"></a>

Установить разделитель частей имен

#### Сигнатура

- **public** method.
- Может принимать следующий параметр(ы):
    - `$separator` (`string`)
- Ничего не возвращает.

### `objectNamesGenerator()` <a name="objectNamesGenerator"></a>

Генератор в контексте объекта

#### Сигнатура

- **public** method.
- Может принимать следующий параметр(ы):
    - `$existingName` (`string`) &mdash; - какому имени генерируем похожие
- Возвращает `array` value.

### `staticNamesGenerator()` <a name="staticNamesGenerator"></a>

Статический генератор

#### Сигнатура

- **public static** method.
- Может принимать следующий параметр(ы):
    - `$existingName` (`string`) &mdash; - какому имени генерируем похожие
    - `$additionalStrings` (`array`) &mdash; - какие подстроки можно добавлять
    - `$settings` (`array`) &mdash; - настройки
- Возвращает `array` value.

