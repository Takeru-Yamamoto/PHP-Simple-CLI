<?php

namespace SimpleCli\Trait\ArgvInput;

/**
 * argumentsプロパティのゲッターを管理する
 * 
 * @package SimpleCli\Trait\ArgvInput
 * 
 * @property-read array<int|string, int|string> $arguments
 * 
 * @method bool has(string|int $name)
 */
trait Getter
{
    /**
     * argumentsプロパティのゲッター
     * 存在しない場合はnullを返す
     * 
     * @param int|string $name
     * @return int|string|null
     */
    public function get(string|int $name): int|string|null
    {
        return $this->has($name) ? $this->arguments[$name] : null;
    }

    /**
     * argumentsプロパティのゲッター
     * 存在しない場合はnullを返す
     * 
     * @param int|string $name
     * @return int|string|null
     */
    public function __get(string|int $name): int|string|null
    {
        return $this->get($name);
    }
}
