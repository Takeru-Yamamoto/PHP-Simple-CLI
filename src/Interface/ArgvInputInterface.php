<?php

namespace SimpleCli\Interface;

/**
 * ArgvInputのInterface
 * 
 * @package SimpleCli\Interface
 */
interface ArgvInputInterface
{
    /*----------------------------------------*
     * Constructor
     *----------------------------------------*/

    /**
     * コマンドラインから入力された引数を取得する
     * 
     * @return array<string|int, string|int>
     */
    public function arguments(): array;

    /**
     * スクリプト名を取得する
     * 
     * @return string
     */
    public function scriptName(): string;

    /**
     * コマンド名を取得する
     * 
     * @return string
     */
    public function commandName(): string;



    /*----------------------------------------*
     * Getter
     *----------------------------------------*/

    /**
     * argumentsプロパティのゲッター
     * 存在しない場合はnullを返す
     * 
     * @param int|string $name
     * @return int|string|null
     */
    public function get(string|int $name): int|string|null;



    /*----------------------------------------*
     * Check
     *----------------------------------------*/

    /**
     * argumentsプロパティに指定したkeyが存在するか確認する
     * 
     * @param int|string $name
     * @return bool
     */
    public function has(string|int $name): bool;

    /**
     * argumentsプロパティに指定したkeyの値が文字列かどうかを確認する
     * 
     * @param int|string $name
     * @return bool
     */
    public function isString(string|int $name): bool;

    /**
     * argumentsプロパティに指定したkeyの値が数値かどうかを確認する
     * 
     * @param int|string $name
     * @return bool
     */
    public function isInt(string|int $name): bool;
}
