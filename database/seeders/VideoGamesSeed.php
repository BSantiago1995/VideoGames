<?php

namespace Database\Seeders;


use App\Models\VideoGame;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class VideoGamesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('video_games')->insert([
            'name'=>'Fornite',
            'price'=> '55',
            'quantity'=>'37',
            'photo'=>'upload-image/pEJo3zVa6TxgROvuI1xLzOKMjXKZhyQ5kxoRIkhC.jpg',
            'user_id' => 1,
            'categoria_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('video_games')->insert([
            'name'=>'Call Of Duty',
            'price'=> '27',
            'quantity'=>'12',
            'photo'=>'image/c8lHVMv8NrqX2iEmosyIfgwHUvYPwnahxYmPeAMT.jpg',
            'user_id' => 2,
            'categoria_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
