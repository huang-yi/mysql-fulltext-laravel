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

use Illuminate\Support\Facades\Facade;

class Schema extends Facade
{
    /**
     * Get a schema builder instance for the default connection.
     *
     * @return \Illuminate\Database\Schema\Builder
     */
    protected static function getFacadeAccessor()
    {
        $connection = static::$app['db']->connection();
        $connection->setSchemaGrammar(new MySqlGrammar);

        $schema = $connection->getSchemaBuilder();
        $schema->blueprintResolver(function ($table, $callback) {
            return new Blueprint($table, $callback);
        });

        return $schema;
    }
}