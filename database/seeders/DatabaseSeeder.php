<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Like;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory()->create([
            'role' => 'admin',
            'name' => 'admin',
            'surname' => 'admin',
            'nickname' => 'admin',
            'email' => 'admin@admin.com',
        ]);



        $id_users = [];
        $id_images = [];
        $id_comments = [];

        for ($i = 0; $i < 10; $i++) {



            $nameAvatar = rand(11, 14) . '.jpg';

            $fileSeeder = Storage::disk('seeder')->get($nameAvatar);

            $path = 'user_cod' . time() . $nameAvatar;
            Storage::disk('avatar')->put($path, $fileSeeder);


            $user = User::factory()->create([
                'image'=>$path,
            ]);

            array_push($id_users, $user->id);


            $numImages = rand(0, 5);
            //cargar avatar para usuario











            for ($i_images = 0; $i_images < $numImages; $i_images++) {
                $nameFile = rand(1, 10) . '.jpg';
                $fileSeeder = Storage::disk('seeder')->get($nameFile);

                $path = 'user_' . $user->id . 'cod' . time() . $nameFile;
                Storage::disk('images')->put($path, $fileSeeder);

                $image = Image::factory()
                    ->create([
                        'user_id' => $user,
                        'image_path' => $path,
                    ]);
                array_push($id_images, $image->id);
            }
        }



        if (sizeof($id_images) > 0) {
            for ($i = 0; $i < sizeof($id_images); $i++) {
                $numComments = rand(0, 5);
                for ($i_comments = 0; $i_comments < $numComments; $i_comments++) {

                    $index_user = array_rand($id_users);
                    $index_image = array_rand($id_images);


                    $comment = Comment::factory()->create([
                        'user_id' => $id_users[$index_user],
                        'image_id' => $id_images[$index_image],
                    ]);
                    array_push($id_comments, $comment->id);
                }
            }
        }

        if (sizeof($id_comments) > 0) {


            for ($i_likes = 0; $i_likes < sizeof($id_comments); $i_likes++) {
                $index_user = array_rand($id_users);
                $index_image = array_rand($id_images);
                Like::factory()->create([
                    'user_id' => $id_users[$index_user],
                    'image_id' => $id_images[$index_image],
                ]);
            }
        }
    }
}
