<?php

namespace Modules\Hr\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Hr\Entities\Position;
use Modules\Hr\Http\Requests\CreatePositionRequest;
use Modules\Hr\Http\Requests\UpdatePositionRequest;
use Modules\Hr\Models\Position\Criteria;
use Modules\Hr\Repositories\PositionRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class PositionController extends AdminBaseController
{
    /**
     * @var PositionRepository
     */
    private $position;

    public function __construct(PositionRepository $position)
    {
        parent::__construct();

        $this->position = $position;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $positions = $this->position->all();

        return view('hr::admin.positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('hr::admin.positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePositionRequest $request
     * @return Response
     */
    public function store(CreatePositionRequest $request)
    {
        $this->position->create($request->all());

        return redirect()->route('admin.hr.position.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('hr::positions.title.positions')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Position $position
     * @return Response
     */
    public function edit(Position $position)
    {
        return view('hr::admin.positions.edit', compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Position $position
     * @param  UpdatePositionRequest $request
     * @return Response
     */
    public function update(Position $position, UpdatePositionRequest $request)
    {
        $this->position->update($position, $request->all());

        return redirect()->route('admin.hr.position.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('hr::positions.title.positions')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Position $position
     * @return Response
     */
    public function destroy(Position $position)
    {
        $this->position->destroy($position);

        return redirect()->route('admin.hr.position.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('hr::positions.title.positions')]));
    }
}