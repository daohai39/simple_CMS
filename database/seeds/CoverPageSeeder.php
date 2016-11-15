<?php

use App\Image;
use App\Jobs\CoverPage\CreateCoverPage;
use App\Jobs\Media\UploadImage;
use App\Traits\ExecuteCommandTrait;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class CoverPageSeeder extends Seeder
{
    use ExecuteCommandTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->makeCover(
            'Công ty chúng tôi',
            'Với đội ngũ thiết kế và kiến trúc sư lành nghề ,chúng tôi cung cấp cho khách hàng dịch vụ tốt nhất.',
            'van-phong.jpg',
            null
        );

        $this->makeCover(
            'Thiết kế nội thât',
            'Công ty chuyên thiết kế và thi công nội thất hiện đại, chuyên nghiệp...',
            'phong-bep.jpg',
            route('frontend.slug.show', ['slug' => 'noi-that'])
        );

        $this->makeCover(
            'Ngoại thất',
            'Thiết kế hiện đại theo phong cách Châu Âu',
            'ngoai-that.jpg',
            route('frontend.slug.show', ['slug' => 'ngoai-that'])
        );

        $this->makeCover(
            'Phòng xông hơi',
            'Chuyên thiết kế, thi công, lắp đặt phòng xông hơi chất lượng cao',
            'phong-xong-hoi.jpg',
            route('frontend.slug.show', ['slug' => 'phong-xong-hoi'])
        );
    }

    public function makeCover($heading, $content, $imageName, $url = null)
    {
        $image = $this->uploadImage('source', $imageName);

        $this->executeCommand(new CreateCoverPage([
            'id' => Uuid::uuid4()->toString(),
            'heading' => $heading,
            'content' => $content,
            'url' => $url,
            'image_id' => $image->id,
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
