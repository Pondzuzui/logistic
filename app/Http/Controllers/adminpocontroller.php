<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pobills;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AdminpoController extends Controller
{
    public function dashboard(Request $request)
{
    $date = $request->get('date');
    $message = null;

    if ($date) {
        $pobill = Pobills::whereDate('time', $date)
                    ->orderBy('po_detail_id', 'desc')
                    ->get();

        if ($pobill->isEmpty()) {
            $message = 'ไม่พบข้อมูลที่ตรงกับวันที่เลือก';
        }
    } else {
        $pobill = Pobills::orderBy('po_detail_id', 'desc')->get();
    }

    return view('po.adminpo', compact('pobill', 'message'));
}

    public function dashboardpo()
    {
        $pobill = Pobills::all();  // Fetch the data
        return view('po.adminpo', compact('pobill'));  // Pass data to the view
    }
    public function historypo(Request $request)
    {
        $date = $request->get('date');
        $message = null;  // กำหนดค่าเริ่มต้นให้กับตัวแปร $message
        
        // ถ้าผู้ใช้กรอกวันที่ ให้กรองข้อมูลที่มีวันที่ตรงกับที่เลือก
        if ($date) {
            $pobill = Pobills::whereDate('time', $date)  // ใช้ชื่อคอลัมน์ที่ถูกต้อง
                        ->orderBy('po_detail_id', 'desc')
                        ->get();
            
            // ตรวจสอบว่ามีข้อมูลหรือไม่
            if ($pobill->isEmpty()) {
                $message = 'ไม่พบข้อมูลที่ตรงกับวันที่เลือก';
            } 
        } else {
            // ถ้าไม่ได้กรอกวันที่ จะดึงข้อมูลทั้งหมด
            $pobill = Pobills::orderBy('po_detail_id', 'desc')
                        ->get();
        }

        return view('po.historypo', compact('pobill', 'message'));
    }
   
    public function updateStatus(Request $request)
{
    // ตรวจสอบว่ามีค่า soDetailIds ส่งมาหรือไม่
    $poDetailIds = $request->input('poDetailIds');
    if (empty($poDetailIds)) {
        return response()->json(['success' => false, 'message' => 'No PO Detail IDs provided'], 400);
    }

    try {
        // อัปเดตสถานะจาก 0 เป็น 1
        DB::table('pobills')
            ->whereIn('po_detail_id', $poDetailIds)
            ->update(['status' => 1]);

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        // จัดการข้อผิดพลาดที่เกิดขึ้น
        return response()->json(['success' => false, 'message' => 'Failed to update status', 'error' => $e->getMessage()], 500);
    }
}
public function updateStatuspoback(Request $request)
{
    // ตรวจสอบว่ามีค่า soDetailIds ส่งมาหรือไม่
    $poDetailIds = $request->input('poDetailIds');
    if (empty($poDetailIds)) {
        return response()->json(['success' => false, 'message' => 'No SO Detail IDs provided'], 400);
    }

    try {
        // อัปเดตสถานะจาก 0 เป็น 1
        DB::table('pobills')
            ->whereIn('po_detail_id', $poDetailIds)
            ->update(['status' => 0]);

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        // จัดการข้อผิดพลาดที่เกิดขึ้น
        return response()->json(['success' => false, 'message' => 'Failed to update status', 'error' => $e->getMessage()], 500);
    }
} 
public function updateDeliveryDate(Request $request) 
{
    try {
        $validator = Validator::make($request->all(), [
            'po_detail_id' => 'required',
            'new_date' => 'required|date_format:Y-m-d',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'ข้อมูลไม่ถูกต้อง: ' . $validator->errors()->first()
            ], 422);
        }

        $existing = DB::table('pobills')
            ->where('po_detail_id', $request->po_detail_id)
            ->first();

        if (!$existing) {
            return response()->json([
                'success' => false,
                'message' => 'ไม่พบข้อมูลที่ต้องการอัปเดต'
            ], 404);
        }

        $updated = DB::table('pobills')
            ->where('po_detail_id', $request->po_detail_id)
            ->update([
                'recvDate' => $request->new_date,
                'time' => now() // ใช้เวลา ณ ขณะนั้น
            ]);

        if ($updated) {
            return response()->json([
                'success' => true,
                'message' => 'อัปเดตวันที่ส่งของเรียบร้อยแล้ว'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'ไม่สามารถอัปเดตข้อมูลได้'
            ], 500);
        }
    } catch (\Exception $e) {
        \Log::error('Error updating delivery date: ' . $e->getMessage());

        return response()->json([
            'success' => false,
            'message' => 'เกิดข้อผิดพลาด: ' . $e->getMessage()
        ], 500);
    }
}
}