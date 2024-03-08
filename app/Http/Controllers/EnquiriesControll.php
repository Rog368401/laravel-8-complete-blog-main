<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EnquiriesControll extends Controller
{
    public function index(){
        $data[`enquiries`] = Enquiry::orderby(`id`) ->paginate(10);
        return view(`enquiries.index` , $data);
    }
public function create()
{
    return view(`enquiries.create`);
}
public function store(Request $request) {
    $enquiry = new Enquiry();
    $enquiry->title = $request->title;
    $enquiry->email = $request->email;
    $enquiry->message = $request->message;
    $enquiry->is_urgent = $request->has(`is_urgent`);
    $enquiry->save();
    return redirect()->route(`enquiries.index`)
    ->with(`success`, `Enquiry created successfully` );
}
}
