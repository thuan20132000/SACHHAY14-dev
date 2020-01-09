<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        DB::table('theloais')->insert(
            [
                ['id'=>'1', 'tentheloai'=>'Tâm Lý - Kỹ Năng Sống'],
                 ['id'=>'2', 'tentheloai'=>'Kinh Tế - Quản Lý'],
                 ['id'=>'3', 'tentheloai'=>'Khoa Học - kỹ Thuật'],
                 ['id'=>'4', 'tentheloai'=>'Truyện Ngắn - Ngôn Tình'],
                 ['id'=>'5', 'tentheloai'=>'Tiểu Thuyết Phương Tây'],
                 ['id'=>'6', 'tentheloai'=>'Truyện Teen - Tuổi Học Trò']
            ]
            );
           

        for($i = 1; $i <= 10;$i++)
        {
        	// DB::table('admin_models')->insert(
	        // 	[
            //         'tendangnhap' => 'thuan'.$i,
            //         'hoten'=>'user_hoten'.$i,
	        //     	'password' => bcrypt('123'),
	        //     	'quyen'=> 0,
	        //     	'created_at' => new DateTime(),
	        // 	]
            // );
            
            // DB::table('users')->insert(
	        // 	[   
            //         'hoten' => 'user_'.$i,
            //         'tendangnhap'=>'user_hoten'.$i,
            //         'email'=>'email'.$i,
	        //     	'password' => bcrypt('123456'),
	        //     	'quyen'=> 0,
	        //     	'created_at' => new DateTime(),
	        // 	]
            // );

          
            

        }
        
        

        // $this->call(UsersTableSeeder::class);
    }
  
}
