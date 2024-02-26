<?php

namespace SimpleCli\Trait\Command;

use SimpleCli\Interface\ArgvInputInterface;

/**
 * コマンドの引数を管理する
 * 
 * @package SimpleCli\Trait\Command
 * 
 * @method void output(string $message)
 */
trait Input
{
    /**
     * Applicationから受け取った引数
     * 
     * @var \SimpleCli\Interface\ArgvInputInterface
     */
    private ArgvInputInterface $input;


    /**
     * 引数をセットする
     * 
     * @param \SimpleCli\Interface\ArgvInputInterface $input
     * @return void
     */
    protected function setInput(ArgvInputInterface $input): void
    {
        $this->input = $input;
    }

    /**
     * 引数をバリデーションする
     * 
     * @return bool
     */
    protected function validate(): bool
    {
        return true;
    }

    /**
     * 引数のバリデーションに失敗した場合の処理
     * 
     * @return void
     */
    protected function failedValidation(): void
    {
        $this->output("Argument validation failed.");
    }

    /**
     * 引数を取得する
     * 
     * @return \SimpleCli\Interface\ArgvInputInterface
     */
    protected function input(): ArgvInputInterface
    {
        return $this->input;
    }
}
