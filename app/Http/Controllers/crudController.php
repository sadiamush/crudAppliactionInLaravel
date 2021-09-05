<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use App\Http\Requests\crudformRequest;
use App\Http\Requests\editformRequest;
class crudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $customer =  Customer::all();
        return view("dashboard",["user"=>$customer]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req,crudformRequest $crudreq)
    {
        //
        $crudreq->validated();
        DB::beginTransaction();
        try {
            customer::create($req->all());
            DB::commit();
        } catch (\Exception $e) {
            return response()->json([
                 "message" => $e->getMessage()
            ]);
            DB::rollback();
        }
    
        return redirect("/Userform")->with("data","Data is inserted");
    }

    public function getIDOfeditCustomer(Customer $customer)
    {

        return view("edit",["customerdata"=>$customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer,editformRequest $editreq)
    {
        $editreq->validated();
        DB::beginTransaction();
        try {

            $customer->update([
                "username"=> $request->username,
                "email" => $request->email,
            ]);
            DB::commit();
        } catch (\Exception $e) {
            return response()->json([
                 "message" => $e->getMessage()
            ]);
            DB::rollback();
        }
       
        return redirect("/getData/Customer")->with("update","Data is updated");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        DB::beginTransaction();
        try {
            $customer->delete();
            DB::commit();
        } catch (\Exception $e) {
            return response()->json([
                 "message" => $e->getMessage()
            ]);
            DB::rollback();
        }
        
        return redirect("/getData/Customer")->with("deleted","Data is deleted");
    }
}
