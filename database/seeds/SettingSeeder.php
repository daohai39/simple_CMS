<?php

use Illuminate\Database\Seeder;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Setting::class)->create([
            'name' => 'Facebook',
            'key' => 'facebook',
            'value' => 'http://facebook.com',
            'type' => 'text',
            'default' => true,
        ]);

        factory(App\Setting::class)->create([
            'name' => 'Logo',
            'key' => 'logo',
            'value' => 'link/to/logo',
            'type' => 'text',
            'default' => true,
        ]);

        factory(App\Setting::class)->create([
            'name' => 'Phone',
            'key' => 'phone',
            'value' => '04-6259-7009',
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
            'value' => '531 Trương Định ,Hoàng Mai ,Hà Nội',
            'type' => 'text',
            'default' => true,
        ]);

        factory(App\Setting::class)->create([
            'name' => 'meta-title',
            'key' => 'meta-title',
            'value' => 'Nội thất Decoks | Khai Pham Architecture',
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
}
