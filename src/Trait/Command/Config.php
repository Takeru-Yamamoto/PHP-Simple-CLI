<?php

namespace SimpleCli\Trait\Command;

/**
 * Commandクラスの設定を定義する
 * 
 * @package SimpleCli\Trait\Command
 */
trait Config
{
    /**
     * コマンド名
     * 
     * @var string
     */
    protected string $commandName;

    /**
     * コマンドの説明文
     * 
     * @var string
     */
    protected string $description;


    /**
     * コマンド名を取得する
     * 
     * @return string
     */
    public function commandName(): string
    {
        return $this->commandName;
    }

    /**
     * コマンドの説明文を取得する
     * 
     * @return string
     */
    public function description(): string
    {
        return $this->description;
    }
}
