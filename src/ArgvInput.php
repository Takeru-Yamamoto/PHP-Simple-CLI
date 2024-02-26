<?php

namespace SimpleCli;

use SimpleCli\Interface\ArgvInputInterface;

use SimpleCli\Trait\ArgvInput\Constructor;
use SimpleCli\Trait\ArgvInput\Parse;
use SimpleCli\Trait\ArgvInput\Getter;
use SimpleCli\Trait\ArgvInput\Check;

/**
 * コマンドラインから入力された引数を管理するクラス
 * 
 * @package SimpleCli
 */
class ArgvInput implements ArgvInputInterface
{
    use Constructor;
    use Parse;
    use Getter;
    use Check;
}
