<?php

namespace SimpleCli\Trait\ArgvInput;

/**
 * ArgvInputクラスのコンストラクタを定義する
 * 
 * @package SimpleCli\Trait\ArgvInput
 * 
 * @method array<string|int, string|int> parseArguments(array $arguments)
 */
trait Constructor
{
    /**
     * コマンドラインから入力された引数
     * 
     * @var array<string|int, string|int>
     */
    protected array $arguments;

    /**
     * スクリプト名
     * 
     * @var string
     */
    protected string $scriptName;

    /**
     * コマンド名
     * 
     * @var string
     */
    protected string $commandName;


    /**
     * コンストラクタ
     * コマンドラインから入力された引数を取得し、成型した状態で保持する
     * コマンドライン以外からも実行できるようにするため、引数を受け取るようにしている
     * 
     * @param array<string>|array<string, string> $argv
     */
    function __construct(array $argv = [])
    {
        $arguments = empty($argv) ? $_SERVER["argv"] : $argv;

        // arguments[0]をスクリプト名として保持
        $this->scriptName  = array_shift($arguments);

        // arguments[1]をコマンド名として保持
        $this->commandName = empty($arguments) ? "" : array_shift($arguments);

        // arguments[2]以降をパースする
        $arguments = $this->parseArguments($arguments);

        $this->arguments = $arguments;
    }

    /**
     * コマンドラインから入力された引数を取得する
     * 
     * @return array<string|int, string|int>
     */
    public function arguments(): array
    {
        return $this->arguments;
    }

    /**
     * スクリプト名を取得する
     * 
     * @return string
     */
    public function scriptName(): string
    {
        return $this->scriptName;
    }

    /**
     * コマンド名を取得する
     * 
     * @return string
     */
    public function commandName(): string
    {
        return $this->commandName;
    }
}
