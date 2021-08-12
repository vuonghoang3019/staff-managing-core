<?php

namespace Backend\Http\Controllers;

use Backend\Repositories\Room\RoomRepositoryInterface;
use Illuminate\Http\Request;

class AdminRoomController extends FrontendController
{
    private $roomRepo;

    public function __construct(RoomRepositoryInterface $roomRepo)
    {
        parent::__construct();
        $this->roomRepo = $roomRepo;
    }

    public function index()
    {
        $rooms = $this->roomRepo->paginate();
        return view('backend::room.index',compact('rooms'));
    }

    public function create()
    {
        return view('backend::room.create');
    }

    public function store(Request $request)
    {
        $this->roomRepo->create($request->all());
        return redirect()->back()->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {
        $roomEdit = $this->roomRepo->detail($id);
        return view('backend::room.edit',compact('roomEdit'));
    }

    public function update(Request $request, $id)
    {
        $this->roomRepo->update($id, $request->all());
        return redirect()->back()->with('success','Cập nhật thành công');
    }

    public function delete($id)
    {
        return $this->roomRepo->delete($id);
    }

    public function action($id)
    {
        $roomUpdate = $this->roomRepo->detail($id);
        $roomUpdate->status = $roomUpdate->status ? 0 : 1;
        $roomUpdate->save();
        return redirect()->back()->with('success','Cập nhật trạng thái thành công');
    }

}
