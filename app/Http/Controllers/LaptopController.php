<?php

namespace App\Http\Controllers;

use App\Videocard;
use Illuminate\Http\Request;
use App\Laptop;
use App\Cpu;

class LaptopController extends Controller
{
    public function index()
    {

        $laptops = Laptop::all();
        $laptop1 = Laptop::all()->first();
        $laptop2 = Laptop::all()->last();
        $videocards = Videocard::query()->orderBy('name', 'asc')->get();
        $cpus = Cpu::all();

        return view('index', compact('laptops', 'videocards', 'cpus', 'laptop1', 'laptop2'));
    }

    public function show(Laptop $laptop)
    {
        return view('show', compact('laptop'));
    }

    public function compareProducts(Request $request) {

        $ids_laptop = explode(",", $request->get('items'));
        $id_laptop1 = $ids_laptop[0];
        $id_laptop2 = $ids_laptop[1];
        if (isset($ids_laptop[2])) {
            $id_laptop3 = $ids_laptop[2];
        }
        $laptop1 = Laptop::all()->find($id_laptop1);
        $laptop2 = Laptop::all()->find($id_laptop2);
        if (isset($id_laptop3)) {
            $laptop3 = Laptop::all()->find($id_laptop3);
        } else {
            $laptop3 = null;
        }
        return view('compare',  ['laptop1' => $laptop1, 'laptop2' => $laptop2, 'laptop3' => $laptop3]);
    }


}
