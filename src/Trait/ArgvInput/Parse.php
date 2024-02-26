<?php

namespace SimpleCli\Trait\ArgvInput;

/**
 * コマンドラインから入力された引数をパースする処理を管理する
 * 
 * @package SimpleCli\Trait\ArgvInput
 */
trait Parse
{
    /**
     * コマンドラインから入力された引数をパースする
     * 
     * @param array<string|int, string|int> $arguments
     * @return array<string|int, string|int>
     */
    protected function parseArguments(array $arguments): array
    {
        $parsedArguments = [];

        // argumentsが空になるまで繰り返す
        while (count($arguments) > 0) {
            // argumentsの先頭の値を取得
            $argument = array_shift($arguments);

            // argumentが"--"で始まる場合はオプションとして扱う
            if (preg_match("/^--/", $argument)) {
                // "--"を取り除く
                $argument = preg_replace("/^--/", "", $argument);

                // =が含まれる場合は=のargumentをkey、=の後のargumentをvalueとして扱う
                if (preg_match("/=/", $argument)) {
                    // =で分割
                    $argument = explode("=", $argument);

                    // keyとvalueを取得
                    $key   = array_shift($argument);
                    $value = array_shift($argument);

                    // keyとvalueをセット
                    $parsedArguments[$key] = $value;
                } else {
                    // =が含まれない場合はargumentsの先頭の値を取得
                    $value = array_shift($arguments);

                    // keyとvalueをセット
                    $parsedArguments[$argument] = $value;
                }

                // 次のループへ
                continue;
            }

            // argumentをセット
            $parsedArguments[] = $argument;
        }

        return $parsedArguments;
    }
}
