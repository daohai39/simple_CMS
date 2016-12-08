<?php

use App\Traits\ExecuteCommandTrait;
use App\Jobs\Post\CreatePost;
use App\Post;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class PostSeeder extends Seeder
{
    use ExecuteCommandTrait;

    private $faker;

    public function __construct(Faker\Generator $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->makePosts();

        $this->executeCommand(new CreatePost([
            'id'               => (string) Uuid::uuid4(),
            'author'           => 'Khai Pham Architecture',
            'title'            => 'Giới Thiệu',
            'content'          => $this->faker->paragraph,
            'featured'         => false,
            'status'           => Post::STATUS_PUBLISH,
            'description'      => $this->faker->paragraph,
            'tags'             => [],
        ]));
    }

    private function makePosts($total = 30)
    {
        for($i = 0; $i < $total; $i++) {
            $this->executeCommand(new CreatePost([
                'id'               => (string) Uuid::uuid4(),
                'author'           => $this->faker->name,
                'title'            => $this->faker->sentence,
                'content'          => $this->faker->paragraph,
                'featured'         => $this->faker->randomElement([true, false]),
                'status'           => $this->faker->randomElement(Post::STATUSES),
                'description'      => $this->faker->paragraph,
                'tags'             => $this->faker->words(rand(0, 10)),
            ]));
        }
    }
}
