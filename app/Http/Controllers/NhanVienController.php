<?php

namespace App\Http\Controllers;

use App\Models\NhanVienModel;
use App\Models\ChamCongModel;
use App\Models\TicketModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{
    //
    public function checkLogin(Request $request)
    {
        $data = $request->all();
        $check = NhanVienModel::where('user_name', $data['email'])->where('pass_word', $data['password'])->first();
        if ($check) {
            session(['user_id' => $check->id]);
            $user_id = session('user_id');
            $id = $check->id;
            $name = $check->name;
            $chamcong = ChamCongModel::where('MaNV', $id)->orderBy('ngaychamcong', 'desc')->get();
            return view('frontend.chamcong.index', compact('chamcong', 'name', 'id'));
        } else {
            $mess = 'Tài khoản của bạn không tồn tại';
            return view('frontend.include.login', compact('mess'));
        }
    }

    public function chamcong($id){
        $check = NhanVienModel::where('id', $id)->first();
        $name = $check->name;
        $chamcong = ChamCongModel::where('MaNV', $id)->orderBy('ngaychamcong', 'desc')->get();
        
        return view('frontend.chamcong.index', compact('chamcong', 'name', 'id'));
       
    }

    public function chamCongVao($id)
    {
        Carbon::setLocale('vi');
        $ngayHienTai = Carbon::now('Asia/Ho_Chi_Minh');
        $ngayGioCham = Carbon::now()->tz('Asia/Ho_Chi_Minh');
        $chamCongVao = new ChamCongModel();
        $chamCongVao->MaNV = $id;
        $chamCongVao->ngaychamcong =$ngayHienTai;
        $chamCongVao->Checkin = $ngayGioCham;
        $chamCongVao->save();
        return redirect()->route('chamcong',['id'=>$id]);
    }

    public function chamCongRa($id)
    {
        Carbon::setLocale('vi');
        $ngayHienTai = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();;
        $ngayGioCham = Carbon::now()->tz('Asia/Ho_Chi_Minh');
        
        $chamCongRa = ChamCongModel::where('ngaychamcong',$ngayHienTai)
        ->where('MaNV',$id)
        ->first();
       
        $chamCongRa->Checkout = $ngayGioCham;
        $chamCongRa->save();
        return redirect()->route('chamcong',['id'=>$id]);
    }

    public function ticket($id){
        $ticket = TicketModel::where('MaNV', $id)->get();
        $check = NhanVienModel::where('id', $id)->first();
        $name = $check->name;
        return view('frontend.ticket.index', compact('ticket','name','id'));
    }

    public function createticket(Request $request){
        $data = $request->all();
        $ticket = new TicketModel();
        $ticket->MaNV = $data['id'];
        $ticket->title = $data['title'];
        $ticket->des = $data['des'];
        $ticket->TrangThai = 0;
        $ticket->save();
        return redirect()->route('ticket',['id'=>$data['id']]);
    }

    public function deleteticket($id,$maticket){
        $ticket = TicketModel::where('MaTicket', $maticket)->delete();
        return redirect()->route('ticket',['id'=>$id]);
    }

    public function updateticket(Request $request){
        $data = $request->all();
        $ticket = TicketModel::where('MaTicket', $data['maticket'])->first();
        $ticket->title = $data['title'];
        $ticket->des = $data['des'];
        $ticket->save();
        return redirect()->route('ticket',['id'=>$data['id']]);
    }


}
