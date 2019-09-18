<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;

class LogoController extends Controller
{
	public function getLogoLogin() {
		$logo = Setting::where('attribute', 'LOGO_LOGIN')->first();
		return view('logo/login', compact('logo'));
	}
	public function putLogoLogin(Request $request) {
		$logo = Setting::where('attribute', 'LOGO_LOGIN')->first();
		// dd($request->all());
		$dest_path = 'img/logo';
		$file = $request->file('logo');
		@unlink($dest_path.'/'.$logo->value);
		$file->move($dest_path, $request->_filename);

		$logo->value = $request->_filename;
		$logo->save();

		return redirect('/logo-login');
	}
	public function getLogoBannerHome() {
		$logo = Setting::where('attribute', 'LOGO_BANNER_HOME')->first();
		return view('logo/banner_home', compact('logo'));
	}
	public function putLogoBannerHome(Request $request) {
		$logo = Setting::where('attribute', 'LOGO_BANNER_HOME')->first();
		// dd($request->all());
		$dest_path = 'img/logo';
		$file = $request->file('logo');
		@unlink($dest_path.'/'.$logo->value);
		$file->move($dest_path, $request->_filename);

		$logo->value = $request->_filename;
		$logo->save();

		return redirect('/logo-banner-home');
	}
}