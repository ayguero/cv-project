<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\Ability;
use App\Models\Contact;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Icons;
use App\Models\Portfolio;
use App\Models\SocialMedia;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class FrontController extends Controller
{
    public function home()
    {
        $list = User::query()->get();
        $education = Education::query()->orderBy('order','ASC')->get();
        $experience = Experience::query()->orderBy('order','ASC')->get();
        $social = SocialMedia::with("icons")->get();
        $ability = Ability::all();



        return view('front.index',compact('list','education','experience','social','ability'));
    }

    public function index()
    {
        $list = User::query()->get();
        $social = SocialMedia::with("icons")->get();
        $education = Education::all();
        $experience = Experience::all();
        $ability = Ability::all();
        return view('front.resume', compact('list','social','education','experience','ability'));
    }

    public function store()
    {
        $list = User::query()->get();

        $social = SocialMedia::with("icons")->get();
        $education = Education::all();
        $experience = Experience::all();
        $portfolio = Portfolio::all();
        return view('front.portfolio', compact('list','social','education','experience','portfolio'));
    }

    public function create()
    {
        $list = User::query()->get();
        $social = SocialMedia::with("icons")->get();
        return view("front.contact",compact('list','social'));
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'g-recaptcha-response' => 'recaptcha'
        ]);
       // dd('recaptca doğru');
        $data = $request->except("_token");

        Contact::create($data);
        return redirect()->route("contact");

    }
}
