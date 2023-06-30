<?php

namespace Database\Seeders;

use App\Models\Admin\StatusType;
use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $type = new StatusType();
        $type->name = 'post';
        $type->save();

        $type1 = new StatusType();
        $type1->name = 'user';
        $type1->save();

        DB::table('statuses')->insert([
            ['type_id' => $type->id, 'feather' => 'play',   'color' => 'success', 'ru_name' => 'опубликовано', 'name' => 'published'],
            ['type_id' => $type->id, 'feather' => 'pause',  'color' => 'warning', 'ru_name' => 'в ожидании',   'name' => 'pending'  ],
            ['type_id' => $type->id, 'feather' => 'edit',   'color' => 'info',    'ru_name' => 'изменено',     'name' => 'edited'   ],
            ['type_id' => $type->id, 'feather' => 'delete', 'color' => 'danger',  'ru_name' => 'отклонено',    'name' => 'denied'   ],
            ['type_id' => $type1->id, 'feather' => null,     'color' => null,      'ru_name' => 'активный',     'name' => 'active'   ],
            ['type_id' => $type1->id, 'feather' => null,     'color' => null,      'ru_name' => 'неактивный',   'name' => 'inactive' ],
        ]);
    }
}
