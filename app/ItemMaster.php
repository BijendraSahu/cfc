<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ItemMaster extends Model
{
    protected $table = 'item_master';
    public $timestamps = false;
    protected $primaryKey = 'ItemID';

    public static function getname($key_term)
    {
        $results = array();
//        $items = DB::table('products')->where('name', 'like', '%' . $key_term . '%')->distinct('name')->take(8)->get();
        $sql = "SELECT * FROM item_master WHERE ItemName LIKE ' % " . $key_term . " % ' ORDER BY ItemName ASC";
        $items = DB::select($sql);;
        foreach ($items as $item)
            $results[] = ['label' => $item->ItemName, 'id' => $item->ItemID, 'name' => $item->ItemName];
        return $results;
//        if (count($results))
//            return $results;
//        else
//            return ['value' => 'No Result Found', 'id' => ''];
    }

    public function scopegetProduct()
    {
        $products = ItemMaster::where('Isdeleted', '0')->get();
        $arr[0] = "SELECT";
        foreach ($products as $product) {
            $arr[$product->ItemID] = $product->ItemName;
        }
        return $arr;
    }

    public static function getProducts($key_term, $id)
    {
        $results = array();
//        $items = DB::select("SELECT item.ItemName, item.ItemID  FROM item_master item WHERE item.ItemName LIKE '" . $key_term . "%' ORDER BY item.ItemName ASC");
        $items = DB::select("SELECT item.ItemName, item.ItemID, u.UnitName  FROM item_master item, units u WHERE item.ItemName LIKE '" . $key_term . "%' and item.UnitID = u.UnitID ORDER BY item.ItemName ASC");
        foreach ($items as $item)
            $results[] = ['label' => $item->ItemName, 'id' => $item->ItemID, 'item_name' => $item->ItemName, 'UnitName' => $item->UnitName ];
        return $results;
    }
}
