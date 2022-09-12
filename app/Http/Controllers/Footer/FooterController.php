<?php

namespace App\Http\Controllers\Footer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master\Footer;



class FooterController extends Controller
{
    public function index()
    {
        $data = [
            "footer" => Footer::get()
        ];
        return view("pages.admin.footer.index", $data);
    }

    public function destroy($id)
    {
        Footer::where("id", $id)->delete();
        return redirect()->back()->with("message", "<script>Swal.fire('Berhasil', 'Data Berhasil di Hapus', 'success')</script>");
    }

}
