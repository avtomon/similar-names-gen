<?php

/**
 * Класс реализующий функционал генерации имен похожих на поступившее на вход
 * путем добавления различных вариаций суффиксов
 */

namespace avtomon;

class SimilarNamesGenException extends \Exception
{
}

class SimilarNamesGen
{
    /**
     * Набор суффиков
     *
     * @var array
     */
    protected $additionalStrings = [];

    /**
     * Количество возвращаемых значений
     *
     * @var int
     */
    protected $count = 7;

    /**
     * Разделитель для частей имен
     *
     * @var string
     */
    protected $separator = '';

    /**
     * SimilarNamesGen constructor.
     *
     * @param array $additionalStrings - набор суффиков
     * @param int $count - количество возвращаемых значений
     * @param string $separator - разделитель для частей имен
     */
    public function __construct(array $additionalStrings = [], int $count = 7, string $separator = '')
    {
        $this->additionalStrings = $additionalStrings;
        $this->count = $count;
        $this->separator = $separator;
    }

    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    public function setAdditionalStrings(array $additionalStrings): void
    {
        $this->additionalStrings = $additionalStrings;
    }

    public function setSeparator(string $separator): void
    {
        $this->separator = $separator;
    }

    /**
     * Генератор в контексте объекта
     *
     * @param string $existingName - какому имени генерируем похожие
     *
     * @return array
     */
    public function objectNamesGenerator(string $existingName): array
    {
        return self::staticNamesGenerator($existingName, $this->additionalStrings, ['count' => $this->count, 'separator' => $this->separator]);
    }

    /**
     * Статический генератор
     *
     * @param string $existingName - какому имени генерируем похожие
     * @param int $count - количество возвращаемых значений
     * @param array $settings - настройки
     *
     * @return array
     */
    public static function staticNamesGenerator(string $existingName, array $additionalStrings, array $settings = []): array
    {
        if (!$additionalStrings) {
            return [];
        }

        if (empty($settings['count'])) {
            $settings['count'] = 7;
        }

        if (empty($settings['separator'])) {
            $settings['separator'] = '';
        }

        $strCount = count($additionalStrings) - 1;
        $resultNames = [];
        $func = function ($func, $str) use (&$existingName, &$additionalStrings, &$strCount, &$settings, &$resultNames): void {
            for ($i = 0; $i <= $strCount; $i++) {
                if (!in_array($additionalStrings[$i], $str) && count($resultNames) < $settings['count']) {
                    $tmp = array_merge($str, [$additionalStrings[$i]]);
                    $resultNames[] = implode($settings['separator'], array_merge([$existingName], $tmp));
                    $func($func, $tmp);
                }
            }
        };

        $func($func, []);

        return $resultNames;
    }
}