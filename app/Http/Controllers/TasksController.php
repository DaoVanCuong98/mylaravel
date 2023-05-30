<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\View; //hiển thị view
//đối tượng thao tác csdl
use Illuminate\Support\Facades\DB;
//đối tượng mã hóa password
use Hash;
use App\Http\Requests\TasksRequest;
use App\Models\Tasks;


class TasksController extends Controller
{

    


    public function read(){
        /* 
        truy vấn dữ liệu
        DB::table("users") <=> Tác động vào bảng users
        orderBy("id","desc") <=> order by id idesc 
        paginate(4) <=> phân 4 bản ghi trên 1 trang
        */
        $tasks = DB::table("tasks")->get();
        // $tasks = Tasks ::all();
        if($key = request()->key){
            $tasks = DB::table("tasks")->where('title','like','%'.$key.'%')->get();
        }
          
        return View::make("backend.TasksRead",['tasks'=>$tasks]);
    }
        public function update($id){
            //first() <=> lấy 1 bản ghi
            //lấy 1 bản ghi
            // $tasks = DB::table("tasks")->where("id","=",$id)->first();
            $tasks = Tasks::find($id)->first();
            // $tasks = Tasks::table("tasks")->where("id","=",$id)->first();
            
            return View::make("backend.TasksUpdate",["tasks"=>$tasks]);
        }
        //update POST
    public function updatePost(TasksRequest $request, $id){
        $data = $request->only(['title','description']);
        if($request->hasFile("photo")){
            //Request::file("photo")->getClientOriginalName() lay ten file
            $photo = time()."_".$request->file("photo")->getClientOriginalName();
            //thuc hien upload anh
            $request->file("photo")->move("upload",$photo);
            $data['photo'] = $photo;
        }
        
        $tasks = DB::table("tasks")->where('id',$id);
        $tasks-> update($data);
        

        //di chuyển đến 1 url khác
       return redirect(url("admin/tasks"));
    }
    public function create(){
        return View::make("backend.TasksCreate");
    }
    //create -POST
    public function createPost(TasksRequest $request){ 
        $request->validate([
            // 'title' => 'regex:/^[A-Za-z]+[0-9]/',
            // 'title'=>'regex:^(?=.*[A-Z].*[A-Z])(?=.*[!@#$&*])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z].*[a-z]).{8}$',
            // 'title' => 'alpha_num|min:6',
            // 'title'=>'digits_between:1,3',
            'title'=>'required|min:6',
            'description'=>'required'
        ],[
            'title.required'=>'title bat buoc phai nhap',
            'title.min'=>'title phai nhap lon hon 6 ky tu',
            'title.min'=>'title bat buoc phai nhap lon hon 6 ky tu',
            'title.alpha_num'=>'title chi nhap so va chu',
            'description.required'=>'description bat buoc phai nhap',
            'title.regex'=>'title chưa chính xác'
        ]
    );
    
        $title = request("title"); // Request::get("title")
        $description = request("description"); // Request::get("description")
        $photo = "";
        //neu co anh thi update anh
        if($request->hasFile("photo")){
            //Request::file("photo")->getClientOriginalName() lay ten file
            $photo = time()."_".$request->file("photo")->getClientOriginalName();
            //thuc hien upload anh
            $request->file("photo")->move("upload",$photo);
        }
        Session()->flash('success', 'Thêm dữ liệu thành công.');
        
        // kiểm tra xem title đã tồn tại chưa , nếu chưa tồn tại thì mới cho insert
        $countTitle = DB::table("tasks")->where("title","=",$title)->Count();
        
        if($countTitle == 0){
            //insert bản ghi
            DB::table("tasks")->insert(["title"=>$title,"description"=>$description,"photo"=>$photo]);
            //di chuyển đến 1 url khác
            return redirect(url("admin/tasks"));
        }else{
            //di chuyển đến 1 url khác
            return redirect(url("admin/tasks?notify=titleExists"));
        } 
    }
    public function delete($id){
        //lấy ảnh củ để xóa
        //select("photo") lấy cột photo
        $oldPhoto = DB::table("tasks")->where("id","=",$id)->select("photo")->first();
        if($oldPhoto->photo > 0  && file_exists("upload/".$oldPhoto->photo))
            unlink("upload/".$oldPhoto->photo);
        DB::table("tasks")->where("id","=",$id)->delete();
        // Tasks::find($id)->delete();
        
        

    Session()->flash('success', 'Xoa du lieu thanh cong.');

        //di chuyển đến 1 url khác
        return redirect(url("admin/tasks"));
    }
    
}
