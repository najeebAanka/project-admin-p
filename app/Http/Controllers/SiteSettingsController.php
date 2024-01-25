<?php

namespace App\Http\Controllers;


use App\Models\SiteSetting;
use App\Models\Service;
use App\Models\Partner;
use App\Models\ServiceTab;
use App\Models\Project;
use App\Models\Company;
use App\Models\Testimonial;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Exception;
use Intervention\Image\ImageManagerStatic as Image;
use stdClass;

class SiteSettingsController extends Controller
{



function deleteItem (Request $request)
{


    $request->validate([
        'id' => 'required',

    ]);

    $data = SiteSetting::find($request->id);
        $data->delete();
    return back()->with('msg'  ,'Deleted succesfully');


}

function addItem (Request $request)
{


    $request->validate([

        'key' => 'required',
        'value_en' => 'required',
        'value_ar' => 'required',

    ]);

        $data = new SiteSetting();

    $data->value_en = $request->value_en;
    $data->value_ar = $request->value_ar;
    $data->key = $request->key;

    // if ($request->hasFile('image')) {
    //     $file = $request->only('image')['image'];
    //     $fileArray = array('image' => $file);
    //     $rules = array(
    //         'image' => 'mimes:jpg,png,jpeg|required|max:500000' // max 10000kb
    //     );
    //     $validator = Validator::make($fileArray, $rules);
    //     if ($validator->fails()) {
    //         return back()->with('error', "Image validation says it is not correct");
    //         ;
    //     } else {
    //         $uniqueFileName = uniqid()
    //                 . '.' . $file->getClientOriginalExtension();
    //         $name = date('Y') . "/" . date("m") . "/" . date("d") . "/" . $uniqueFileName;
    //         try {
    //             if (!Storage::disk('public')->has('companies/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
    //                 Storage::disk('public')->makeDirectory('companies/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
    //             }
    //             Image::make($file)->resize(512, null, function ($constraint) {
    //                 $constraint->aspectRatio();
    //             })->save(storage_path('app/public/companies/' . $name));
    //             $data->icon_img = $name;

    //         } catch (Exception $r) {
    //             return back()->with('error', "Failed to upload image " . $r);
    //         }
    //     }
    //}
    $data->save();
    return back()->with('msg'  ,'Added succesfully');


}

    function editItem(Request $request)
    {

        $request->validate([

        'key' => 'required',
        'value_en' => 'required',
        'value_ar' => 'required',

    ]);


        $data = SiteSetting::find($request->id);
        $data->key = $request->key;
        $data->value_en = $request->value_en;
        $data->value_ar = $request->value_ar;


        // if ($request->hasFile('image')) {
        //     $file = $request->only('image')['image'];
        //     $fileArray = array('image' => $file);
        //     $rules = array(
        //         'image' => 'mimes:jpg,png,jpeg|required|max:500000' // max 10000kb
        //     );
        //     $validator = Validator::make($fileArray, $rules);
        //     if ($validator->fails()) {
        //         return back()->with('error', "Image validation says it is not correct");
        //         ;
        //     } else {
        //         $uniqueFileName = uniqid()
        //                 . '.' . $file->getClientOriginalExtension();
        //         $name = date('Y') . "/" . date("m") . "/" . date("d") . "/" . $uniqueFileName;
        //         try {
        //             if (!Storage::disk('public')->has('companies/' . date('Y') . "/" . date("m") . "/" . date("d") . "/")) {
        //                 Storage::disk('public')->makeDirectory('companies/' . date('Y') . "/" . date("m") . "/" . date("d") . "/");
        //             }
        //             Image::make($file)->resize(512, null, function ($constraint) {
        //                 $constraint->aspectRatio();
        //             })->save(storage_path('app/public/companies/' . $name));
        //             $data->icon_img = $name;

        //         } catch (Exception $r) {
        //             return back()->with('error', "Failed to upload image " . $r);
        //         }
        //     }
        // }


        $data->save();
        return back()->with('msg'  ,'Edited successfully');


    }


