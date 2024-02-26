<?php

namespace SimpleCli\Interface;

use SimpleCli\Interface\ApplicationInterface;
use SimpleCli\Interface\ArgvInputInterface;

/**
 * CommandのInterface
 * 
 * @package SimpleCli\Interface
 */
interface CommandInterface
{
    /*----------------------------------------*
     * Config
     *----------------------------------------*/

    /**
     * コマンド名を取得する
     * 
     * @return string
     */
    public function commandName(): string;

    /**
     * コマンドの説明文を取得する
     * 
     * @return string
     */
    public function description(): string;



    /*----------------------------------------*
     * Run
     *----------------------------------------*/

    /**
     * コマンドを実行する
     * 
     * @param \SimpleCli\Interface\ApplicationInterface $application
     * @param \SimpleCli\Interface\ArgvInputInterface $input
     * @return void
     */
    public function run(ApplicationInterface $application, ArgvInputInterface $input): void;
}
