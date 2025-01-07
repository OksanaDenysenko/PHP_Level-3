<?php

namespace App\Seeder;

use App\Models\Repository\AuthorRepository;
use Core\Data\Database;
use Core\Data\Seeder;

class SeederAuthors extends Seeder
{
    /**
     * The function contains an array of data and runs seed() to insert the data
     * @return void
     */
    public function run(): void
    {
        $data = [
            ['full_name' => 'Андрей Богуславский'],
            ['full_name' => 'Марк Саммерфильд'],
            ['full_name' => 'М.Вильямс'],
            ['full_name' => 'Уэс Маккинни'],
            ['full_name' => 'Брюс Эккель'],
            ['full_name' => 'Томас Кормен'],
            ['full_name' => 'Чарльз Лейзерсон'],
            ['full_name' => 'Рональд Ривест'],
            ['full_name' => 'Клиффорд Штайн'],
            ['full_name' => 'Дэвид Флэнаган'],
            ['full_name' => 'Гэри Маклин Холл'],
            ['full_name' => 'Джеймс Р.Грофф'],
            ['full_name' => 'Люк Веллинг'],
            ['full_name' => 'Сергей Мастицкий'],
            ['full_name' => 'Джон Вудкок'],
            ['full_name' => 'Джереми Блум'],
            ['full_name' => 'А. Белов'],
            ['full_name' => 'Сэмюэл Грингард'],
            ['full_name' => 'Сет Гринберг'],
            ['full_name' => 'Александр Сераков'],
            ['full_name' => 'Тим Кедлек'],
            ['full_name' => 'Пол Дейтел'],
            ['full_name' => 'Харви Дейтел'],
            ['full_name' => 'Роберт Мартин'],
            ['full_name' => 'Энтони Грей'],
            ['full_name' => 'Мартин Фаулер'],
            ['full_name' => 'Прамодкумар Дж. Садаладж'],
            ['full_name' => 'Джей Макгаврен'],
            ['full_name' => 'Дрю Нейл'],
        ];

        $this->seed(new AuthorRepository(), $data);
    }
}