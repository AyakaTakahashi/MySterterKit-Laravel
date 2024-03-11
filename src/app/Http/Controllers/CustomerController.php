<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Sex;
use App\Models\PostalCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * 一覧画面
     */
    public function index(Request $req)
    {
        $db_customers = Customer::get();
        $customers=[];

        foreach($db_customers as $db_customer){
            $customers[] = [
                'id' => $db_customer->id,
                'family_name' => $db_customer->family_name,
                'first_name' => $db_customer->first_name,
                'sex' => $db_customer->sex,
                'postcode' => $db_customer->postcode,
                'prefecture' => $db_customer->prefecture,
                'city' => $db_customer->city,
                'address' => $db_customer->address,
                'phone_number' => $db_customer->phone_number,
                'birthday' => $db_customer->birthday,
                'customer_detail_url' => route('customer.detail', ['id' => $db_customer->id]),
                'customer_delete_url' => route('customer.delete', ['id' => $db_customer->id]),
                'treatment_index_url' => route('treatment.getTreatmentById', ['id' => $db_customer->id])
            ];
        }
        return view('customer.index',[
            'customers' => $customers,
            'customerId' => $req->input('customerId')
        ]);
    }

    /**
     * 詳細画面
     */
    public function detail(Customer $id)
    {
        $sex = DB::table('sexes')->where('id', $id->sex)->value('sex');
        $customer = [
            'family_name' => $id->family_name,
            'first_name' => $id->first_name,
            'sex' => $sex,
            'postcode' => $id->postcode,
            'prefecture' => $id->prefecture,
            'city' => $id->city,
            'address' => $id->address,
            'phone_number' => $id->phone_number,
            'birthday' => $id->birthday,
            'photo' => $id->photo,
            'notes' => $id->notes,
            'customer_edit_url' => route('customer.edit', ['id' => $id->id]),
            'treatment_index_url' => route('treatment.index', ['id' => $id->id]),
            'customer_delete_url' => route('customer.delete', ['id' => $id->id])
        ];
        return view('customer.detail', [
            'customer' => $customer,
        ]);
    }

    /**
     * 登録画面
     */
    public function create()
    {
        $sex = $this->getSex();
        return view('customer.create',compact('sex'));
    }

    /**
     * 編集画面
     */
    public function edit(Customer $id)
    {
        $sex = $this->getSex();
        return view('customer.edit',['customer' => $id],compact('sex'));
    }

    /**
     * 登録処理
     */
    public function store(Request $req, Customer $id = null){
        if(is_null($id)){
            $customer = new Customer();
        }else{
             $customer = $id;
        };
        
        // リクエストの値を設定
        $customer->family_name = $req->input('family_name');
        $customer->first_name = $req->input('first_name');
        $customer->sex = $req->input('sex');
        $customer->postcode = $req->input('postcode');
        $customer->prefecture = $req->input('prefecture');
        $customer->city = $req->input('city');
        $customer->address = $req->input('address');
        $customer->phone_number = $req->input('phone_number');
        $customer->birthday = $req->input('birthday');
        $customer->notes = $req->input('notes');
        
        //画像のファイル名を取得
        if($req->file('photo')){
            $dir = 'customer' . '/' . $customer->id;
            $file_name = $req->file('photo')->getClientOriginalName();
            $customer->photo = 'storage/' . $dir . '/' . $file_name;
            $req->file('photo')->storeAs('public/' . $dir, $file_name);
        }else{
            $customer->photo = null;
        }

        // 保存
        $customer->save();
        return redirect(route('customer.index'));
    }

    /**
     * 削除処理
     */
    public function delete(Request $req, Customer $id){
        // 保存
        $id->delete();
        return redirect(route('customer.index'));
    }
    
    /**
     * 性別マスタ取得処理
     */
    public function getSex(){
        // 保存
        $tmpsex = Sex::getSex();
        $sex = [];
        foreach($tmpsex as $lsex){
            $sex[$lsex->id] = [
                'id' => $lsex->id,
                'value' => $lsex->sex,
            ];
        };
        return $sex;
    }

    /**
     * 郵便番号に紐づく住所取得処理
     */
    public function getAddressByPostalCode($input_postal_code){
        $address = PostalCode::getAddressByPostalCode($input_postal_code);
        return $address;
    }

    /**
     * 絞り込み検索処理
     */
    public function getCustomer(Request $req)
    {
        if($req->input('customerId') != null){
            $db_customers = Customer::where('id', $req->input('customerId'))->get();
        }else{
            $db_customers = Customer::get();
        }
        $customers=[];

        foreach($db_customers as $db_customer){
            $customers[] = [
                'id' => $db_customer->id,
                'family_name' => $db_customer->family_name,
                'first_name' => $db_customer->first_name,
                'sex' => $db_customer->sex,
                'postcode' => $db_customer->postcode,
                'prefecture' => $db_customer->prefecture,
                'city' => $db_customer->city,
                'address' => $db_customer->address,
                'phone_number' => $db_customer->phone_number,
                'birthday' => $db_customer->birthday,
                'customer_detail_url' => route('customer.detail', ['id' => $db_customer->id]),
                'customer_delete_url' => route('customer.delete', ['id' => $db_customer->id]),
                'treatment_index_url' => route('treatment.getTreatmentById', ['id' => $db_customer->id])
            ];
        }

        return view('customer.index',[
            'customers' => $customers,
            'customerId' => $req->input('customerId')
        ]);
    }
}
