<?php

use App\Image;
use App\Jobs\Media\UploadImage;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;
use App\Traits\ExecuteCommandTrait;

class SettingSeeder extends Seeder
{
    use ExecuteCommandTrait;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Setting::class)->create([
            'name' => 'name',
            'key' => 'name',
            'value' => 'Khai Pham Architecture',
            'type' => 'text',
            'default' => true,
        ]);

        factory(App\Setting::class)->create([
            'name' => 'title',
            'key' => 'title',
            'value' => 'Khai Pham Architecture | Noi That Decoks',
            'type' => 'text',
            'default' => true,
        ]);

        factory(App\Setting::class)->create([
            'name' => 'meta-title',
            'key' => 'meta-title',
            'value' => 'Khai Pham Architecture | Nội thất Decoks',
            'type' => 'text',
            'default' => true,
        ]);

        factory(App\Setting::class)->create([
            'name' => 'Facebook',
            'key' => 'facebook',
            'value' => 'https://www.facebook.com/khai.pham.169',
            'type' => 'text',
            'default' => true,
        ]);

        $logo = factory(App\Setting::class)->create([
            'name' => 'Logo',
            'key' => 'logo',
            'value' => null,
            'type' => 'image',
            'default' => true,
        ]);
        $logoImage = $this->uploadImage('source', 'logo.png');
        $logo->attachImage($logoImage);

        factory(App\Setting::class)->create([
            'name' => 'Phone',
            'key' => 'phone',
            'value' => '04-6259-7009 / 093-454-479 / 096-5555-966',
            'type' => 'text',
            'default' => true,
        ]);

        factory(App\Setting::class)->create([
            'name' => 'Email',
            'key' => 'email',
            'value' => 'noithatks07@gmail.com',
            'type' => 'text',
            'default' => true,
        ]);

        factory(App\Setting::class)->create([
            'name' => 'Address',
            'key' => 'address',
            'value' => '531 Trương Định, Hoàng Mai, Hà Nội',
            'type' => 'text',
            'default' => true,
        ]);

        factory(App\Setting::class)->create([
            'name' => 'meta-description',
            'key' => 'meta-description',
            'value' => 'Công ty cổ phần tư vấn và xây dựng Phạm Khải được thành lập từ ngày 08/08/2010,đến nay đã được gần 5 năm kinh nghiệm hoạt động và thi công trong  lĩnh vực nội thất. Với đội ngũ kiến trúc sư, thiết kế viên kinh nghiệm và  hùng hậu luôn đáp ứng những yêu cầu khắt khe nhất của khách hàng.',
            'type' => 'text',
            'default' => true,
        ]);

        factory(App\Setting::class)->create([
            'name' => 'About',
            'key' => 'about',
            'value' => 'Công ty cổ phần tư vấn và xây dựng Phạm Khải được thành lập từ ngày 08/08/2010,đến nay đã được gần 5 năm kinh nghiệm hoạt động và thi công trong  lĩnh vực nội thất. Với đội ngũ kiến trúc sư, thiết kế viên kinh nghiệm và  hùng hậu luôn đáp ứng những yêu cầu khắt khe nhất của khách hàng.',
            'type' => 'textarea',
            'default' => true,
        ]);
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
