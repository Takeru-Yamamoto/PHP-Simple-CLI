<?php

namespace SimpleCli;

use SimpleCli\Interface\ApplicationInterface;

use SimpleCli\Trait\Application\AddCommand;
use SimpleCli\Trait\Application\RunCommand;

/**
 * コマンドラインからの入力に応じた処理を行うクラス
 * 
 * @package SimpleCli
 */
class Application implements ApplicationInterface
{
    use AddCommand;
    use RunCommand;
}