    public function getSiteSettings()
    {


        $lang = $this->getLang();


        $r = new stdClass();



        $r->ceo_message = SiteSetting::select(['value_'. $lang .' as message'])->where('key', 'ceo_message')->first()->message;

        $r->mission = SiteSetting::select(['value_'. $lang .' as mission'])->where('key', 'mission')->first()->mission;

        $r->vision = SiteSetting::select(['value_'. $lang .' as vision'])->where('key', 'vision')->first()->vision;

        $r->about = SiteSetting::select(['value_'. $lang .' as about'])->where('key', 'about')->first()->about;

        $r->quality = SiteSetting::select(['value_'. $lang .' as quality'])->where('key', 'quality')->first()->quality;

        $r->terms = SiteSetting::select(['value_'. $lang .' as terms'])->where('key', 'terms')->first()->terms;

        $r->privacy = SiteSetting::select(['value_'. $lang .' as privacy'])->where('key', 'privacy')->first()->privacy;

        $r->phone = SiteSetting::select(['value_'. $lang .' as phone'])->where('key', 'phone')->first()->phone;

        $r->email = SiteSetting::select(['value_'. $lang .' as email'])->where('key', 'email')->first()->email;

        $r->location = SiteSetting::select(['value_'. $lang .' as location'])->where('key', 'location')->first()->location;

        $r->facebook = SiteSetting::select(['value_'. $lang .' as facebook'])->where('key', 'facebook')->first()->facebook;

        $r->twitter = SiteSetting::select(['value_'. $lang .' as twitter'])->where('key', 'twitter')->first()->twitter;

        $r->linkedin = SiteSetting::select(['value_'. $lang .' as linkedin'])->where('key', 'linkedin')->first()->linkedin;

        $r->youtube = SiteSetting::select(['value_'. $lang .' as youtube'])->where('key', 'youtube')->first()->youtube;


        return  response()->json($r);


        // $request = SiteSetting::all();

        // return response()->json($request);


    }

    public function getSiteSettingsID($id)
    {


        $request = SiteSetting::find($id);

        return response()->json($request);


    }




