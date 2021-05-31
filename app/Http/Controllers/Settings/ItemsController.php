<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Lists\Items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pageH2 = __("List Items");
        $pageTitle = $pageH2 . ' | ' . config('app.name');

        $lists = Items::where('list_item_type', 'parent')
            ->orderBy('list_item_name')
            ->get();

        $child = Items::where('list_item_type', 'child')
            ->where('list_item_name', $lists->first()->list_item_master)
            ->orderBy('list_item_name')
            ->get();

        $default = $subchild = $child->where('list_item_default', true)->first();
        if (!empty($default)) {
            $subchild = Items::where('list_item_type', 'sub_child')
                ->where('list_item_name', $default->list_item_value)
                ->orderBy('list_item_title')
                ->get();
        }

        return view('Settings.list', compact('pageTitle', 'pageH2', 'lists', 'child', 'subchild'));
    }
}
