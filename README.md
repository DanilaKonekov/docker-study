# Условия задачи.
--------------------------------------------------------
У поставщика есть карточки товара (название, артикул, фиксированная цена розницы)
Поставщику скидывают производители прайслисты (название, цена товара опт, цена товара розница, артикул)

Нужно составить сделать таблицу сопоставления товаров
Нужно сделать команду которая будет выводить списком карточки товара (название, артикул, цена товара опт, цена товара розница)

## Правила формирования цен:
Изначально цена null.  
Если цена товара null, то устанавливаем эту цену опт и розницы карточке товара.  
Если цена товара опт ниже, то устанавливаем эту цену опт и розницы карточке товара.  
Если цена товара опт выше, то ничего не делаем.

## 3 таблицы рабочих

product_cards

source_items

concurrency

## 2 модели должно получиться

ProductCard
SourceItem


# Ход выполнения поставленной задачи и условий:  
---------------------------------------------------------

1.1. Начало работы с Docker и Laravel, так как папки для Laravel уже были созданы, необходимо запустить контейнеры с помощью docker, это делается командой:  
`docker-compose up -d`  
1.2. Далее необходимо перейти в контейнер `php-fpm` командой:  
`docker exec -it php-fpm sh`  

2.1.Создаем миграцию для таблицы product_cards с помощью команды:  
`php artisan make:migration create_product_cards_table --create=product_cards`  
Затем внесем необходимые изменения в созданный файл миграции для определения структуры таблицы product_cards.  
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('product_cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('article_number');
            $table->decimal('retail_price', 8, 2)->nullable()->default(null);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_cards');
    }
};
```  
2.2 Создайте миграцию для таблицы source_items с помощью команды:  
`php artisan make:migration create_source_items_table --create=source_items`
Внесем необходимые изменения в созданный файл миграции для определения структуры таблицы source_items.  
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('source_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('opt_price', 8, 2);
            $table->decimal('retail_price', 8, 2)->nullable()->default(null);
            $table->string('article_number');
            $table->unsignedBigInteger('product_card_id');
            $table->timestamps();

            $table->foreign('product_card_id')->references('id')->on('product_cards')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('source_items');
    }
};
```  
2.3 Создаем миграцию для таблицы concurrency с помощью команды:  
`php artisan make:migration create_concurrency_table --create=concurrency`  
Внесите необходимые изменения в созданный файл миграции для определения структуры таблицы concurrency.  
```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('concurrency', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_card_id');
            $table->unsignedBigInteger('source_item_id');
            $table->decimal('wholesale_price', 8, 2);
            $table->decimal('retail_price', 8, 2);
            $table->timestamps();

            $table->foreign('product_card_id')->references('id')->on('product_cards')->onDelete('cascade');
            $table->foreign('source_item_id')->references('id')->on('source_items')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('concurrency');
    }
};
```  
2.4 Запустим миграции для создания таблиц в базе данных с помощью команды:   
`php artisan migrate`  
3.1 Создадим модель данных ProductCard  
Для этого воспользуемся командой:  
`php artisan make:model ProductCard`  
Далее внесем изменения в код созданной модели:  
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCard extends Model
{
    protected $fillable = ['name', 'article_number', 'retail_price'];

    public function sourceItems()
    {
        return $this->belongsToMany(SourceItem::class, 'concurrency')
            ->withPivot('wholesale_price', 'retail_price')
            ->withTimestamps();
    }
}
```
3.2 Создадим модель данных SourceItem  
Для этого воспользуемся командой:  
`php artisan make:model SourceItem`  
Далее внесем изменения в код созданной модели:  
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SourceItem extends Model
{
    protected $fillable = ['name', 'article_number', 'opt_price', 'retail_price'];

    public function productCards()
    {
        return $this->belongsToMany(ProductCard::class, 'concurrency')
            ->withPivot('opt_price', 'retail_price')
            ->withTimestamps();
    }
}
```  
3.3 Создадим модель данных SourceItem  
Для этого воспользуемся командой:  
`php artisan make:model SourceItem`  
Далее внесем изменения в код созданной модели:
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SourceItem extends Model
{
    protected $fillable = ['name', 'article_number', 'opt_price', 'retail_price'];

    public function productCards()
    {
        return $this->belongsToMany(ProductCard::class, 'concurrency')
            ->withPivot('opt_price', 'retail_price')
            ->withTimestamps();
    }
}
```
3.4 Создадим модель данных Concurrency  
Для этого воспользуемся командой:  
`php artisan make:model Concurrency`  
Далее внесем изменения в код созданной модели:  
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concurrency extends Model
{
    protected $fillable = [
        'product_card_id',
        'concurrent_product_card_id',
        'competitor_name',
        'price_difference'
    ];
}
```  
4.1 Наполним нашу базу данных ProductCards с помощью seeders  
Для этого создадим seeders с помощью команды 
`php artisan make:seeder ProductCardsTableSeeder`  
После выполнения команды будет создан файл ProductCardsTableSeeder.php в папке database/seeders нашего проекта Laravel.  
Откроем созданный файл ProductCardsTableSeeder.php и внесем необходимые изменения для наполнения таблицы product_cards данными. Примерный вид файла:  
```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCard;

class ProductCardsTableSeeder extends Seeder
{
    public function run()
    {
        // Создание карточек товаров
/*        ProductCard::create([
            'name' => 'Товар 1',
            'article_number' => '123456',
            'retail_price' => 5.99,
        ]);

        ProductCard::create([
            'name' => 'Товар 2',
            'article_number' => '789012',
            'retail_price' => 19.99,
        ]);*/
        ProductCard::create([
            'name' => 'Товар 3',
            'article_number' => '345678',
            'retail_price' => null,
        ]);

        ProductCard::create([
            'name' => 'Товар 4',
            'article_number' => '901234',
            'retail_price' => 29.99,
        ]);
    }
}
```
4.2 Наполним нашу базу данных SourceItems с помощью seeders  
Для этого создадим seeders с помощью команды 
`php artisan make:seeder SourceItemsTableSeeder`  
После выполнения команды будет создан файл SourceItemsTableSeeder.php в папке database/seeders нашего проекта Laravel.  
Откроем созданный файл SourceItemsTableSeeder.php и внесем необходимые изменения для наполнения таблицы sourceitems данными. Примерный вид файла:  
```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SourceItem;
use Illuminate\Database\Eloquent\Factories\Factory;
class SourceItemsTableSeeder extends Seeder
{
    public function run()
    {
/*        SourceItem::create([
            'name' => 'Элемент 1',
            'opt_price' => 5.99,
            'retail_price' => 4.99,
            'article_number' => '123456',
            'product_card_id' => 1,
        ]);

        SourceItem::create([
            'name' => 'Элемент 2',
            'opt_price' => 15.99,
            'retail_price' => 19.99,
            'article_number' => '789012',
            'product_card_id' => 2,
        ]);*/
        SourceItem::create([
            'name' => 'Элемент 3',
            'opt_price' => 10.99,
            'retail_price' => null,
            'article_number' => '345678',
            'product_card_id' => 1,
        ]);

        SourceItem::create([
            'name' => 'Элемент 4',
            'opt_price' => 25.99,
            'retail_price' => null,
            'article_number' => '901234',
            'product_card_id' => 2,
        ]);
    }
}
```
4.3 Наполним нашу базу данных Concurrency с помощью seeders  
Для этого создадим seeders с помощью команды 
`php artisan make:seeder ConcurrencySeeder`  
После выполнения команды будет создан файл ConcurrencySeeder.php в папке database/seeders нашего проекта Laravel.  
Откроем созданный файл ConcurrencySeeder.php и внесем необходимые изменения для наполнения таблицы concurrency данными. Примерный вид файла:  
```php
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductCard;
use App\Models\SourceItem;

class ConcurrencySeeder extends Seeder
{
    public function run()
    {
        $productCards = ProductCard::all();
        $sourceItems = SourceItem::all();

        foreach ($productCards as $productCard) {
            foreach ($sourceItems as $sourceItem) {
                $existingPivot = $productCard->sourceItems()->where('source_item_id', $sourceItem->id)->first();

                if (!$existingPivot) {
                    // Если цена товара null, то устанавливаем эту цену опт и розницы карточке товара.
                    // Если у карточки товара есть фиксированная цена, устанавливаем ее как розничную цену.
                    // Иначе оставляем цены прайслиста без изменений.
                    $wholesalePrice = $sourceItem->opt_price;
                    $retailPrice = $sourceItem->retail_price;
                    if ($productCard->retail_price !== null) {
                        $retailPrice = $productCard->retail_price;
                    } else {
                        $retailPrice = 0.00;
                    }

                    $productCard->sourceItems()->attach($sourceItem, [
                        'wholesale_price' => $wholesalePrice,
                        'retail_price' => $retailPrice,
                    ]);
                }
            }
        }
    }
}
```
-----------------------------------------------
# Команда для вывода списка карточек товаров  
----------------------------------------------
Создаем команду с помощью команды:  
`php artisan make:command ProductCardListCommand`  
Внесем необходимые изменения в созданный файл команды ProductCardListCommand.php для реализации логики вывода списка карточек товаров. Примерный вид файла:  
```php
<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ProductCard;
use App\Models\SourceItem;

class ProductCardListCommand extends Command
{
    protected $signature = 'product-card:list';

    protected $description = 'Display a list of product cards with prices';

    public function handle()
    {
        $productCards = ProductCard::with('sourceItems')->get();

        foreach ($productCards as $productCard) {
            $this->info("Product Card: {$productCard->name} (Article: {$productCard->article_number})");
            $this->line('----------------------------------');
            $this->line('Source Items:');

            foreach ($productCard->sourceItems as $sourceItem) {
                $wholesalePrice = $sourceItem->pivot->wholesale_price;
                $retailPrice = $sourceItem->pivot->retail_price;

                $this->line(" - Name: {$sourceItem->name}");
                $this->line("   Article: {$sourceItem->article_number}");
                $this->line("   Wholesale Price: {$wholesalePrice}");
                $this->line("   Retail Price: {$retailPrice}");
                $this->line('----------------------------------');
            }

            $this->line('');
        }
    }
}
```
Необходимо зарегистрировать нашу команду в Kernel.php.  
Для этого откроем файл Kernel.php и внесем в него правки:  
```php
<?php

namespace App\Console;

use App\Models\User;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
    protected $commands = [
        \App\Console\Commands\ProductCardListCommand::class,
    ];
}
```
Мы можем запустить команду для вывода списка карточек товаров через консоль Laravel при помощи следующей команды:  
`php artisan product-cards:list`  
Эта команда выведет на экран список карточек товаров со связанными товарами (название, артикул, цена опт, цена розница), взятых из базы данных.  