      public function homeData()
    {

        $lang = $this->getLang();


        $r = new stdClass();




        $r->CEO = SiteSetting::select(['value_'. $lang .' as body'])->where('key', 'ceo_message')->get();


        foreach($r->CEO  as $one){

            $one->titleEn = "CEO Message";
            $one->titleAr = "كلمة الرئيس التنفيذي";
            $one->nameEn = "Bader Abdullah Al-Suweidan";
            $one->nameAr = "بدر عبدالله السويدان";
            $one->positionEn = "Chairman of the Board & CEO";
            $one->positionAr = "رئيس مجلس الإدارة والرئيس التنفيذي";

            $one->signature = url('dist/assets/img/Frame.png');
        }



        $r->partner_types = Partner::select(['key' .' as type'])->distinct('key')->get();



        $r->services = Service::select(['id' ,'name_'. $lang .' as name', 'cover_img', 'icon_img'])->get();

        foreach($r->services  as $one){

            $one->subservices = ServiceTab::select(['id' ,'name_'. $lang .' as name'])->where('service_id', $one->id)->get();

            $one->cover_img = $one->buildImage();
            $one->icon_img = $one->buildIcon();

        }



        $r->projects = Project::select(['id' ,'name_'. $lang .' as name','short_desc_'. $lang .' as short_desc', 'img'])->get();

        foreach($r->projects  as $one){
            $one->img = $one->buildImage();

        }


        $r->companies = Company::select(['id' ,'name_'. $lang .' as name', 'icon_img', 'url'.' as url', 'order_index' .' as index'])->get();

        foreach($r->companies  as $one){
            $one->icon_img = $one->buildIcon();

        }


        $r->ceo_message = SiteSetting::select(['value_'. $lang .' as message'])->where('key', 'ceo_message')->first()->message;



        $r->years_no = '25';

        $r->projects_no = '505';

        $r->clients_no = '63';

        $r->awards_no = '72';


        $r->vision = SiteSetting::select(['value_'. $lang .' as vision'])->where('key', 'vision')->first()->vision;


        $r->mission = SiteSetting::select(['value_'. $lang .' as mission'])->where('key', 'mission')->first()->mission;


        $r->testimonials = Testimonial::select(['id' ,'short_desc_'. $lang .' as short_desc', 'desc_'. $lang .' as desc',
        'name_'. $lang .' as name', 'company_name_'. $lang .' as company'])->get();


        $r->blogs = Blog::select(['id' ,'name_'. $lang .' as name', 'desc_'. $lang .' as desc',
        'img'])->get();

        foreach($r->blogs  as $one){
            $one->img = $one->buildIcon();

        }

        $r->partners = Partner::select(['id', 'key'.' as type','name_'. $lang .' as name', 'icon_img',
        'url' .' as url', 'order_index' .' as index'])->get();

        foreach($r->partners  as $one){
            $one->icon_img = $one->buildIcon();

        }

        $r->phone = SiteSetting::select(['value_'. $lang .' as phone'])->where('key', 'phone')->first()->phone;

        $r->email = SiteSetting::select(['value_'. $lang .' as email'])->where('key', 'email')->first()->email;

        $r->location = SiteSetting::select(['value_'. $lang .' as location'])->where('key', 'location')->first()->location;

        $r->facebook = SiteSetting::select(['value_'. $lang .' as facebook'])->where('key', 'facebook')->first()->facebook;

        $r->twitter = SiteSetting::select(['value_'. $lang .' as twitter'])->where('key', 'twitter')->first()->twitter;

        $r->linkedin = SiteSetting::select(['value_'. $lang .' as linkedin'])->where('key', 'linkedin')->first()->linkedin;

        $r->youtube = SiteSetting::select(['value_'. $lang .' as youtube'])->where('key', 'youtube')->first()->youtube;



        $r->aboutUsYouTubeLink = SiteSetting::select(['value_'. $lang .' as aboutUsYouTubeLink'])->where('key', 'about_us_youtube_link')->first()->aboutUsYouTubeLink;

        $r->whatPeopleSayTitle = SiteSetting::select(['value_'. $lang .' as whatPeopleSayTitle'])->where('key', 'what_people_say_title')->first()->whatPeopleSayTitle;
        $r->whatPeopleSayParagraph = SiteSetting::select(['value_'. $lang .' as whatPeopleSayParagraph'])->where('key', 'what_people_say_paragraph')->first()->whatPeopleSayParagraph;

        $r->exploreServicesTitle = SiteSetting::select(['value_'. $lang .' as exploreServicesTitle'])->where('key', 'explore_services_title')->first()->exploreServicesTitle;
        $r->exploreServicesParagraph = SiteSetting::select(['value_'. $lang .' as exploreServicesParagraph'])->where('key', 'explore_services_paragraph')->first()->exploreServicesParagraph;

        $r->firstSliderTitle = SiteSetting::select(['value_'. $lang .' as firstSliderTitle'])->where('key', 'first_slider_title')->first()->firstSliderTitle;
        $r->firstSliderSubTitle = SiteSetting::select(['value_'. $lang .' as firstSliderSubTitle'])->where('key', 'first_slider_subtitle')->first()->firstSliderSubTitle;
        $r->firstSliderParagraph = SiteSetting::select(['value_'. $lang .' as firstSliderParagraph'])->where('key', 'first_slider_paragraph')->first()->firstSliderParagraph;
        $r->firstSliderButtonText = SiteSetting::select(['value_'. $lang .' as firstSliderButtonText'])->where('key', 'first_slider_button_text')->first()->firstSliderButtonText;
        $r->firstSliderButtonLink = SiteSetting::select(['value_'. $lang .' as firstSliderButtonLink'])->where('key', 'first_slider_button_link')->first()->firstSliderButtonLink;

        $r->secondSliderTitle = SiteSetting::select(['value_'. $lang .' as secondSliderTitle'])->where('key', 'second_slider_title')->first()->secondSliderTitle;
        $r->secondSliderSubTitle = SiteSetting::select(['value_'. $lang .' as secondSliderSubTitle'])->where('key', 'second_slider_subtitle')->first()->secondSliderSubTitle;
        $r->secondSliderParagraph = SiteSetting::select(['value_'. $lang .' as secondSliderParagraph'])->where('key', 'second_slider_paragraph')->first()->secondSliderParagraph;
        $r->secondSliderButtonText = SiteSetting::select(['value_'. $lang .' as secondSliderButtonText'])->where('key', 'second_slider_button_text')->first()->secondSliderButtonText;
        $r->secondSliderButtonLink = SiteSetting::select(['value_'. $lang .' as secondSliderButtonLink'])->where('key', 'second_slider_button_link')->first()->secondSliderButtonLink;

        $r->thirdSliderTitle = SiteSetting::select(['value_'. $lang .' as thirdSliderTitle'])->where('key', 'third_slider_title')->first()->thirdSliderTitle;
        $r->thirdSliderSubTitle = SiteSetting::select(['value_'. $lang .' as thirdSliderSubTitle'])->where('key', 'third_slider_subtitle')->first()->thirdSliderSubTitle;
        $r->thirdSliderParagraph = SiteSetting::select(['value_'. $lang .' as thirdSliderParagraph'])->where('key', 'third_slider_paragraph')->first()->thirdSliderParagraph;
        $r->thirdSliderButtonText = SiteSetting::select(['value_'. $lang .' as thirdSliderButtonText'])->where('key', 'third_slider_button_text')->first()->thirdSliderButtonText;
        $r->thirdSliderButtonLink = SiteSetting::select(['value_'. $lang .' as thirdSliderButtonLink'])->where('key', 'third_slider_button_link')->first()->thirdSliderButtonLink;





        return  response()->json($r);
    }



}












