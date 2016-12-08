<?php
namespace App\Http\Controllers\Backend;

use App\Jobs\Setting\UpdateSetting;
use App\Traits\ExecuteCommandTrait;
use App\Contracts\DataTables\SettingDataTableInterface;
use App\Contracts\Repositories\SettingRepositoryInterface;

use App\Http\Requests;
use Illuminate\Http\Request;

class SettingController extends BackendController
{
    use ExecuteCommandTrait;

    private $setting;
    private $dataTable;

    public function __construct(SettingRepositoryInterface $setting, SettingDataTableInterface $dataTable)
    {
        $this->setting = $setting;
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
        return view('backend.setting.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting = $this->setting->find($id);
        $setting->load('images');
        return view('backend.setting.edit', compact('setting'));
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
        $this->executeCommand(new UpdateSetting($id, $request->all()));
        flash('Edited Successfully', 'success');
        return redirect()->route('admin.setting.edit', ['id' => $id]);
    }


}
