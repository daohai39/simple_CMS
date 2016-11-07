<?php

use App\Jobs\Category\CreateCategory;
use App\Traits\ExecuteCommandTrait;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class CategorySeeder extends Seeder
{
    use ExecuteCommandTrait;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->executeCommand(new CreateCategory(['id' => Uuid::uuid4()->toString(), 'name' => 'Sản phẩm thông minh']));

        $saunaId = Uuid::uuid4()->toString();
        $this->executeCommand(new CreateCategory(['id' => $saunaId, 'name' => 'Phòng xông hơi']));
        $this->executeCommand(new CreateCategory(['id' => Uuid::uuid4()->toString(), 'name' => 'Phòng xông khô', 'parent_id' => $saunaId]));
        $this->executeCommand(new CreateCategory(['id' => Uuid::uuid4()->toString(), 'name' => 'Phòng xông ướt', 'parent_id' => $saunaId]));

        $indoorId = Uuid::uuid4()->toString();
        $this->executeCommand(new CreateCategory(['id' => $indoorId, 'name' => 'Nội thất']));
        $this->executeCommand(new CreateCategory(['id' => Uuid::uuid4()->toString(), 'name' => 'Phòng khách', 'parent_id' => $indoorId]));
        $this->executeCommand(new CreateCategory(['id' => Uuid::uuid4()->toString(), 'name' => 'Phòng bếp', 'parent_id' => $indoorId]));
        $this->executeCommand(new CreateCategory(['id' => Uuid::uuid4()->toString(), 'name' => 'Phòng ăn', 'parent_id' => $indoorId]));
        $this->executeCommand(new CreateCategory(['id' => Uuid::uuid4()->toString(), 'name' => 'Phòng ngủ', 'parent_id' => $indoorId]));
        $this->executeCommand(new CreateCategory(['id' => Uuid::uuid4()->toString(), 'name' => 'Phòng vệ sinh', 'parent_id' => $indoorId]));

        $this->executeCommand(new CreateCategory(['id' => Uuid::uuid4()->toString(), 'name' => 'Công trình hoàn thiện']));
        $this->executeCommand(new CreateCategory(['id' => Uuid::uuid4()->toString(), 'name' => 'Cầu thang']));
        $this->executeCommand(new CreateCategory(['id' => Uuid::uuid4()->toString(), 'name' => 'Dịch vụ sửa nhà']));

        $outdoorId = Uuid::uuid4()->toString();
        $this->executeCommand(new CreateCategory(['id' => $outdoorId, 'name' => 'Ngoại thất']));
        $this->executeCommand(new CreateCategory(['id' => Uuid::uuid4()->toString(), 'name' => 'Nhà lô', 'parent_id' => $outdoorId]));
        $this->executeCommand(new CreateCategory(['id' => Uuid::uuid4()->toString(), 'name' => 'Biệt thự', 'parent_id' => $outdoorId]));
        $this->executeCommand(new CreateCategory(['id' => Uuid::uuid4()->toString(), 'name' => 'Tiểu cảnh', 'parent_id' => $outdoorId]));

        $fenceAndDoorId = Uuid::uuid4()->toString();
        $this->executeCommand(new CreateCategory(['id' => $fenceAndDoorId, 'name' => 'Hàng rào & Cổng sắt']));
        $this->executeCommand(new CreateCategory(['id' => Uuid::uuid4()->toString(), 'name' => 'Hàng rào', 'parent_id' => $fenceAndDoorId]));
        $this->executeCommand(new CreateCategory(['id' => Uuid::uuid4()->toString(),  'name' => 'Cổng sắt', 'parent_id' => $fenceAndDoorId]));
    }
}
