<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Market;
use App\Models\ServiceType;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $market = new Market();
        $market -> title = 'Металл';
        $market -> description = 'Прием, сдача, переработка металлолома';
        $market -> save();

        $market = new Market();
        $market -> title = 'Макулатура';
        $market -> description = 'Прием, сдача, переработка макулатуры';
        $market -> save();

        $market = new Market();
        $market -> title = 'Пластик';
        $market -> description = 'Прием, сдача, переработка пластика';
        $market -> save();

        $category = new Category();
        $category -> market_id = 1;
        $category -> title = 'Черный';
        $category -> description = 'Черный металл';
        $category -> save();

        $category = new Category();
        $category -> market_id = 1;
        $category -> title = 'Цветной';
        $category -> description = 'Цветной металл';
        $category -> save();

        $category = new Category();
        $category -> market_id = 1;
        $category -> title = 'Смешанный';
        $category -> description = 'Смешанный металл';
        $category -> save();

        SubCategory::insert([
            [
                "category_id" => 1,
                "title"       => 'Микс',
                "description" => "Cмешанный черный металл 3А, 5А, 12А без оцинковки",
                "price"       => "31000",
            ],
            [
                "category_id" => 1,
                "title"       => '3A',
                "description" => "Сталь, габаритные размеры не более 1500х500х500, толщина стенки от 4 мм",
                "price"       => "29200",
            ],
            [
                "category_id" => 1,
                "title"       => '5A',
                "description" => "Сталь, габаритные размеры не регламентируются, толщина стенки от 4 мм",
                "price"       => "29100",
            ],
            [
                "category_id" => 1,
                "title"       => '12A',
                "description" => "Сталь (жесть), толщина менее 4 мм",
                "price"       => "29200",
            ],
            [
                "category_id" => 1,
                "title"       => '12AC',
                "description" => "Сталь оцинкованная",
                "price"       => "29300",
            ],
            [
                "category_id" => 1,
                "title"       => '17A',
                "description" => "Габаритный чугун, размеры не более 800х500х500",
                "price"       => "29300",
            ],
            [
                "category_id" => 1,
                "title"       => '20A',
                "description" => "Негабаритный чугунный лом",
                "price"       => "29300",
            ],
            [
                "category_id" => 1,
                "title"       => 'ЖД',
                "description" => "Рельсовый лом (различного назначения)",
                "price"       => "31800",
            ],
            [
                "category_id" => 1,
                "title"       => '13А, 16А',
                "description" => "Проволока, трос, стружка (цена зависит от толщины, загрязнения, размера фракции)",
                "price"       => "25500",
            ],
            [
                "category_id" => 2,
                "title"       => 'Медь блеск (M1)',
                "description" => "Лом в виде проводников тока, медной проволоки без покрытия, отходы электротехнического производства без следов лужения, без отклонения по химическому составу (блеск).",
                "price"       => "650",
            ],
            [
                "category_id" => 2,
                "title"       => 'Медь кусок (M2)',
                "description" => "Лом и отходы меди (кусок) без покрытия, в виде брака литых кованных или штампованных изделий, обрезь, высечка листов, лент, труб, решеток или прутков полностью или частично окисленный.",
                "price"       => "620",
            ],
            [
                "category_id" => 2,
                "title"       => 'Медь микс (M3)',
                "description" => "Лом в виде проводников тока, медной проволоки без покрытия, отходы электротехнического производства без следов лужения, полностью или частично окисленный и/или обожженный без признаков пережога (шина)",
                "price"       => "610",
            ],
            [
                "category_id" => 2,
                "title"       => 'Медная стружка (M8)',
                "description" => "Стружка. За процент содержания меди.",
                "price"       => "590",
            ],
            [
                "category_id" => 2,
                "title"       => 'Медные, неочищенные провода',
                "description" => "Медные, неочищенные провода (в изоляции)",
                "price"       => "455",
            ],
            [
                "category_id" => 2,
                "title"       => 'Несортовой Алюминий (А6)',
                "description" => "Алюминиевый микс, моторные лома, разделанные головки двигателей, коробки, профиль с железом, отходы и т.д.",
                "price"       => "120",
            ],
            [
                "category_id" => 2,
                "title"       => 'Алюминиевый электротех (А2)',
                "description" => "Электротех. Разделанный кабель, провода.",
                "price"       => "155",
            ],
            [
                "category_id" => 2,
                "title"       => 'Алюминиевый профиль (А4)',
                "description" => "АД31 оконные рамы (профиль) без железа и пластика.",
                "price"       => "145",
            ],
            [
                "category_id" => 2,
                "title"       => 'Алюминий пищевой (А5)',
                "description" => "Кухонная посуда (без железа, грязи, масла, жира).",
                "price"       => "155",
            ],
            [
                "category_id" => 2,
                "title"       => 'Алюминий моторный (А6)',
                "description" => "Алюминиевый микс, моторные лома, разделанные головки двигателей, коробки, профиль с железом, отходы и т.д.",
                "price"       => "115",
            ],
            [
                "category_id" => 2,
                "title"       => 'Алюминиевые радиаторы',
                "description" => "Алюминиевые радиаторы",
                "price"       => "85",
            ],
            [
                "category_id" => 2,
                "title"       => 'Алюминиевые банки',
                "description" => "Алюминиевые банки",
                "price"       => "101",
            ],
            [
                "category_id" => 2,
                "title"       => 'Алюминиевые листы',
                "description" => "Офсет типографский, листовой алюминий",
                "price"       => "135",
            ],
            [
                "category_id" => 2,
                "title"       => 'Латунь МИКС (Л14)',
                "description" => "Все виды латуни (сантехника, производственные отходы и т.д), латунные радиаторы.",
                "price"       => "410",
            ],
            [
                "category_id" => 2,
                "title"       => 'Латунные радиаторы',
                "description" => "Латунные радиаторы",
                "price"       => "290",
            ],
            [
                "category_id" => 2,
                "title"       => 'Лом бронзы',
                "description" => "Лом бронзы",
                "price"       => "310",
            ],
            [
                "category_id" => 2,
                "title"       => 'Нержавейка 10%',
                "description" => "Нержавейка 10%",
                "price"       => "93",
            ],
            [
                "category_id" => 2,
                "title"       => 'Нержавейка 8%',
                "description" => "Нержавейка 8%",
                "price"       => "77",
            ],
            [
                "category_id" => 2,
                "title"       => 'Свинец кабельный',
                "description" => "Свинец кабельный",
                "price"       => "120",
            ],
            [
                "category_id" => 2,
                "title"       => 'Свинец кабельный грязный',
                "description" => "Свинец кабельный грязный",
                "price"       => "123",
            ],
            [
                "category_id" => 2,
                "title"       => 'Свинец переплав',
                "description" => "Свинец переплав",
                "price"       => "126",
            ],
            [
                "category_id" => 2,
                "title"       => 'Свинцовые грузики автомобильные',
                "description" => "Свинцовые грузики автомобильные",
                "price"       => "72",
            ],
            [
                "category_id" => 2,
                "title"       => 'Полипропиленовые аккумуляторы',
                "description" => "Полипропиленовые аккумуляторы",
                "price"       => "67",
            ],
            [
                "category_id" => 2,
                "title"       => 'Гелевые аккумуляторы',
                "description" => "Гелевые аккумуляторы",
                "price"       => "60",
            ],
            [
                "category_id" => 2,
                "title"       => 'Эбонитовые аккумуляторы',
                "description" => "Эбонитовые аккумуляторы",
                "price"       => "52",
            ],
            [
                "category_id" => 2,
                "title"       => 'Лом магния',
                "description" => "Лом магния",
                "price"       => "60",
            ],
            [
                "category_id" => 2,
                "title"       => 'ЦАМ',
                "description" => "ЦАМ",
                "price"       => "85",
            ],
            [
                "category_id" => 2,
                "title"       => 'Лом титана',
                "description" => "Лом титана",
                "price"       => "190",
            ],
            [
                "category_id" => 2,
                "title"       => 'Лом электродвигателей',
                "description" => "Лом электродвигателей",
                "price"       => "40",
            ],
            [
                "category_id" => 2,
                "title"       => 'Медный кабель (неочищенный)',
                "description" => "Медный кабель (неочищенный)",
                "price"       => "495",
            ],
            [
                "category_id" => 2,
                "title"       => 'Алюминиевый кабель (неочищенный)',
                "description" => "Алюминиевый кабель (неочищенный)",
                "price"       => "125",
            ],
            [
                "category_id" => 3,
                "title"       => 'Микс',
                "description" => "Микс",
                "price"       => "125",
            ],
        ]);


        $service = new ServiceType();
        $service -> title = 'Демонтаж';
        $service -> description = 'Демонтаж Металлоконструкций';
        $service -> save();

        $service = new ServiceType();
        $service -> title = 'Вывоз';
        $service -> description = 'Вывоз Металлолома';
        $service -> save();

        $service = new ServiceType();
        $service -> title = 'Переработка';
        $service -> description = 'Переработка Металлолома';
        $service -> save();

        $service = new ServiceType();
        $service -> title = 'Услуга 1';
        $service -> description = 'Услуга 1 Металлолома';
        $service -> save();

        $service = new ServiceType();
        $service -> title = 'Услуга 2';
        $service -> description = 'Услуга 2 Металлолома';
        $service -> save();


    }
}
