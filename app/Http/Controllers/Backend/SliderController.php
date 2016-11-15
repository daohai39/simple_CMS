<?php

namespace App\Http\Controllers\Backend;

use App\Contracts\DataTables\SliderDataTableInterface;
use App\Contracts\Repositories\SliderRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Jobs\Slider\CreateSlider;
use App\Jobs\Slider\DeleteSlider;
use App\Jobs\Slider\UpdateSlider;
use App\Traits\ExecuteCommandTrait;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class SliderController extends Controller
{
    use ExecuteCommandTrait;

    protected $sliders;
    protected $dataTable;

    public function __construct(SliderRepositoryInterface $sliders, SliderDataTableInterface $dataTable)
    {
        $this->sliders = $sliders;
        $this->dataTable = $dataTable;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            return $this->dataTable->getData();
        }
        return view('backend.slider.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Uuid::uuid4()->toString();
        $attributes = [
            'id' => $id,
            'image_id' => $request->images_id,
            'url' => $request->url,
            'heading' => $request->heading,
            'description' => $request->description,
        ];

        $this->executeCommand(new CreateSlider($attributes));
        flash('Created Successfully', 'success');
        return redirect()->route('admin.slider.edit', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = $this->sliders->find($id);
        $slider->load('images');
        return view('backend.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributes = [
            'image_id' => $request->images_id,
            'url' => $request->url,
            'heading' => $request->heading,
            'description' => $request->description,
        ];

        $this->executeCommand(new UpdateSlider($id, $attributes));
        flash('Edited Successfully', 'success');
        return redirect()->route('admin.slider.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->executeCommand(new DeleteSlider($id));
        flash('Deleted Successfully', 'success');
        return redirect()->route('admin.slider.index');
    }
}
