<?php
/**
 * Copyright
 *
 * (c) Huang Yi <coodeer@163.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HuangYi\MySqlFulltext;

use HuangYi\MySqlFulltext\Schema\Blueprint;
use HuangYi\MySqlFulltext\Schema\MySqlGrammar;
use Illuminate\Contracts\Container\Container;

trait MySqlFulltextTrait
{
    /**
     * MySqlFulltextTrait constructor.
     *
     * @param \Illuminate\Contracts\Container\Container $app
     */
    public function __construct(Container $app)
    {
        $app['db']->connection()->setSchemaGrammar(new MySqlGrammar);
        $app['db']->connection()->getSchemaBuilder()->blueprintResolver(function ($table, $callback) {
            return new Blueprint($table, $callback);
        });
    }
}
