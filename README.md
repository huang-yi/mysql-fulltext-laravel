# MySQL-Fulltext-Laravel

MySQL很早以前就已经支持fulltext索引了，但是Laravel的Schema并没有为此提供便捷的创建方法，该拓展包就是为了解决这一痛点的：让Laravel的数据迁移优雅地创建MySQL的fulltext索引。

### 版本

由于目前只在Laravel5.3环境下测试过，所以暂时不支持其他版本，后续会更新。

 Fulltext | Laravel | PHP     
:---------|:--------|:--------
 1.0.x    | 5.3.*   | >=5.6.4 
 
 ### 安装
 
 方法一，直接使用`composer`安装：
 
 ```
 $ composer require huang-yi/mysql-fulltext-laravel:1.0.*
 ```

方法二，在项目根目录的`composer.json`的`require`属性添加：

```
{
    "require": {
        "huang-yi/mysql-fulltext-laravel": "1.0.*"
    }
}
```

然后运行：

```
$ composer update
```

### 使用

用`php artisan make:migration`命令生成迁移文件后，需要替换原有的Facade与Blueprint类。可参考以下代码：

```php
<?php

use HuangYi\MySqlFulltext\Blueprint;
use HuangYi\MySqlFulltext\Schema;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('content');
            $table->timestamps();

            $table->fulltext(['title', 'content']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
```

## 支持

Bugs和问题可提交至[Github](https://github.com/huang-yi/mysql-fulltext-laravel)，或者请联系作者黄毅（[coodeer@163.com](mailto:coodeer@163.com)）

## License

The MySQL-Fulltext-Laravel is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
