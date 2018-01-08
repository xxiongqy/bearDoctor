<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\IndexController;
use Illuminate\Http\Request;
use App\Region;
use App\Address;

class UserController extends Controller
{
	//用户
	public function index()
	{
		return view('user/index');
	}

	//地址
	public function address()
	{
		//return view('user/address');

		$user_id=Auth::id();
		$userAddress=Address::userAddress($user_id);
		return view('user/address',compact(['userAddress',$userAddress]));

	}

	//四级联动  国家
	public function country()
	{
		$pid=request('pid');
		$region=new Region;
		$province=$region->country($pid)->toArray();
		echo json_encode($province);
	}

	//收货地址添加
	public function add(Request $request)
	{
		$data=$request->all();

		$region = new Region;
		$country=$region->city($data['country'])->toArray();
		$provice=$region->city($data['province'])->toArray();
		$city=$region->city($data['city'])->toArray();
		$area=$region->city($data['area'])->toArray();
		$city = $country[0]['region_name'].$provice[0]['region_name'].$city[0]['region_name'].$area[0]['region_name'];
		$data['user_id']=Auth::id();

		$data['address']=$city;

		
		$res = Address::create(['name'=>$data['name'],'amply'=>$data['amply'],'postcode'=>$data['postcode'],'phone'=>$data['phone'],'address'=>$data['address'],'user_id'=>$data['user_id'],'bulid'=>$data['bulid']]);


		if(!isset($data['is_default'])){
			$res = Address::create(['name'=>$data['name'],'amply'=>$data['amply'],'postcode'=>$data['postcode'],'phone'=>$data['phone'],'address'=>$data['address'],'user_id'=>$data['user_id'],'bulid'=>$data['bulid']]);
		}else{
			$res = Address::create(['name'=>$data['name'],'amply'=>$data['amply'],'postcode'=>$data['postcode'],'phone'=>$data['phone'],'address'=>$data['address'],'user_id'=>$data['user_id'],'bulid'=>$data['bulid'],'is_default'=>$data['is_default']]);
		}
		if($res){
			return redirect('user/address');
		}

	}

	//收货地址修改 查询单条
	public function find()
	{
			$address_id = request('addressId');
			$address=Address::find($address_id)->toArray();

			return view('user/saveAddress',compact(['address',$address]));
	}

	//执行修改
	public function update(Request $request)
	{
			$data = $request->all();
			$region = new Region;
			$country=$region->city($data['country'])->toArray();
			$provice=$region->city($data['province'])->toArray();
			$city=$region->city($data['city'])->toArray();
			$area=$region->city($data['area'])->toArray();
			$city = $country[0]['region_name'].$provice[0]['region_name'].$city[0]['region_name'].$area[0]['region_name'];

			unset($data['country'],$data['province'],$data['city'],$data['area']);
			$data['address']=$city;
			$address=Address::find($data['id']);
			$res=$address->update($data);
			if($res){
					return redirect('user/address/');
			}
	}

	//收货地址删除
	public function del(Request $request){
			$address_id = Request('addressId');
			$res=Address::delAddress($address_id);
			if($res){
					$data['error']=0;
			}else{
					$data['error']=1;
			}
			echo json_encode($data);
	}

	//申请提现
	public function cash()
	{
		return view('user/cash');
	}

	//我的收藏
	public function collect()
	{
		return view('user/collect');
	}

	//我的佣金
	public function commission()
	{
		return view('user/commission');
	}

	//推广链接
	public function links()
	{
		return view('user/links');
	}

	//我的会员
	public function member()
	{
		return view('user/member');
	}

	//会员列表
	public function memberList()
	{
		return view('user/memberList');
	}

	//申请余额记录
	public function memberMoney()
	{
		return view('user/memberMoney');
	}

	//充值
	public function memberCharge()
	{
		return view('user/memberCharge');
	}

	//支付
	public function moneyPay()
	{
		return view('user/moneyPay');
	}

	//我的留言
	public function message()
	{
		return view('user/message');
	}

	//我的红包
	public function packet()
	{
		return view('user/packet');
	}

	//我的业绩
	public function results()
	{
		return view('user/results');
	}

	//账户安全
	public function safe()
	{
		return view('user/safe');
	}
	
}
