<?php

namespace SimpleCli\Trait\Command;

use SimpleCli\Interface\ApplicationInterface;
use SimpleCli\Interface\ArgvInputInterface;

/**
 * Commandクラスで実行する処理を定義する
 * 
 * @package SimpleCli\Trait\Command
 * 
 * @method void setApplication(\SimpleCli\Interface\ApplicationInterface $input)
 * @method void setInput(\SimpleCli\Interface\ArgvInputInterface $input)
 * @method bool validate()
 * @method void failedValidation()
 */
trait Run
{
    /**
     * コマンドを実行する
     * 
     * @param \SimpleCli\Interface\ApplicationInterface $application
     * @param \SimpleCli\Interface\ArgvInputInterface $input
     * @return void
     */
    public function run(ApplicationInterface $application, ArgvInputInterface $input): void
    {
        // Applicationをセットする
        $this->setApplication($application);

        // 引数をセットする
        $this->setInput($input);

        // 引数をバリデーションする
        if (!$this->validate()) {
            // バリデーションに失敗した場合の処理
            $this->failedValidation();
            return;
        }

        // 処理実行
        $this->execute();
    }


    /**
     * 実行する処理
     * 
     * @return void
     */
    abstract protected function execute(): void;
}
