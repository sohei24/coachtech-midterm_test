<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }
    public function confirm(Request $request)
    {
        $this->validate($request, Contact::$rules);
        $contact = new Contact($request->all());
        return view('contact.confirm', ['contact' => $contact,]);
    }
    public function create(Request $request)
    {
        $form = $request->all();
        Contact::create($form);
        return view('contact.complete');
    }
    public function find(Request $request)
    {
        return view('contact.find', ['input' => '']);
    }
    public function search(Request $request)
    {
        $fullname = $request->input('fullname');
        $gender = $request->input('gender');
        $begin_date = $request->input('begin_date');
        $end_date = $request->input('end_date');
        $email = $request->input('email');
        $query = Contact::query();
        //「お名前」が入力された場合
        if(!empty($fullname)) {
            $query->where('fullname', 'LIKE', '%'.$fullname.'%');
        }
        //「性別」が入力された場合
        if(!empty($gender)) {
            $query->where('gender',$gender);
        }
        //「登録日」始まりと終わりを両方入力の場合
        if(!empty($begin_date && $end_date)) {
            $query->where([['created_at', '>=' ,$begin_date], ['created_at', '<=', $end_date]]);
        }
        //「登録日」始まりのみ入力の場合
        if(!empty($begin_date)) {
            $query->where('created_at', '>=' ,$begin_date);
        }
        //「登録日」終わりのみ入力の場合
        if(!empty($end_date)) {
            $query->where('created_at', '<=', $end_date);
        }
        //「メールアドレス」が入力された場合
        if(!empty($email)) {
            $query->where('email', $email);
        }
        $data = $query->Paginate(5);
        return view('contact.find')->with(['data' => $data]);
    }
    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return view('contact.find');
    }
}