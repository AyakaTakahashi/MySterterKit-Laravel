<?php

namespace App\Http\Controllers;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * 一覧画面
     */
    public function index()
    {
        $db_menus = Menu::get();
        $menus=[];
        
        foreach($db_menus as $db_menu){
            $menus[] = [
                'id' => $db_menu->id,
                'menu' => $db_menu->menu,
                'charge' => $db_menu->charge,
                'menu_edit_url' => route('menu.edit', ['id' => $db_menu->id]),
            ];
        }
        return view('menu.index',[
            'menus' => $menus,
        ]);
    }

    /**
     * 登録画面
     */
    public function create()
    {
        return view('menu.create');
    }

    /**
     * 編集画面
     */
    public function edit(Menu $id)
    {
        return view('menu.edit',['menu' => $id]);
    }

    /**
     * 登録処理
     */
    public function store(Request $req, Menu $id = null){
        if(is_null($id)){
            $menu = new Menu();
        }else{
             $menu = $id;
        };
        
        // リクエストの値を設定
        $menu->menu = $req->input('menu');
        $menu->charge = $req->input('charge');
        
        // 保存
        $menu->save();
        return redirect(route('menu.index'));
    }

    /**
     * 削除処理
     */
    public function delete(Request $req, Menu $id){
        // 保存
        $id->delete();
        return redirect(route('menu.index'));
    }
}
