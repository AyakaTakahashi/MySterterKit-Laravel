<?php

namespace App\Http\Controllers;
use App\Models\Treatment;
use App\Models\TreatmentDetail;
use App\Models\Menu;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    
    /**
     * 一覧画面
     */
    public function index(Treatment $id)
    {
        $db_treatments = Treatment::get();
        $treatments=[];
        
        foreach($db_treatments as $db_treatment){
            $customer_name = $db_treatment->getCustomer($db_treatment->customer_id);
            $treatments[] = [
                'customer_id' => $db_treatment->customer_id,
                'customer_name' => $customer_name->family_name . $customer_name->first_name,
                'visit_date' => $db_treatment->visit_date,
                'treatment_record' => $db_treatment->treatment_record,
                'total_amount' => $db_treatment->total_amount,
                'coupon' => $db_treatment->coupon,
                'payment_amount' => $db_treatment->payment_amount,
                'notes' => $db_treatment->notes,
                'treatment_detail_url' => route('treatment.detail', ['id' => $db_treatment->id]),
                'treatment_delete_url' => route('treatment.delete', ['id' => $db_treatment->id]),
            ];
        }
        return view('treatment.index',[
            'treatments' => $treatments,
        ]);
    }

    /**
     * 詳細画面
     */
    public function detail(Treatment $id)
    {
        $treatment = [
            'visit_date' => $id->visit_date,
            'treatment_record' => $id->treatment_record,
            'total_amount' => $id->total_amount,
            'coupon' => $id->coupon,
            'payment_amount' => $id->payment_amount,
            'notes' => $id->notes,
            'treatment_edit_url' => route('treatment.edit', ['id' => $id->id]),
            // 'treatment_index_url' => route('treatment.index', ['id' => $id->id]),
            // 'treatment_delete_url' => route('treatment.delete', ['id' => $id->id])
        ];

        return view('treatment.detail', [
            'treatment' => $treatment,
        ]);
    }

    /**
     * 登録画面
     */
    public function create()
    {
        $menu = $this->getMenu();
        return view('treatment.create', compact('menu'));
    }

    /**
     * 編集画面
     */
    public function edit(Treatment $id)
    {
        $menu = $this->getMenu();
        return view('treatment.edit',['treatment' => $id], compact('menu'));
    }

    /**
     * 登録処理
     */
    public function store(Request $req, Treatment $id = null){
        if(is_null($id)){
            $treatment = new Treatment();
            $treatmentDetail = new TreatmentDetail();
        }else{
            $treatment = $id;
            TreatmentDetail::where('treatment_id', $id->id)->delete();
        };
        
        // treatmentテーブルへのデータ登録
        $treatment->customer_id = $req->input('customer_id');
        $treatment->visit_date = $req->input('visit_date');
        $treatment->treatment_record = $req->input('treatment_record');
        $treatment->total_amount = $req->input('total_amount');
        $treatment->coupon = $req->input('coupon');
        $treatment->payment_amount = $req->input('payment_amount');
        $treatment->notes = $req->input('notes');
        
        // 保存
        $treatment->save();

        //treatment_detailテーブルへの値登録
        foreach ($req->menu as $menu){
            $treatmentDetail = new TreatmentDetail();
            $treatmentDetail->treatment_id = $treatment->id;
            $treatmentDetail->menu_id = $menu;
            $treatmentDetail->save();
        }

        return redirect(route('treatment.index'));
    }

    /**
     * 削除処理
     */
    public function delete(Request $req, Treatment $id){
        // 保存
        $id->delete();
        return redirect(route('treatment.index'));
    }

    /**
     * メニューマスタ取得処理
     */
    public function getMenu(){
        // 保存
        $tmpmenu = Menu::getMenu();
        $menu = [];
        foreach($tmpmenu as $lmenu){
            $menu[$lmenu->id] = [
                'id' => $lmenu->id,
                'menu' => $lmenu->menu,
                'charge' => $lmenu->charge,
            ];
        };
        return $menu;
    }
    /**
     * 絞り込み検索処理
     */
    public function getTreatmentById($customerId)
    {
        if($customerId != null){
            $db_treatments = Treatment::where('customer_id', $customerId)->get();
        }else{
            $db_treatments = Treatment::get();
        }
        $treatments=[];

        foreach($db_treatments as $db_treatment){
            $customer_name = $db_treatment->getCustomer($db_treatment->customer_id);
            $treatments[] = [
                'customer_id' => $db_treatment->customer_id,
                'customer_name' => $customer_name->family_name . $customer_name->first_name,
                'visit_date' => $db_treatment->visit_date,
                'treatment_record' => $db_treatment->treatment_record,
                'total_amount' => $db_treatment->total_amount,
                'coupon' => $db_treatment->coupon,
                'payment_amount' => $db_treatment->payment_amount,
                'notes' => $db_treatment->notes,
                'treatment_detail_url' => route('treatment.detail', ['id' => $db_treatment->id]),
                'treatment_delete_url' => route('treatment.delete', ['id' => $db_treatment->id]),
            ];
        }
        return view('treatment.index',[
            'treatments' => $treatments,
        ]);
    }
}