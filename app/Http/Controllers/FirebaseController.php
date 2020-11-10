<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kreait\Firebase;

use Kreait\Firebase\Factory;

use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase\Database;
class FirebaseController extends Controller
{
	public function Index(){
		$database = (new Factory)->withServiceAccount(__DIR__.'/firebase.json')->createDatabase();
		$ref = $database->getReference('GSS')->getChild("SinhVien");
		$sv = $ref->getValue();
		return view('welcome', compact('sv'));
	}

    public function Add(Request $request){
    	$database = (new Factory)->withServiceAccount(__DIR__.'/firebase.json')->createDatabase();
		$ref = $database->getReference('GSS')->getChild("SinhVien");
		$count = 0;
		if(!empty($ref->getValue())){
			foreach ($ref->getValue() as $key => $value) {
				$count = $key;
			}
		}

		$ref->getChild($count+1)->set(['HoTen' => $request->hoTen,'NamSinh' => $request->namSinh]);
		return redirect()->route('index');
    }

    public function Delete($id){
    	$database = (new Factory)->withServiceAccount(__DIR__.'/firebase.json')->createDatabase();
		$ref = $database->getReference('GSS')->getChild("SinhVien");
		$ref->getChild($id)->remove();
		return redirect()->route('index');
    }

    public function LoadUpdate($id){
		$database = (new Factory)->withServiceAccount(__DIR__.'/firebase.json')->createDatabase();
		$ref1 = $database->getReference('GSS')->getChild("SinhVien");
		$ref2 = $database->getReference('GSS')->getChild("SinhVien")->getChild($id);
		$sv = $ref1->getValue();
		$loadUpdate = $ref2->getValue();
		$id = $id;
		return view('welcome', compact('sv', 'loadUpdate', 'id'));
    }

    public function Update(Request $request){
    	$database = (new Factory)->withServiceAccount(__DIR__.'/firebase.json')->createDatabase();
		$ref = $database->getReference('GSS')->getChild("SinhVien")->getChild($request->id);
		$ref->update(['HoTen' => $request->hoTen, "NamSinh" => $request->namSinh]);
		return redirect()->route('index');
    }
}
