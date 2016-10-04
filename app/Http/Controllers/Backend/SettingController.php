<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\SettingRepositoryInterface;
use App\Contracts\Services\SettingAppServiceInterface;
use App\Contracts\DataTables\SettingDataTableInterface;
class SettingController extends Controller
{
    private $setting;
    private $appService;
    private $dataTable;

    public function __construct(SettingRepositoryInterface $setting, SettingAppServiceInterface $appService, SettingDataTableInterface $dataTable)
    {
        $this->setting = $setting;
        $this->appService = $appService;
        $this->dataTable = $dataTable;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
          if($request->ajax()) {
            // dd($request);
            return $this->dataTable->getData();
        }
        return view('backend.setting.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $setting = $this->appService->find($id);
        return view('backend.setting.show',compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $setting = $this->setting->find($id);
        return view('backend.setting.edit',compact('setting'));
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
        //
        $setting = $this->appService->update($id, $request->all());
        flash('Sửa thành công', 'success');
        return redirect()->route('admin.setting.edit', ['id' => $setting->id]);
    }

 
}
