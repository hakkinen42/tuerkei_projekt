<?php

use Illuminate\Database\Seeder;

use App\Post;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post = [
            'Programierung' => 'Programierung macht spaß',
            'Tanzen' => 'Tanzen tue ich sehr gern',
            'Laufen' => 'Frische Luft tut gut',
            'Laravel' => 'Laravel ist einfach und sehr mächtig',
            'PHP' => 'PHP ist sehr einfach',
            'Sonne und Strand' => 'Sonne tut immer gut',
            'JS' => 'js ist einfach'
        ];
        foreach($post AS $key => $value){
                $post = new Post(
                    [
                       'name' => $key,
                       'beschreibung' => $value,
                    ]);
                    $post->save();
        }
    }
}
