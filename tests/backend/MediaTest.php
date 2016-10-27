<?php

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class MediaTest extends AdminTestCase
{
    use WithoutMiddleware;

    /** @test */
    public function it_can_upload_image()
    {
        $file = $this->mockFile('image.png');
        $media = $this->call('POST', route('admin.media.image.store'), [], [], ['image' => $file])->original;

        $this->assertResponseOk();
        $this->assertTrue(\Storage::disk('image')->exists("{$media->filename}.{$media->extension}"));
    }

    /** @test */
    public function it_has_image_upload_max_size_constraint()
    {
        $file = $this->mockFile('10mb.jpg');
        $response = $this->call('POST', route('admin.media.image.store'), [], [], ['image' => $file], ['HTTP_X-Requested-With' => 'XMLHttpRequest']);
        $this->assertResponseStatus(422);
    }

    /** @test */
    public function it_can_only_upload_valid_image_type()
    {
        $file = $this->mockFile('doc.pdf');
        $response = $this->call('POST', route('admin.media.image.store'), [], [], ['image' => $file], ['HTTP_X-Requested-With' => 'XMLHttpRequest']);

        $this->assertResponseStatus(422);
    }

    /** @test */
    public function it_can_delete_media()
    {
        $file = $this->mockFile('image.png');
        $media = $this->call('POST', route('admin.media.image.store'), [], [], ['image' => $file], ['HTTP_X-Requested-With' => 'XMLHttpRequest'])->original;

        $this->delete( route('admin.media.destroy', ['id' => $media->id]) );
        $this->assertResponseOk();
        $this->assertTrue(! \Storage::disk('image')->exists("{$media->filename}.{$media->extension}"));
    }

    protected function mockFile($filename)
    {
        $file = new Illuminate\Http\UploadedFile(
            storage_path('app/tests/' . $filename),
            $filename,
            \Storage::disk('test')->getMimetype($filename),
            \Storage::disk('test')->getSize($filename),
            null,
            true
        );
        return $file;
    }

}
