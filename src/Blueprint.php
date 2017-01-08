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

use Illuminate\Database\Schema\Blueprint as BaseBlueprint;

class Blueprint extends BaseBlueprint
{
    /**
     * Specify a fulltext index for the table.
     *
     * @param  string|array  $columns
     * @param  string  $name
     * @return \Illuminate\Support\Fluent
     */
    public function fulltext($columns, $name = null)
    {
        return $this->indexCommand('fulltext', $columns, $name);
    }

    /**
     * Indicate that the given fulltext key should be dropped.
     *
     * @param  string|array  $index
     * @return \Illuminate\Support\Fluent
     */
    public function dropFulltext($index)
    {
        return $this->dropIndexCommand('dropFulltext', 'fulltext', $index);
    }
}
