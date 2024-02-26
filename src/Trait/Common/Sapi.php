<?php

namespace SimpleCli\Trait\Common;

/**
 * SAPIに関する処理を管理する
 * 
 * @package SimpleCli\Trait\Common
 */
trait Sapi
{
    /**
     * SAPI名を取得する
     * 
     * @return string
     */
    protected function sapiName(): string
    {
        return php_sapi_name();
    }

    /**
     * SAPIがCLIかどうかを返す
     * 
     * @return bool
     */
    protected function isCli(): bool
    {
        return $this->sapiName() === "cli";
    }

    /**
     * SAPIに応じた改行文字列を返す
     * 
     * @return string
     */
    protected function newLineString(): string
    {
        return $this->isCli() ? PHP_EOL : "<br />";
    }
}
