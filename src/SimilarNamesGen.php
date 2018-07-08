<?php

namespace avtomon;

/**
 * Класс ошибок
 *
 * Class SimilarNamesGenException
 * @package avtomon
 */
class SimilarNamesGenException extends CustomException
{
}

/**
 * Класс реализующий функционал генерации имен похожих на поступившее на вход
 * путем добавления различных вариаций суффиксов
 *
 * Class SimilarNamesGen
 * @package avtomon
 */
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

    /**
     * Установить количество возвращаемых значений
     *
     * @param int $count
     */
    public function setCount(int $count): void
    {
        $this->count = $count;
    }

    /**
     * Установить набор суффиков
     *
     * @param array $additionalStrings
     */
    public function setAdditionalStrings(array $additionalStrings): void
    {
        $this->additionalStrings = $additionalStrings;
    }

    /**
     * Установить разделитель частей имен
     *
     * @param string $separator
     */
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
     * @param array $additionalStrings - какие подстроки можно добавлять
     * @param array $settings - настройки
     *
     * @return array
     */
    public static function staticNamesGenerator(string $existingName, array $additionalStrings, array $settings = []): array
    {
        $additionalStrings = array_filter($additionalStrings);

        if (!$additionalStrings) {
            return [];
        }

        if (empty($settings['count'])) {
            $settings['count'] = 7;
        }

        if (empty($settings['separator'])) {
            $settings['separator'] = '';
        }

        $strCount = \count($additionalStrings) - 1;
        $resultNames = [];
        $func = function ($func, $str) use (&$existingName, &$additionalStrings, &$strCount, &$settings, &$resultNames): void {
            for ($i = 0; $i <= $strCount; $i++) {
                if (!\in_array($additionalStrings[$i], $str, true) && \count($resultNames) < $settings['count']) {
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