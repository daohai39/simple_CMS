<?php

use App\Image;
use App\Jobs\Media\UploadImage;
use App\Jobs\Slider\CreateSlider;
use App\Traits\ExecuteCommandTrait;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class SliderSeeder extends Seeder
{
    use ExecuteCommandTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->makeSlider(
            'Khai Pham Architecture',
            'Công ty chuyên thiết kế và thi công nội thất hiện đại, chuyên nghiệp...',
            'noi-that-phong-khach.jpg',
            route('frontend.slug.show', ['slug' => 'phong-khach'])
        );

        $this->makeSlider(
            'Nội thất phòng ngủ',
            'Phòng ngủ bé gái',
            'phong-con-gai.jpg',
            route('frontend.slug.show', ['slug' => 'phong-ngu'])
        );

        $this->makeSlider(
            'Nội thất phòng ngủ',
            'Phòng ngủ bé trai',
            'phong-con-trai.jpg',
            route('frontend.slug.show', ['slug' => 'phong-ngu'])
        );
    }

    public function makeSlider($heading, $description, $imageName, $url)
    {
        if($imageName)
            $image = $this->uploadImage('source', $imageName);

        $this->executeCommand(new CreateSlider([
            'id' => Uuid::uuid4()->toString(),
            'heading' => $heading,
            'description' => $description,
            'image_id' => isset($image) ? $image->id : [],
            'url' => $url,
        ]));
    }

    public function uploadImage($disk, $filename)
    {
        $file = explode('.', $filename);
        $name = $file[0];
        $extension = $file[1];

        $image = new Image();
        $image->id = Uuid::uuid4()->toString();
        $image->disk = $disk;
        $image->directory = '';
        $image->filename = $name;
        $image->extension = $extension;
        $image->mime_type = \Storage::disk($disk)->getMimeType($filename);
        $image->aggregate_type = 'image';
        $image->size = \Storage::disk($disk)->getSize($filename);

        return $this->executeCommand(new UploadImage([
            'id' => Uuid::uuid4()->toString(),
            'file' => $image->toArray(),
        ]));
    }
}
