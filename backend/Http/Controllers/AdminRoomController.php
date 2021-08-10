<?php

namespace Backend\Http\Controllers;

use App\models\Room;
use Illuminate\Http\Request;
use Backend\Traits\DeleteTrait;

class AdminRoomController extends FrontendController
{
    private $room;

    use DeleteTrait;

    public function __construct(Room $room)
    {
        parent::__construct();
        $this->room = $room;
    }

    public function index()
    {
        $rooms = $this->room->paginate(10);
        return view('backend::room.index',compact('rooms'));
    }

    public function create()
    {
        return view('backend::room.create');
    }

    public function store(Request $request)
    {
        $this->room->code = $request->code;
        $this->room->name = $request->name;
        $this->room->sit_capacity = $request->sit_capacity;
        $this->room->description = $request->description;
        $this->room->save();
        return redirect()->back()->with('success','Thêm mới thành công');
    }

    public function edit($id)
    {
        $roomEdit = $this->room->findOrFail($id);
        return view('backend::room.edit',compact('roomEdit'));
    }

    public function update(Request $request, $id)
    {
        $roomUpdate = $this->room->findOrFail($id);
        $roomUpdate->code = $request->code;
        $roomUpdate->name = $request->name;
        $roomUpdate->sit_capacity = $request->sit_capacity;
        $roomUpdate->description = $request->description;
        $roomUpdate->save();
        return redirect()->back()->with('success','Cập nhật thành công');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->room);
    }

    public function action($id)
    {
        $roomUpdate = $this->room->findOrFail($id);
        $roomUpdate->status = $roomUpdate->status ? 0 : 1;
        $roomUpdate->save();
        return redirect()->back()->with('success','Cập nhật trạng thái thành công');
    }

}
