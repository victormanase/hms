<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Session;
use App\Http\helpers;   
class SetCompanyController extends Controller
{
    



    public function setCompanyId($id)
    {
        $companyName=Company::findOrFail($id)->name;
         Session::put('companyId', $id);
         Session::put('companyName', $companyName);
         return redirect()->back()->withInput();
    }
}
