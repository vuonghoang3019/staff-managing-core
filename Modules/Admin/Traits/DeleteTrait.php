<?php
namespace Modules\Admin\Traits;
use Illuminate\Support\Facades\Log;

trait DeleteTrait
{
    public function deleteModelTrait($id,$model)
    {
        try
        {
            $model->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ],200);
        }
        catch (\Exception $exception)
        {
            Log::error('Message'. $exception->getMessage(). 'Line' .$exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ],500);
        }
    }
    public function deleteModelParent_idTrait($id,$model)
    {
        try
        {
            $model->where('id',$id)->orWhere('parent_id',$id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ],200);
        }
        catch (\Exception $exception)
        {
            Log::error('Message'. $exception->getMessage(). 'Line' .$exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ],500);
        }
    }
}
