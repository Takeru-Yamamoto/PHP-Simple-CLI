<?php

namespace SimpleCli\Trait\ArgvInput;

/**
 * argumentsプロパティに含まれる値に対する確認処理を管理する
 * 
 * @package SimpleCli\Trait\ArgvInput
 * 
 * @property-read array<int|string, int|string> $arguments
 */
trait Check
{
    /**
     * argumentsプロパティに指定したkeyが存在するか確認する
     * 
     * @param int|string $name
     * @return bool
     */
    public function has(string|int $name): bool
    {
        return isset($this->arguments[$name]);
    }

    /**
     * argumentsプロパティに指定したkeyの値が文字列かどうかを確認する
     * 
     * @param int|string $name
     * @return bool
     */
    public function isString(string|int $name): bool
    {
        return $this->has($name) && is_string($this->arguments[$name]);
    }

    /**
     * argumentsプロパティに指定したkeyの値が数値かどうかを確認する
     * 
     * @param int|string $name
     * @return bool
     */
    public function isInt(string|int $name): bool
    {
        return $this->has($name) && is_int($this->arguments[$name]);
    }
}
