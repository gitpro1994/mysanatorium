<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Cities,
    Comments,
    Company,
    Countries,
    CreditCards,
    Currencies,
    Discounts,
    MedicalBase,
    MedicalBaseElements,
    Penalties,
    RoomKinds,
    Sanatorium_MedicalBases,
    Sanatoriums,
    SmbElements,
    DiscountOptions,
    Srk,
    SrkOptions,
    RoomConditions,
    RoomStatus,
    Sccs,
    Stchild,
    Stoutchild,
    Sws,
    WizartOptionals
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeUnitReverseLookup\Wizard;

class SanatoriumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sanatoriums'] = Sanatoriums::all();
        return view('admin.sanatoriums.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['credit_cards'] = CreditCards::where('status', 1)->get();
        $data['countries'] = Countries::where('status', 1)->where('for_sanatorium', 1)->get();
        $data['companies'] = Company::where('status', 1)->get();
        $data['currencies'] = Currencies::where('status', 1)->get();
        return view('admin.sanatoriums.create', $data);
    }

    public function getCities($country_id)
    {
        $cities = Cities::where('country_id', $country_id)->where('status', 1)->get();
        $companies = Company::where('country_id', $country_id)->where('status', 1)->get();
        $html_response['cities'] = '';
        $html_response['companies'] = '';
        foreach ($cities as $city) {
            $html_response['cities'] .= '<option value="' . $city->id . '">' . $city->title . '</option>';
        }

        foreach ($companies as $company) {
            $html_response['companies'] .= '<option value="' . $company->id . '">' . $company->name . '</option>';
        }
        return $html_response;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sanatoriums = new Sanatoriums();
        $sanatoriums->country_id = $request->country_id;
        $sanatoriums->city_id = $request->city_id;
        $sanatoriums->company_id = $request->company_id;
        $sanatoriums->name = $request->name;
        $sanatoriums->search_title = $request->search_title;
        $sanatoriums->meta_title = $request->meta_title;
        $sanatoriums->meta_description = $request->meta_description;
        $sanatoriums->meta_keywords = $request->meta_keywords;
        $sanatoriums->meta_H1 = $request->meta_H1;
        $sanatoriums->slug = $request->slug;
        $sanatoriums->address = $request->address;
        $sanatoriums->currency_id = $request->currency_id;
        $sanatoriums->youtube_video_link = $request->youtube_video_link;
        $sanatoriums->bron_email = $request->bron_email;
        $sanatoriums->rate = $request->rate;
        $sanatoriums->phone_number = $request->phone_number;
        $sanatoriums->map = $request->map;
        $sanatoriums->_3d_map = $request->_3d_map;
        $sanatoriums->latitude = $request->latitude;
        $sanatoriums->longitude = $request->longitude;
        $sanatoriums->tax_price = $request->tax_price;
        $sanatoriums->transfer_link = $request->transfer_link;
        $sanatoriums->number_of_staff = ($request->number_of_staff == "on") ? 1 : 0;
        $sanatoriums->tax_included = ($request->tax_included == "on") ? 1 : 0;
        $sanatoriums->transfer_included = ($request->transfer_included == "on") ? 1 : 0;
        $sanatoriums->main_description = $request->main_description;
        $sanatoriums->reservation_rules = $request->reservation_rules;
        $sanatoriums->payment_rules = $request->payment_rules;
        $sanatoriums->reservation_contract = $request->reservation_contract;
        $sanatoriums->advantages = $request->advantages;
        $sanatoriums->important_to_know = $request->important_to_know;
        $sanatoriums->treatment_package_price = $request->treatment_package_price;
        $sanatoriums->paid_medical_procedures = $request->paid_medical_procedures;
        $sanatoriums->check_in_for_adults = $request->check_in_for_adults;
        $sanatoriums->check_in_for_children = $request->check_in_for_children;
        $sanatoriums->daily_price_group = 'daily_price_group_' . $request->country_id;
        $sanatoriums->weekly_price_group = 'weekly_price_group_' . $request->country_id;
        $sanatoriums->optional_price_group = 'optional_price_group_' . $request->country_id;

        if ($request->file('main_image')) {
            $file = $request->file('main_image');
            $filename_main_image = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('backend/images/sanatoriums'), $filename_main_image);
            $sanatoriums->main_image = $filename_main_image;
        }

        if ($request->file('second_image')) {
            $file = $request->file('second_image');
            $filename_second_image = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('backend/images/sanatoriums'), $filename_second_image);
            $sanatoriums->second_image = $filename_second_image;
        }

        if ($request->file('youtube_image')) {
            $file = $request->file('youtube_image');
            $filename_youtube_image = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('backend/images/sanatoriums'), $filename_youtube_image);
            $sanatoriums->youtube_image = $filename_youtube_image;
        }

        $sanatoriums->status = 1;
        $sanatoriums->save();
        toast('Yeni sanatoriya m??lumatlar?? ??lav?? edildi', 'success');
        return redirect()->route('admin.sanatoriums');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['credit_cards'] = CreditCards::where('status', 1)->get();
        $data['countries'] = Countries::where('status', 1)->where('for_sanatorium', 1)->get();
        $data['cities'] = Cities::where('status', 1)->get();
        $data['companies'] = Company::where('status', 1)->get();
        $data['currencies'] = Currencies::where('status', 1)->get();
        $data['sanatorium'] = Sanatoriums::find($id);
        return view('admin.sanatoriums.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sanatoriums = Sanatoriums::find($id);
        $sanatoriums->name = $request->name;
        $sanatoriums->search_title = $request->search_title;
        $sanatoriums->meta_title = $request->meta_title;
        $sanatoriums->meta_description = $request->meta_description;
        $sanatoriums->meta_keywords = $request->meta_keywords;
        $sanatoriums->meta_H1 = $request->meta_H1;
        $sanatoriums->slug = $request->slug;
        $sanatoriums->address = $request->address;
        $sanatoriums->currency_id = $request->currency_id;
        $sanatoriums->youtube_video_link = $request->youtube_video_link;
        $sanatoriums->bron_email = $request->bron_email;
        $sanatoriums->rate = $request->rate;
        $sanatoriums->country_id = $request->country_id;
        $sanatoriums->city_id = $request->city_id;
        $sanatoriums->company_id = $request->company_id;
        $sanatoriums->phone_number = $request->phone_number;
        $sanatoriums->map = $request->map;
        $sanatoriums->_3d_map = $request->_3d_map;
        $sanatoriums->latitude = $request->latitude;
        $sanatoriums->longitude = $request->longitude;
        $sanatoriums->tax_price = $request->tax_price;
        $sanatoriums->transfer_link = $request->transfer_link;

        $sanatoriums->number_of_staff = ($request->number_of_staff == "on") ? 1 : 0;
        $sanatoriums->tax_included = ($request->tax_included == "on") ? 1 : 0;
        $sanatoriums->transfer_included = ($request->transfer_included == "on") ? 1 : 0;

        $sanatoriums->main_description = $request->main_description;
        $sanatoriums->reservation_rules = $request->reservation_rules;
        $sanatoriums->payment_rules = $request->payment_rules;
        $sanatoriums->reservation_contract = $request->reservation_contract;
        $sanatoriums->advantages = $request->advantages;
        $sanatoriums->important_to_know = $request->important_to_know;
        $sanatoriums->treatment_package_price = $request->treatment_package_price;
        $sanatoriums->paid_medical_procedures = $request->paid_medical_procedures;
        $sanatoriums->check_in_for_adults = $request->check_in_for_adults;
        $sanatoriums->check_in_for_children = $request->check_in_for_children;


        if ($request->has('main_image')) {
            if ($request->file('main_image')) {
                $file = $request->file('main_image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('backend/images/sanatoriums'), $filename);
                $sanatoriums->main_image = $filename;
            }
        }

        if ($request->has('second_image')) {
            if ($request->file('second_image')) {
                $file = $request->file('second_image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('backend/images/sanatoriums'), $filename);
                $sanatoriums->second_image = $filename;
            }
        }

        if ($request->has('youtube_image')) {
            if ($request->file('youtube_image')) {
                $file = $request->file('youtube_image');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('backend/images/sanatoriums'), $filename);
                $sanatoriums->youtube_image = $filename;
            }
        }

        $sanatoriums->status = 1;
        $sanatoriums->save();
        return redirect()->route('admin.sanatoriums')->with('success', 'M??lumatlar d??yi??dirildi!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sanatoriums::find($id)->delete();
        return redirect()->back()->with('success', 'M??lumatlar silindi!');
    }

    public function restore($id)
    {
        Sanatoriums::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'M??lumat geri qaytar??ld??!');
    }

    public function deleted_sanatoriums()
    {
        $data['sanatoriums'] = Sanatoriums::onlyTrashed()->get();
        return view('admin.sanatoriums.deleted', $data);
    }

    public function check_status($id)
    {
        $city = Sanatoriums::find($id);
        if ($city['status'] == 1) {
            $city->status = 0;
        } else {
            $city->status = 1;
        }
        $city->save();

        return "Status d??yi??dirildi!";
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('backend/images/sanatoriums'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('backend/images/sanatoriums' . $fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            @header('Content-type: text/html; charset=utf-8');
            echo $response;
        }
    }

    public function discount($sanatorium_id)
    {
        $data['sanatorium'] = Sanatoriums::find($sanatorium_id);
        return view('admin.sanatoriums.properties.discount.discount', $data);
    }

    public function doc($sanatorium_id)
    {
        $data['discounts'] = Discounts::where('status', 1)->get();
        $data['sanatorium'] = Sanatoriums::find($sanatorium_id);
        $data['room_kinds'] = RoomKinds::where('status', 1)->get();
        return view('admin.sanatoriums.properties.discount.create-discount', $data);
    }

    public function room_kinds($sanatorium_id)
    {
        $data['sanatorium'] = Sanatoriums::where('id', $sanatorium_id)->first();
        $data['sanatorium_room_kinds'] = Srk::where('sanatoriums_id', $sanatorium_id)->get();
        return view('admin.sanatoriums.properties.room-kinds.room-kinds', $data);
    }

    public function room_kinds_create($sanatorium_id)
    {
        $data['sanatorium'] = Sanatoriums::where('id', $sanatorium_id)->first();
        $data['room_kinds'] = RoomKinds::where('status', 1)->get();
        $data['room_conditions'] = RoomConditions::where('status', 1)->get();
        return view('admin.sanatoriums.properties.room-kinds.room-kinds-create', $data);
    }

    public function room_kinds_store(Request $request, $sanatorium_id)
    {
        $srk = new Srk;
        $srk->sanatoriums_id = $sanatorium_id;
        $srk->room_kinds_id = $request->room_kinds_id;
        $srk->room_size = $request->room_size;
        $srk->bed_width = $request->bed_width;
        if ($srk->smoking == "on") {
            $srk->smoking = 1;
        } else {
            $srk->smoking = 0;
        }

        if ($request->file('main_image')) {
            $file = $request->file('main_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('backend/images/sanatorium-features/room-kinds/'), $filename);
            $srk->main_image = $filename;
        }


        $srk->room_features = $request->room_features;

        $srk->room_amenities = json_encode($request->room_amenities);

        $srk->status = 1;
        $srk->save();


        $sws = new Sws;
        $sws->sanatoriums_id = $sanatorium_id;
        $sws->room_kinds_id = $request->room_kinds_id;
        $sws->room_count = 0;
        $sws->general_human_count = 0;
        $sws->older_count = 0;
        $sws->child_count = 0;
        $sws->possible_additional_beds = 0;
        $sws->save();

        return redirect()->route('admin.sanatoriums.room-kinds', ['sanatorium_id' => $sanatorium_id])->with('success', 'M??lumatlar daxil edildi!');
    }

    public function check_room_kinds_status($id)
    {
        $kind = Srk::find($id);
        if ($kind['status'] == 1) {
            $kind->status = 0;
        } else {
            $kind->status = 1;
        }
        $kind->save();

        return "Status d??yi??dirildi!";
    }

    public function edit_room_kind($id)
    {
        $data['room_kind'] = Srk::find($id);
        $data['room_kinds'] = RoomKinds::where('status', 1)->get();
        $data['room_conditions'] = RoomConditions::where('status', 1)->get();
        return view('admin.sanatoriums.properties.room-kinds.room-kinds-edit', $data);
    }

    public function update_room_kinds(Request $request, $id)
    {
        $srk = Srk::find($id);
        $srk->sanatoriums_id = $request->sanatoriums_id;
        $srk->room_kinds_id = $request->room_kinds_id;
        $srk->room_size = $request->room_size;
        $srk->bed_width = $request->bed_width;
        if ($srk->smoking == "on") {
            $srk->smoking = 1;
        } else {
            $srk->smoking = 0;
        }

        if ($request->file('main_image')) {
            $file = $request->file('main_image');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('backend/images/sanatorium-features/room-kinds/'), $filename);
            $srk->main_image = $filename;
        }


        $srk->room_features = $request->room_features;

        $srk->room_amenities = json_encode($request->room_amenities);

        $srk->save();


        return redirect()->route('admin.sanatoriums.room-kinds', ['sanatorium_id' => $request->sanatoriums_id])->with('success', 'M??lumatlar daxil edildi!');
    }


    public function penalty($sanatorium_id)
    {
        $data['sanatorium'] = Sanatoriums::where('id', $sanatorium_id)->first();
        $data['penalty'] = Penalties::where('sanatoriums_id', $sanatorium_id)->first();
        return view('admin.sanatoriums.properties.penalty', $data);
    }

    public function update_penalty(Request $request, $id)
    {
        $penalty = Penalties::where('sanatoriums_id', $id)->first();
        if (isset($penalty)) {
            $penalty->update($request->all());
        } else {
            Penalties::create($request->all());
        }
        return redirect()->back()->with('success', 'M??lumatlar yenil??ndi!');
    }

    public function medical_bases($sanatoriums_id)
    {
        $data['sanatorium'] = Sanatoriums::where('id', $sanatoriums_id)->first();
        $data['medical_bases_elements'] = MedicalBaseElements::where('status', 1)->get();
        return view('admin.sanatoriums.properties.medical-base.medical-bases', $data);
    }

    public function element_available($element_id, $sanatorium_id)
    {
        $available = SmbElements::where('medical_base_elements_id', $element_id)->where('sanatoriums_id', $sanatorium_id)->first();
        if (isset($available)) {
            $available->delete();
            return "deleted";
        } else {
            SmbElements::create([
                'sanatoriums_id' => $sanatorium_id,
                'medical_base_elements_id' => $element_id
            ]);
            return "created";
        }
    }


    public function discount_options_create()
    {
        $data['discounts'] = Discounts::where('status', 1)->get();
        $data['room_kinds'] = RoomKinds::where('status', 1)->get();
        return view('admin.sanatoriums.properties.discount.create-discount', $data);
    }

    public function getDiscountOption($discount_id)
    {
        $room_kinds = RoomKinds::where('status', 1)->get();
        $html = '';

        if ($discount_id == 4) {
            $html .= '
            <div class="col-xl-4 mt-2">
                <div class="mb-3 mb-xl-0">
                    <label for="start_date" class="form-label">Ba??lan????c tarixi</label>
                    <input class="form-control" id="start_date" type="date" required name="start_date">
                </div>
            </div>
            <div class="col-xl-4 mt-2">
                <div class="mb-3 mb-xl-0">
                    <label for="finish_date" class="form-label">Sonlanma tarixi</label>
                    <input class="form-control" id="finish_date" type="date" required name="finish_date">
                </div>
            </div>

        <div class="align-items-center mt-4 general-discount">
            <div class="row">
                <div class="col-4">
                    <select class="form-control" name="room_kinds_id[]">
                        <option disabled>Siyah??dan se??in</option>
                        <option value="all">B??t??n otaqlar</option>';
            foreach ($room_kinds as $kind) {
                $html .=  '<option value="' . $kind['id'] . '">' . $kind['name'] . '</option>';
            }

            $html .= '</select>
                </div>

                <div class="col-4">
                    <div class="input-group">
                        <div class="input-group-text">%</div>
                        <input type="text" readonly name="discount[]" required class="form-control" id="discount" placeholder="Endirim faizi daxil edin">
                    </div>
                </div>

                <div class="col-auto">
                    <button type="button" class="new-general-discount btn btn-outline-info waves-effect waves-light">
                        <span><i class="fas fa-plus"></i></span>
                        Yeni endirim
                    </button>
                </div>
            </div>
        </div>
            ';
        } elseif ($discount_id == 1) {
            $html .= '

            <div class="col-xl-4 mt-2">
                <div class="mb-3 mb-xl-0">
                    <label for="start_date" class="form-label">Ba??lan????c tarixi</label>
                    <input class="form-control" id="start_date" type="date" required name="start_date">
                </div>
            </div>
            <div class="col-xl-4 mt-2">
                <div class="mb-3 mb-xl-0">
                    <label for="finish_date" class="form-label">Sonlanma tarixi</label>
                    <input class="form-control" id="finish_date" type="date" required name="finish_date">
                </div>
            </div>

            <div class="align-items-center mt-4 day-discount">
            <div class="row">
                <div class="col-4">
                    <select class="form-control" name="room_kinds_id[]">
                        <option disabled>Siyah??dan se??in</option>
                        <option value="all">B??t??n otaqlar</option>';
            foreach ($room_kinds as $kind) {
                $html .=  '<option value="' . $kind['id'] . '">' . $kind['name'] . '</option>';
            }

            $html .= '</select>
                </div>

                <div class="col-2">
                    <div class="input-group">
                        <div class="input-group-text" id="min_night">Gec??d??n</div>
                        <input type="text" readonly name="min_night[]" class="form-control" id="min_night">
                    </div>
                </div>

                <div class="col-2">
                    <div class="input-group">
                        <div class="input-group-text">Gec??y??</div>
                        <input type="text" readonly name="max_night[]" class="form-control" id="max_night">
                    </div>
                </div>

                <div class="mt-3">
                    <div class="form-check">
                        <input type="radio" name="depending_number_of_person" value="0" class="form-check-input radio_number_of_person" id="customCheck1">
                        <label class="form-check-label" value="1" for="customCheck1">Adam say??ndan as??l?? olmayaraq</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="depending_number_of_person" value="1" class="form-check-input radio_number_of_person" id="customCheck2">
                        <label class="form-check-label" for="customCheck2">Adam say??ndan as??l?? olaraq</label>
                    </div>
                </div>

                <div class="col-4 mt-2 number_of_person">
                    <div class="input-group">
                        <div class="input-group-text">
                            <span>
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        <input type="text" readonly name="number_of_person" class="form-control" id="discount" placeholder="Say daxil edin">
                    </div>
                </div>

                <div class="col-4 mt-2">
                    <input type="text" readonly name="free_night" class="form-control" id="discount" placeholder="Gec?? say??n?? daxil edin">
                </div>



            </div>
        </div>';
        } elseif ($discount_id == 2) {
            $html .= '

            <div class="col-xl-4 mt-2">
            <div class="mb-3 mb-xl-0">
                <label for="start_date" class="form-label">Ba??lan????c tarixi</label>
                <input class="form-control" id="start_date" type="date" required name="start_date">
            </div>
        </div>
        <div class="col-xl-4 mt-2">
            <div class="mb-3 mb-xl-0">
                <label for="finish_date" class="form-label">Sonlanma tarixi</label>
                <input class="form-control" id="finish_date" type="date" required name="finish_date">
            </div>
        </div>
            <div class="align-items-center mt-4 before-day-discount">

            <div class="row">
                <div class="col-md-4">
                    <div class="col-12">
                        <label for="before_reserv_day_start">G??n daxil edin</label>
                        <input type="text" readonly name="before_reserv_day_start[]" class="form-control" id="before_reserv_day_start">

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-12">
                        <label for="before_reserv_day_end">G??n daxil edin</label>
                        <input type="text" readonly name="before_reserv_day_end[]" class="form-control" id="before_reserv_day_end">

                    </div>
                </div>
            </div>

            <div class="row mt-2">

                <div class="col-4">
                    <select class="form-control" name="room_kinds_id[]">
                        <option disabled>Siyah??dan se??in</option>
                        <option value="all">B??t??n otaqlar</option>';
            foreach ($room_kinds as $kind) {
                $html .= '<option value="' . $kind['id'] . '">' . $kind['name'] . '</option>';
            }

            $html .= '
                    </select>
                </div>

                <div class="col-4">
                    <div class="input-group">
                        <div class="input-group-text">%</div>
                        <input type="text" readonly name="discount[]" required class="form-control" id="discount" placeholder="Endirim faizi daxil edin">
                    </div>
                </div>

                <div class="col-auto">
                    <button type="button" class="new-before-reserv-day-discount btn btn-outline-info waves-effect waves-light">
                        <span><i class="fas fa-plus"></i></span>
                        Yeni endirim
                    </button>
                </div>
            </div>
        </div>';
        } elseif ($discount_id == 5) {
            $html .= '

            <div class="col-xl-4 mt-2">
                <div class="mb-3 mb-xl-0">
                    <label for="start_date" class="form-label">Ba??lan????c tarixi</label>
                    <input class="form-control" id="start_date" type="date" required name="start_date">
                </div>
            </div>
            <div class="col-xl-4 mt-2">
                <div class="mb-3 mb-xl-0">
                    <label for="finish_date" class="form-label">Sonlanma tarixi</label>
                    <input class="form-control" id="finish_date" type="date" required name="finish_date">
                </div>
            </div>
            <div class="align-items-center mt-4 lie-discount">

            <div class="row mt-2">

                <div class="col-4">
                    <select class="form-control" name="room_kinds_id[]">
                        <option disabled>Siyah??dan se??in</option>
                        <option value="all">B??t??n otaqlar</option>';
            foreach ($room_kinds as $kind) {
                $html .= '<option value="' . $kind['id'] . '">' . $kind['name'] . '</option>';
            }

            $html .= '
                    </select>
                </div>

                <div class="col-4">
                    <div class="input-group">
                        <div class="input-group-text">%</div>
                        <input type="text" readonly name="discount[]" required class="form-control" id="discount" placeholder="Endirim faizi daxil edin">
                    </div>
                </div>

                <div class="col-auto">
                    <button type="button" class="new-lie-discount btn btn-outline-info waves-effect waves-light">
                        <span><i class="fas fa-plus"></i></span>
                        Yeni endirim
                    </button>
                </div>
            </div>
        </div>';
        } elseif ($discount_id == 3) {
            $html .= '

            <div class="col-xl-4 mt-2">
                <div class="mb-3 mb-xl-0">
                    <label for="start_date" class="form-label">Ba??lan????c tarixi</label>
                    <input class="form-control" id="start_date" type="date" required name="start_date">
                </div>
            </div>
            <div class="col-xl-4 mt-2">
                <div class="mb-3 mb-xl-0">
                    <label for="finish_date" class="form-label">Sonlanma tarixi</label>
                    <input class="form-control" id="finish_date" type="date" required name="finish_date">
                </div>
            </div>

            <div class="align-items-center mt-4 day-discount">
            <div class="row">
                <div class="col-4">
                    <select class="form-control" name="room_kinds_id[]">
                        <option disabled>Siyah??dan se??in</option>
                        <option value="all">B??t??n otaqlar</option>';
            foreach ($room_kinds as $kind) {
                $html .=  '<option value="' . $kind['id'] . '">' . $kind['name'] . '</option>';
            }

            $html .= '</select>
                </div>

                <div class="col-2">
                    <div class="input-group">
                        <div class="input-group-text" id="min_night">G??nd??n</div>
                        <input type="text" readonly name="min_night[]" class="form-control" id="min_night">
                    </div>
                </div>

                <div class="col-2">
                    <div class="input-group">
                        <div class="input-group-text">G??n??</div>
                        <input type="text" readonly name="max_night[]" class="form-control" id="max_night">
                    </div>
                </div>

                <div class="mt-3">
                    <div class="form-check">
                        <input type="radio" name="depending_number_of_person" value="0" class="form-check-input radio_number_of_person" id="customCheck1">
                        <label class="form-check-label" value="1" for="customCheck1">Adam say??ndan as??l?? olmayaraq</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="depending_number_of_person" value="1" class="form-check-input radio_number_of_person" id="customCheck2">
                        <label class="form-check-label" for="customCheck2">Adam say??ndan as??l?? olaraq</label>
                    </div>
                </div>

                <div class="col-4 mt-2 number_of_person">
                    <div class="input-group">
                        <div class="input-group-text">
                            <span>
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        <input type="text" readonly name="number_of_person" class="form-control" id="discount" placeholder="Say daxil edin">
                    </div>
                </div>

                <div class="col-4 mt-2">
                    <input type="text" readonly name="discount[]" class="form-control" id="discount" placeholder="Endirim faizini daxil edin">
                </div>

            </div>
        </div>';
        }

        return $html;
    }

    public function save_discount_options(Request $request)
    {
        $discount_option_select = DiscountOptions::where('sanatoriums_id', $request->sanatoriums_id)
            ->where('discounts_id', $request->discounts_id)
            ->where('room_kinds_id', $request->room_kinds_id)
            ->latest()->first();
        if (!empty($discount_option_select) and ($request->start_date < $discount_option_select['finish_date'])) {
            return redirect()->back()->withInput($request->all());
        } else {
            for ($i = 0; $i < count($request->room_kinds_id); $i++) {
                $discount_options = new DiscountOptions();
                $discount_options->sanatoriums_id = $request->sanatoriums_id;
                $discount_options->discounts_id = $request->discounts_id;
                if ($request->room_kinds_id[$i] == "all") {
                    $discount_options->room_kinds_id = NULL;
                    $discount_options->all_rooms = 1;
                } else {
                    $discount_options->room_kinds_id = $request->room_kinds_id[$i];
                    $discount_options->all_rooms = 0;
                }
                $discount_options->start_date = $request->start_date;
                $discount_options->finish_date = $request->finish_date;
                $discount_options->discount = (isset($request->discount[$i]) ? $request->discount[$i] : NULL);
                $discount_options->min_night = (isset($request->min_night[$i]) ? $request->min_night[$i] : NULL);
                $discount_options->max_night = (isset($request->max_night[$i]) ? $request->max_night[$i] : NULL);
                $discount_options->depending_number_of_person = $request->depending_number_of_person;
                $discount_options->number_of_person = (isset($request->number_of_person) ? $request->number_of_person : NULL);
                $discount_options->free_night = (isset($request->free_night)) ? $request->free_night : NULL;
                $discount_options->before_reserv_day_start = (isset($request->before_reserv_day_start[$i])) ? $request->before_reserv_day_start[$i] : NULL;
                $discount_options->before_reserv_day_end = (isset($request->before_reserv_day_end[$i])) ? $request->before_reserv_day_end[$i] : NULL;
                $discount_options->save();
            }
        }

        return redirect()->route('admin.discount', ['sanatorium_id' => $request->sanatoriums_id])->with('success', 'M??lumatlar daxil edildi!');
    }

    public function sccs($sanatorium_id)
    {
        $data['sanatorium'] = Sanatoriums::find($sanatorium_id);
        return view('admin.sanatoriums.properties.cards.cards', $data);
    }

    public function check_credit_cards_status($id)
    {
        $card = Sccs::find($id);
        if ($card['status'] == 1) {
            $card->status = 0;
        } else {
            $card->status = 1;
        }
        $card->save();

        return "Status d??yi??dirildi!";
    }

    public function sccs_create($sanatorium_id)
    {
        $data['sanatorium'] = Sanatoriums::where('id', $sanatorium_id)->first();
        $data['cards']      = CreditCards::where('status', 1)->get();
        return view('admin.sanatoriums.properties.cards.create-cards', $data);
    }

    public function sccs_store(Request $request, $sanatorium_id)
    {
        $card = new Sccs();
        $card->sanatoriums_id = $request->sanatoriums_id;
        $card->start_date = $request->start_date;
        $card->finish_date = $request->finish_date;
        $card->credit_cards_id = json_encode($request->credit_cards_id);
        $card->cvv_available = ($request->cvv_available == "on") ? 1 : 0;
        $card->status = 1;
        $card->save();
        return redirect()->route('admin.sanatoriums.sanatorium-credit-cards', ['sanatorium_id' => $sanatorium_id])->with('success', 'M??lumatlar daxil edildi!');
    }

    public function edit_sccs($sanatorium_id, $card_id)
    {
        $data['sanatorium']         = Sanatoriums::where('id', $sanatorium_id)->first();
        $data['cards']              = CreditCards::where('status', 1)->get();
        $data['card']               = Sccs::where('sanatoriums_id', $sanatorium_id)->where('id', $card_id)->first();
        return view('admin.sanatoriums.properties.cards.edit-cards', $data);
    }

    public function update_sccs(Request $request, $sanatorium_id, $card_id)
    {
        $card = Sccs::find($card_id);
        $card->sanatoriums_id = $sanatorium_id;
        $card->start_date = $request->start_date;
        $card->finish_date = $request->finish_date;
        $card->credit_cards_id = json_encode($request->credit_cards_id);
        $card->cvv_available = ($request->cvv_available == "on") ? 1 : 0;
        $card->status = 1;
        $card->save();
        return redirect()->route('admin.sanatoriums.sanatorium-credit-cards', ['sanatorium_id' => $sanatorium_id])->with('success', 'M??lumatlar d??yi??dirildi!');
    }

    //wizarts
    public function wizarts($sanatorium_id)
    {
        $data['sanatorium']   = Sanatoriums::where('id', $sanatorium_id)->first();
        $data['srk'] = Srk::where('sanatoriums_id', $sanatorium_id)->get();
        return view('admin.sanatoriums.properties.wizart.wizarts', $data);
    }

    public function wizart_save(Request $request, $sanatorium_id)
    {
        $sanatorium = Sanatoriums::find($sanatorium_id);
        $ptk = Sws::where('sanatoriums_id', $sanatorium_id)->first();
        if ($ptk['price_table_kind'] == 1) {
            $table_name = $sanatorium->daily_price_group;
        } elseif ($ptk['price_table_kind'] == 2) {
            $table_name = $sanatorium->weekly_price_group;
        } else {
            $table_name = $sanatorium->optional_price_group;
        }
        DB::table($table_name)->where('sanatoriums_id', $sanatorium_id)->delete();
        Sws::where('sanatoriums_id', $sanatorium_id)->update(['price_table_kind' => $request->price_table_kind, 'food_count' => $request->food_count]);
        if ($request->price_table_kind == 2 || $request->price_table_kind == 3) {
            WizartOptionals::where('sanatoriums_id', $sanatorium_id)->delete();
            for ($i = 0; $i < count($request->min_day); $i++) {
                WizartOptionals::create([
                    'sanatoriums_id' => $sanatorium_id,
                    'min_day' => $request->min_day[$i],
                    'max_day' => $request->max_day[$i]
                ]);
            }
        }
        toast('Qiym??t c??dv??li n??v?? d??yi??dirildi.', 'success', 'bottom-right');
        return redirect()->back();
    }


    public function change_room_count($sanatorium_id, $room_kinds_id, $value)
    {
        Sws::where('sanatoriums_id', $sanatorium_id)->where('room_kinds_id', $room_kinds_id)->update(['room_count' => $value]);

        return getRoomName($room_kinds_id) . ' ??????n ??mumi otaq say?? ' . $value . ' olaraq d??yi??dirildi';
    }

    public function change_general_human_count($sanatorium_id, $room_kinds_id, $value)
    {
        $sws_check = Sws::where('sanatoriums_id', $sanatorium_id)->where('room_kinds_id', $room_kinds_id)->first();
        if ($value < $sws_check->older_count + $sws_check->child_count) {
            return "??mumi n??f??r say?? b??y??k v?? ki??ik n??f??rl??rin say?? c??mind??n ki??ik ola bilm??z.";
        } else {
            Sws::where('sanatoriums_id', $sanatorium_id)->where('room_kinds_id', $room_kinds_id)->update(['general_human_count' => $value]);
            return getRoomName($room_kinds_id) . ' ??????n ??mumi n??f??r say?? ' . $value . ' olaraq d??yi??dirildi';
        }
    }

    public function change_minimum_human_count($sanatorium_id, $room_kinds_id, $value)
    {
        $sws_check = Sws::where('sanatoriums_id', $sanatorium_id)->where('room_kinds_id', $room_kinds_id)->first();
        if ($value > $sws_check->older_count + $sws_check->child_count) {
            return "Minimum n??f??r say?? b??y??k v?? ki??ik n??f??rl??rin say?? c??mind??n b??y??k ola bilm??z.";
        } else {
            Sws::where('sanatoriums_id', $sanatorium_id)->where('room_kinds_id', $room_kinds_id)->update(['minimum_human_count' => $value]);
            return getRoomName($room_kinds_id) . ' ??????n minimum n??f??r say?? ' . $value . ' olaraq d??yi??dirildi';
        }
    }

    public function change_older_count($sanatorium_id, $room_kinds_id, $value)
    {
        $sws_check = Sws::where('sanatoriums_id', $sanatorium_id)->where('room_kinds_id', $room_kinds_id)->first();
        if ($value > $sws_check->general_human_count - $sws_check->child_count) {
            return "B??y??k n??f??r say?? ??mumi v?? ki??ik n??f??rl??rin say?? f??rqind??n b??y??k ola bilm??z.";
        } else {
            Sws::where('sanatoriums_id', $sanatorium_id)->where('room_kinds_id', $room_kinds_id)->update(['older_count' => $value]);
            return getRoomName($room_kinds_id) . ' ??????n b??y??k n??f??r say?? ' . $value . ' olaraq d??yi??dirildi';
        }
    }

    public function change_child_count($sanatorium_id, $room_kinds_id, $value)
    {
        $sws_check = Sws::where('sanatoriums_id', $sanatorium_id)->where('room_kinds_id', $room_kinds_id)->first();
        if ($value > $sws_check->general_human_count - $sws_check->older_count) {
            return "Ki??ik n??f??r say?? ??mumi v?? b??y??k n??f??rl??rin say?? f??rqind??n b??y??k ola bilm??z.";
        } else {
            Sws::where('sanatoriums_id', $sanatorium_id)->where('room_kinds_id', $room_kinds_id)->update(['child_count' => $value]);
            return getRoomName($room_kinds_id) . ' ??????n ki??ik n??f??r say?? ' . $value . ' olaraq d??yi??dirildi';
        }
    }

    public function change_possible_additional_beds($sanatorium_id, $room_kinds_id, $value)
    {
        Sws::where('sanatoriums_id', $sanatorium_id)->where('room_kinds_id', $room_kinds_id)->update(['possible_additional_beds' => $value]);
        return getRoomName($room_kinds_id) . ' ??????n ??lav?? oluna bil??c??k maksimum yataq say?? ' . $value . ' olaraq d??yi??dirildi';
    }

    public function change_for_beds($sanatorium_id, $room_kinds_id, $value)
    {
        Sws::where('sanatoriums_id', $sanatorium_id)->where('room_kinds_id', $room_kinds_id)->update(['for' => $value]);
        if ($value == 0) {
            $info = "U??aqlar ??????n";
        } else {
            $info = "B??y??kl??r ??????n";
        }
        return getRoomName($room_kinds_id) . ' ??????n ??lav?? oluna bil??c??k maksimum yataq say?? ' . $info . '  olaraq d??yi??dirildi';
    }


    public function children($sanatorium_id)
    {
        $data['sanatorium']   = Sanatoriums::where('id', $sanatorium_id)->first();
        return view('admin.sanatoriums.properties.children.children', $data);
    }

    public function stchild_store(Request $request, $sanatorium_id)
    {
        Stchild::where('sanatoriums_id', $sanatorium_id)->delete();
        for ($i = 0; $i < count($request->min_age); $i++) {
            Stchild::create([
                'sanatoriums_id'        => $sanatorium_id,
                'child_is_accepted'     => $request->child_is_accepted,
                'min_age'               => $request->min_age[$i],
                'max_age'               => $request->max_age[$i],
                'paid_or_not'           => $request->paid_or_not[$i]
            ]);
        }
        return redirect()->route('admin.sanatoriums.children', ['sanatorium_id' => $sanatorium_id])->with('success', 'M??alic??li - ya?? limiti ??????n m??lumatlar yenil??ndi!');
    }

    public function stoutchild_store(Request $request, $sanatorium_id)
    {
        Stoutchild::where('sanatoriums_id', $sanatorium_id)->delete();
        for ($i = 0; $i < count($request->min_age); $i++) {
            Stoutchild::create([
                'sanatoriums_id'            => $sanatorium_id,
                'out_child_is_accepted'     => $request->out_child_is_accepted,
                'min_age'                   => $request->min_age[$i],
                'max_age'                   => $request->max_age[$i],
                'paid_or_not'               => $request->paid_or_not[$i]
            ]);
        }
        return redirect()->route('admin.sanatoriums.children', ['sanatorium_id' => $sanatorium_id])->with('success', 'M??alic??siz - ya?? limiti ??????n m??lumatlar yenil??ndi!');
    }

    public function comments($sanatorium_id)
    {
        $data['sanatorium']   = Sanatoriums::where('id', $sanatorium_id)->first();
        return view('admin.sanatoriums.properties.comments.comments', $data);
    }

    public function comments_create($sanatorium_id)
    {
        $data['countries'] = Countries::where('status', 1)->get();
        $data['sanatorium']   = Sanatoriums::where('id', $sanatorium_id)->first();
        return view('admin.sanatoriums.properties.comments.create-comments', $data);
    }

    public function comments_store(Request $request, $sanatorium_id)
    {
        Comments::create($request->all());
        return redirect()->route('admin.sanatoriums.comments', ['sanatorium_id' => $sanatorium_id])->with('success', 'R??y m??v??ff??qiyy??tl?? daxil edildi!');
    }

    public function comments_edit($sanatorium_id, $comment_id)
    {
        $data['countries'] = Countries::where('status', 1)->get();
        $data['sanatorium']   = Sanatoriums::where('id', $sanatorium_id)->first();
        $data['comment'] = Comments::find($comment_id);
        return view('admin.sanatoriums.properties.comments.edit-comments', $data);
    }

    public function check_comments_status($id)
    {
        $comment = Comments::find($id);
        if ($comment['status'] == 1) {
            $comment->status = 0;
        } else {
            $comment->status = 1;
        }
        $comment->save();

        return "Status d??yi??dirildi!";
    }

    public function comments_update(Request $request, $comment_id)
    {
        $comment = Comments::find($comment_id);
        $comment->sanatoriums_id = $request->sanatoriums_id;
        $comment->country_id = $request->country_id;
        $comment->who_shared = $request->who_shared;
        $comment->treatment_quality = $request->treatment_quality;
        $comment->reservation_quality = $request->reservation_quality;
        $comment->food_quality = $request->food_quality;
        $comment->personal_quality = $request->personal_quality;
        $comment->location_quality = $request->location_quality;
        $comment->positive = $request->positive;
        $comment->negative = $request->negative;
        $comment->shared_at = $request->shared_at;
        $comment->save();

        return redirect()->route('admin.sanatoriums.comments', ['sanatorium_id' => $request->sanatoriums_id])->with('success', 'R??y m??lumatlar?? yenil??ndi!');
    }

    public function price($sanatorium_id)
    {
        $data['sanatorium']   = Sanatoriums::where('id', $sanatorium_id)->first();

        return view('admin.sanatoriums.properties.price.price', $data);
    }

    public function get_calendar(Request $request, $sanatorium_id)
    {
        $sanatoriums = Sanatoriums::find($sanatorium_id);

        $room = RoomKinds::find($request->room_id);
        $room_informations = Sws::where('room_kinds_id', $room['id'])->where('sanatoriums_id', $sanatorium_id)->first();
        $wizart_optional = WizartOptionals::where('sanatoriums_id', $sanatorium_id)->get();
        $selected_room_status = RoomStatus::where('sanatoriums_id', $sanatorium_id)->where('room_kinds_id', $room['id'])->pluck('week_days')->toArray();
        $stchild = Stchild::where('sanatoriums_id', $sanatorium_id)->get();
        $stoutchild = Stoutchild::where('sanatoriums_id', $sanatorium_id)->get();

        $html = '';

        $html .= '<div class="card-title">
        <h3>' . getRoomName($room['id']) . ' - ' . get_sanatorium_price_kind($sanatorium_id) . ' (' . $request->optional . ' g??nl??k)
            <div class="float-end">
                <button type="button" class="btn btn-warning waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#price-close-modal">Qiym??t t??yin edin</button>
                 <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#con-close-modal">Otaq statusu</button>

                <!-- status modal -->

                    <div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Otaq statusu</h3>
                                    <br>
                                    <h4>' . getRoomName($room['id']) . '<h4>
                                    <input type="hidden" name="room_kinds_id" id="room_id" value="' . $room['id'] . '">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4">

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-3" class="form-label">Tarixd??n</label>
                                                <input class="form-control" id="start_date" value="" type="date" required="" name="start_date">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-3" class="form-label">Tarix??</label>
                                                <input class="form-control" value="" id="end_date" type="date" required="" name="end_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <small class="primary">
                                            D??yi??ikliyi t??tbiq etm??k ist??diyiniz g??nl??ri se??in
                                        </small>

                                        <div class="col-md-6 mt-4">
                                            <label for=""><input class="ml-4" type="checkbox" checked name="days[]" value="Monday" id="monday">&nbsp;Bazar ert??si</label>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <label for=""><input class="ml-4" type="checkbox" checked name="days[]" value="Tuesday" id="tuesday">&nbsp;????r????nb?? ax??am??</label>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <label for=""><input class="ml-4" type="checkbox" checked name="days[]" value="Wednesday" id="wednesday">&nbsp;????r????nb??</label>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <label for=""><input class="ml-4" type="checkbox" checked name="days[]" value="Thursday" id="thursday">&nbsp;C??m?? ax??am??</label>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <label for=""><input class="ml-4" type="checkbox" checked name="days[]" value="Friday" id="friday">&nbsp;C??m??</label>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <label for=""><input class="ml-4" type="checkbox" checked name="days[]" value="Saturday" id="saturday">&nbsp;????nb??</label>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <label for=""><input class="ml-4" type="checkbox" checked name="days[]" value="Sunday" id="sunday">&nbsp;Bazar</label>
                                        </div>
                                        </div>
                                    <div class="row">
                                        <hr>
                                        <div class="col-md-12">
                                            <h3 class="text-center">' . getRoomName($room['id']) . '</h3>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">
                                            <label for="inputEmail3" class="col-4 col-xl-3 col-form-label">Status</label>
                                            <div class="col-8 col-xl-9">
                                                <select name="status" class="form-control" id="">
                                                <option value="1">Aktiv</option>
                                                <option value="0">Deaktiv</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Ba??la</button>
                                    <button type="submit" class="btn btn-info waves-effect waves-light save-status">Yadda saxla</button>
                                </div>
                                </div>
                             
                        </div>
                    </div>

                <!-- status modal end -->

                <!-- price modal -->

                <div id="price-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog">
                            
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Otaq statusu</h3>
                                    <br>
                                    <h4>' . getRoomName($room['id']) . '<h4>
                                    <input type="hidden" name="room_kinds_id" id="room_id" value="' . $room['id'] . '">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body p-4">';
        if ($room_informations['price_table_kind'] != 1) {
            $html .= '<div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="field-3" class="form-label">Paket</label>
                                            <input type="text" readonly id="package" name="package" value="' . $request->optional . '" class="form-control" />
                                            </div>
                                    </div>
                                </div>';
        }
        $html .= '<div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-3" class="form-label">Tarixd??n</label>
                                                <input class="form-control" id="price_start_date" value="" type="date" required="" name="start_date">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="field-3" class="form-label">Tarix??</label>
                                                <input class="form-control" value="" id="price_end_date" type="date" required="" name="end_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="price_checkboxes">
                                        <small class="primary">
                                            D??yi??ikliyi t??tbiq etm??k ist??diyiniz g??nl??ri se??in
                                        </small>
                                        <div class="col-md-6 mt-4">
                                            <label for="monday"><input class="ml-4" checked type="checkbox" name="days[]" value="Monday" id="monday">&nbsp;Bazar ert??si</label>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <label for="tuesday"><input class="ml-4" checked type="checkbox" name="days[]" value="Tuesday" id="tuesday">&nbsp;????r????nb?? ax??am??</label>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <label for="wednesday"><input class="ml-4" checked type="checkbox" name="days[]" value="Wednesday" id="wednesday">&nbsp;????r????nb??</label>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <label for="thursday"><input class="ml-4" checked type="checkbox" name="days[]" value="Thursday" id="thursday">&nbsp;C??m?? ax??am??</label>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <label for="friday"><input class="ml-4" checked type="checkbox" name="days[]" value="Friday" id="friday">&nbsp;C??m??</label>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <label for="saturday"><input class="ml-4" checked type="checkbox" name="days[]" value="Saturday" id="saturday">&nbsp;????nb??</label>
                                        </div>
                                        <div class="col-md-6 mt-4">
                                            <label for="sunday"><input class="ml-4" checked type="checkbox" name="days[]" value="Sunday" id="sunday">&nbsp;Bazar</label>
                                        </div>
                                        </div>
                                    <div class="row">
                                        <hr>
                                        <div class="col-md-12">
                                            <h3 class="text-center">' . getRoomName($room['id']) . '</h3>
                                        </div>
                                        <hr>
                                        <div class="row mb-3">

                                            <div class="col-6">
                                                <select name="room_price" class="form-control" id="room_price">';
        for ($i = 1; $i <= $room_informations['general_human_count']; $i++) {
            $html .= '<optgroup label="??mumi n??f??r say??">';
            if (get_food_count($sanatorium_id) == 1) {
                $html .= '<option value="' . $i . '-HBT"> ' . $i . ' n??f??r ??????n / 2 d??f?? yem??k / M??alic?? daxil</option>';
                $html .= '<option value="' . $i . '-HB"> ' . $i . ' n??f??r ??????n / 2 d??f?? yem??k / M??alic??siz</option>';
                $html .= '<option value="' . $i . '-FBT"> ' . $i . ' n??f??r ??????n / 3 d??f?? yem??k / M??alic?? daxil</option>';
                $html .= '<option value="' . $i . '-FB"> ' . $i . ' n??f??r ??????n / 3 d??f?? yem??k / M??alic??siz</option>';
            } elseif (get_food_count($sanatorium_id) == 2) {
                $html .= '<option value="' . $i . '-HBT"> ' . $i . ' n??f??r ??????n / 2 d??f?? yem??k / M??alic?? daxil</option>';
                $html .= '<option value="' . $i . '-HB"> ' . $i . ' n??f??r ??????n / 2 d??f?? yem??k / M??alic??siz</option>';
            } elseif (get_food_count($sanatorium_id) == 3) {
                $html .= '<option value="' . $i . '-FBT"> ' . $i . ' n??f??r ??????n / 3 d??f?? yem??k / M??alic?? daxil</option>';
                $html .= '<option value="' . $i . '-FB"> ' . $i . ' n??f??r ??????n / 3 d??f?? yem??k / M??alic??siz</option>';
            }
            $html .= '</optgroup>';
        }
        if ($room_informations['for'] == 1) {
            if ($room_informations['possible_additional_beds'] > 0) {
                $html .= '<optgroup label="B??y??kl??r ??????n ??lav?? yataq">';
                if (get_food_count($sanatorium_id) == 1) {
                    $html .= '<option value="1-pod-HBT">2 d??f?? yem??k / M??alic?? daxil</option>';
                    $html .= '<option value="1-pod-HB">2 d??f?? yem??k / M??alic??siz</option>';
                    $html .= '<option value="1-pod-FBT">3 d??f?? yem??k / M??alic?? daxil</option>';
                    $html .= '<option value="1-pod-FB">3 d??f?? yem??k / M??alic??siz</option>';
                } elseif (get_food_count($sanatorium_id) == 2) {
                    $html .= '<option value="1-pod-HBT">2 d??f?? yem??k / M??alic?? daxil</option>';
                    $html .= '<option value="1-pod-HB">2 d??f?? yem??k / M??alic??siz</option>';
                } elseif (get_food_count($sanatorium_id) == 3) {
                    $html .= '<option value="1-pod-FBT">3 d??f?? yem??k / M??alic?? daxil</option>';
                    $html .= '<option value="1-pod-FB">3 d??f?? yem??k / M??alic??siz</option>';
                }
                $html .= '</optgroup>';
            }
        }

        foreach ($stchild as $i => $child) {
            if ($child['paid_or_not'] == 1) {
                $html .= '<optgroup label="' . $child["min_age"] . ' - ' . $child["max_age"] . ' ya?? aral??????">';
                if (get_food_count($sanatorium_id) == 1) {
                    $html .= '<option value="' . $child["min_age"] . '-' . $child["max_age"] . '-range-HBT"> 2 d??f?? yem??k / M??alic?? daxil</option>';
                    $html .= '<option value="' . $child["min_age"] . '-' . $child["max_age"] . '-range-FBT"> 3 d??f?? yem??k / M??alic?? daxil</option>';
                } elseif (get_food_count($sanatorium_id) == 2) {
                    $html .= '<option value="' . $child["min_age"] . '-' . $child["max_age"] . '-range-HBT"> 2 d??f?? yem??k / M??alic?? daxil</option>';
                } elseif (get_food_count($sanatorium_id) == 3) {
                    $html .= '<option value="' . $child["min_age"] . '-' . $child["max_age"] . '-range-FBT"> 3 d??f?? yem??k / M??alic?? daxil</option>';
                }
                if ($room_informations['possible_additional_beds'] > 0) {
                    $html .= '<optgroup label="' . $child["min_age"] . ' - ' . $child["max_age"] . ' ya?? aral?????? ??????n ??lav?? yataq">';
                    if (get_food_count($sanatorium_id) == 1) {
                        $html .= '<option value="' . $child["min_age"] . '-' . $child["max_age"] . '-child-pod-HBT">2 d??f?? yem??k / M??alic?? daxil</option>';
                        $html .= '<option value="' . $child["min_age"] . '-' . $child["max_age"] . '-child-pod-FBT">3 d??f?? yem??k / M??alic?? daxil</option>';
                    } elseif (get_food_count($sanatorium_id) == 2) {
                        $html .= '<option value="' . $child["min_age"] . '-' . $child["max_age"] . '-child-pod-HBT">2 d??f?? yem??k / M??alic?? daxil</option>';
                    } elseif (get_food_count($sanatorium_id) == 2) {
                        $html .= '<option value="' . $child["min_age"] . '-' . $child["max_age"] . '-child-pod-FBT">3 d??f?? yem??k / M??alic?? daxil</option>';
                    }
                    $html .= '</optgroup>';
                }
            }
        }

        foreach ($stoutchild as $i => $outchild) {
            if ($outchild['paid_or_not'] == 1) {
                $html .= '<optgroup label="' . $outchild["min_age"] . ' - ' . $outchild["max_age"] . ' ya?? aral??????">';
                if (get_food_count($sanatorium_id) == 1) {
                    $html .= '<option value="' . $outchild['min_age'] . "-" . $outchild['max_age'] . '-range-HB"> 2 d??f?? yem??k / M??alic??siz</option>';
                    $html .= '<option value="' . $outchild['min_age'] . "-" . $outchild['max_age'] . '-range-FB"> 3 d??f?? yem??k / M??alic??siz</option>';
                } elseif (get_food_count($sanatorium_id) == 2) {
                    $html .= '<option value="' . $outchild['min_age'] . "-" . $outchild['max_age'] . '-range-HB"> 2 d??f?? yem??k / M??alic??siz</option>';
                } elseif (get_food_count($sanatorium_id) == 3) {
                    $html .= '<option value="' . $outchild['min_age'] . "-" . $outchild['max_age'] . '-range-FB"> 3 d??f?? yem??k / M??alic??siz</option>';
                }

                if ($room_informations['possible_additional_beds'] > 0) {
                    $html .= '<optgroup label="' . $outchild["min_age"] . ' - ' . $outchild["max_age"] . ' ya?? aral?????? ??????n ??lav?? yataq">';
                    if (get_food_count($sanatorium_id) == 1) {
                        $html .= '<option value="' . $outchild['min_age'] . "-" . $outchild['max_age'] . '-child-pod-HB">2 d??f?? yem??k / M??alic??siz</option>';
                        $html .= '<option value="' . $outchild['min_age'] . "-" . $outchild['max_age'] . '-child-pod-FB">3 d??f?? yem??k / M??alic??siz</option>';
                    } elseif (get_food_count($sanatorium_id) == 2) {
                        $html .= '<option value="' . $outchild['min_age'] . "-" . $outchild['max_age'] . '-child-pod-HB">2 d??f?? yem??k / M??alic??siz</option>';
                    } elseif (get_food_count($sanatorium_id) == 3) {
                        $html .= '<option value="' . $outchild['min_age'] . "-" . $outchild['max_age'] . '-child-pod-FB">3 d??f?? yem??k / M??alic??siz</option>';
                    }
                }
                $html .= '</optgroup>';
            }
        }
        $html .= '</select>
                                            </div>
                                            <div class="col-6">
                                            <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                              <span class="input-group-text">$</span>
                                            </div>
                                            <input type="number" class="form-control" id="price">
                                            <div class="input-group-append">
                                              <span class="input-group-text">.00</span>
                                            </div>
                                          </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Ba??la</button>
                                    <button type="button" class="btn btn-info waves-effect waves-light save-price">Yadda saxla</button>
                                </div>
                                </div>
                             
                        </div>
                    </div>

                <!-- price modal end -->

            </div>
        </h3>
        
    </div>

    <div class="mt-4 table-responsive">
        <table class="table table-bordered">
        <colgroup>
            <col style="width:50px;">
        </colgroup>
            <tr>
                <td class="text-primary text-center"><span><i class="fas fa-calendar-day"></i></span></td>';
        $ranges = CarbonPeriod::create($request->start_date, $request->end_date);
        foreach ($ranges as $range) {
            $html .= "<td>";
            $html .= "<strong><span class='days'>" . $range->day . "</span>&nbsp;";
            $html .= "<span class='months'>" . $range->format('F') . "</span></strong><br>";
            $html .= "<small class='days_name'>" . $range->format('l') . "</small>";
            $html .= "</td>";
        }
        $html .= '</tr>
            <tr>
                <td class="text-warning text-center"><span><i class="fas fa-exclamation-triangle"></i></span></td>';
        foreach ($ranges as $range) {
            if (count($selected_room_status) > 0) {
                if (in_array($range->format('Y-m-d'), $selected_room_status)) {
                    $html .= '<td class="bg-danger text-center text-white">Ba??l??d??r</td>';
                } else {
                    $html .= '<td class="bg-success text-center text-white">A????qd??r</td>';
                }
            } else {
                $html .= '<td class="bg-success text-center text-white">A????qd??r</td>';
            }
        }
        $html .= '</tr>';
        $html .= '<tbody class="table-body">';
        for ($i = 1; $i <= $room_informations['general_human_count']; $i++) {
            $html .= '<tr><td colspan="' . $this->dateDiffInDays($request->start_date, $request->end_date) . '"><h4>' . $i . ' n??f??r ??????n qiym??t ??z??llikl??ri</h4></td></tr>';
            if (get_food_count($sanatorium_id) == 1) {
                $html .= '<tr>
            <td class="w-25"><ul class="table-informations"><li class="menu-item">N??f??r say?? -';
                for ($j = 1; $j <= $i; $j++) {
                    $html .= '<span><i class="fas fa-user text-info"></i></span>';
                }
                $html .= '</li><li class="menu-item">Yem??k say?? - 2 d??f??</li> <li class="menu-item">M??alic?? daxil - <span><i class="fas fa-hospital text-success"></i></span> </li>';

                $html .= '</ul></td>';
                foreach ($ranges as $range) {
                    $html .= '<td class="' . $i . '-HBT">
                <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" step="any" name="' . $i . '-HBT" value="' . get_price($sanatorium_id, $room["id"], $i . '-HBT', $range->format('Y-m-d'), $request->optional) . '" class="form-control">
                </td>';
                }
                $html .= '</tr>';

                $html .= '<tr>
            <td class="w-25"><ul class="table-informations"><li class="menu-item">N??f??r say?? -';
                for ($j = 1; $j <= $i; $j++) {
                    $html .= '<span><i class="fas fa-user text-info"></i></span>';
                }
                $html .= '</li><li class="menu-item">Yem??k say?? - 3 d??f??</li> <li class="menu-item">M??alic?? daxil - <span><i class="fas fa-hospital text-success"></i></span> </li>';

                $html .= '</ul></td>';
                foreach ($ranges as $range) {
                    $html .= '<td class="' . $i . '-FBT">
                <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" name="' . $i . '-FBT" value="' . get_price($sanatorium_id, $room["id"], $i . '-FBT', $range->format('Y-m-d'), $request->optional) . '" class="form-control">
                </td>';
                }
                $html .= '</tr>';

                $html .= '<tr>
            <td class="w-25"><ul class="table-informations"><li class="menu-item">N??f??r say?? -';
                for ($j = 1; $j <= $i; $j++) {
                    $html .= '<span><i class="fas fa-user text-info"></i></span>';
                }
                $html .= '</li><li class="menu-item">Yem??k say?? - 2 d??f??</li> <li class="menu-item">M??alic??siz - <span><i class="fas fa-times text-danger"></i></span> </li>';

                $html .= '</ul></td>';
                foreach ($ranges as $range) {
                    $html .= '<td class="' . $i . '-HB">
                <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" class="form-control" value="' . get_price($sanatorium_id, $room["id"], $i . '-HB', $range->format('Y-m-d'), $request->optional) . '" name="' . $i . '-HB">
                </td>';
                }
                $html .= '</tr>';

                $html .= '<tr>
            <td class="w-25"><ul class="table-informations"><li class="menu-item">N??f??r say?? -';
                for ($j = 1; $j <= $i; $j++) {
                    $html .= '<span><i class="fas fa-user text-info"></i></span>';
                }
                $html .= '</li><li class="menu-item">Yem??k say?? - 3 d??f??</li> <li class="menu-item">M??alic??siz - <span><i class="fas fa-times text-danger"></i></span> </li>';

                $html .= '</ul></td>';
                foreach ($ranges as $range) {
                    $html .= '<td class="' . $i . '-FB">
                <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" class="form-control" value="' . get_price($sanatorium_id, $room["id"], $i . '-FB', $range->format('Y-m-d'), $request->optional) . '" name="' . $i . '-FB">
                </td>';
                }
                $html .= '</tr>';
            } elseif (get_food_count($sanatorium_id) == 2) {
                $html .= '<tr>
            <td class="w-25"><ul class="table-informations"><li class="menu-item">N??f??r say?? -';
                for ($j = 1; $j <= $i; $j++) {
                    $html .= '<span><i class="fas fa-user text-info"></i></span>';
                }
                $html .= '</li><li class="menu-item">Yem??k say?? - 2 d??f??</li> <li class="menu-item">M??alic?? daxil - <span><i class="fas fa-hospital text-success"></i></span> </li>';

                $html .= '</ul></td>';
                foreach ($ranges as $range) {
                    $html .= '<td class="' . $i . '-HBT">
                <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" step="any" name="' . $i . '-HBT" value="' . get_price($sanatorium_id, $room["id"], $i . '-HBT', $range->format('Y-m-d'), $request->optional) . '" class="form-control">
                </td>';
                }
                $html .= '</tr>';

                $html .= '<tr>
            <td class="w-25"><ul class="table-informations"><li class="menu-item">N??f??r say?? -';
                for ($j = 1; $j <= $i; $j++) {
                    $html .= '<span><i class="fas fa-user text-info"></i></span>';
                }
                $html .= '</li><li class="menu-item">Yem??k say?? - 2 d??f??</li> <li class="menu-item">M??alic??siz - <span><i class="fas fa-times text-danger"></i></span> </li>';

                $html .= '</ul></td>';
                foreach ($ranges as $range) {
                    $html .= '<td class="' . $i . '-HB">
                <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" class="form-control" value="' . get_price($sanatorium_id, $room["id"], $i . '-HB', $range->format('Y-m-d'), $request->optional) . '" name="' . $i . '-HB">
                </td>';
                }
                $html .= '</tr>';
            } elseif (get_food_count($sanatorium_id) == 3) {

                $html .= '<tr>
            <td class="w-25"><ul class="table-informations"><li class="menu-item">N??f??r say?? -';
                for ($j = 1; $j <= $i; $j++) {
                    $html .= '<span><i class="fas fa-user text-info"></i></span>';
                }
                $html .= '</li><li class="menu-item">Yem??k say?? - 3 d??f??</li> <li class="menu-item">M??alic?? daxil - <span><i class="fas fa-hospital text-success"></i></span> </li>';

                $html .= '</ul></td>';
                foreach ($ranges as $range) {
                    $html .= '<td class="' . $i . '-FBT">
                <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" name="' . $i . '-FBT" value="' . get_price($sanatorium_id, $room["id"], $i . '-FBT', $range->format('Y-m-d'), $request->optional) . '" class="form-control">
                </td>';
                }
                $html .= '</tr>';



                $html .= '<tr>
            <td class="w-25"><ul class="table-informations"><li class="menu-item">N??f??r say?? -';
                for ($j = 1; $j <= $i; $j++) {
                    $html .= '<span><i class="fas fa-user text-info"></i></span>';
                }
                $html .= '</li><li class="menu-item">Yem??k say?? - 3 d??f??</li> <li class="menu-item">M??alic??siz - <span><i class="fas fa-times text-danger"></i></span> </li>';

                $html .= '</ul></td>';
                foreach ($ranges as $range) {
                    $html .= '<td class="' . $i . '-FB">
                <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" class="form-control" value="' . get_price($sanatorium_id, $room["id"], $i . '-FB', $range->format('Y-m-d'), $request->optional) . '" name="' . $i . '-FB">
                </td>';
                }
                $html .= '</tr>';
            }
        }
        $html .= '<tr><td colspan="' . $this->dateDiffInDays($request->start_date, $request->end_date) . '"></td></tr>';

        if ($room_informations['for'] == 1) {
            if ($room_informations['possible_additional_beds'] > 0) {
                $html .= '<tr><td colspan="' . $this->dateDiffInDays($request->start_date, $request->end_date) . '"><h4>??lav?? yataq</h4></td></tr>';
                if (get_food_count($sanatorium_id) == 1) {
                    $html .= '<tr>
                    <td class="w-25"><ul class="table-informations">
                    <li class="menu-item">Yem??k say?? - 2 d??f??</li> <li class="menu-item">M??alic?? daxil - <span><i class="fas fa-hospital text-success"></i></span> </li>';

                    $html .= '</ul></td>';
                    foreach ($ranges as $range) {
                        $html .= '<td class="1-pod-HBT">
                        <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" value="' . get_price($sanatorium_id, $room["id"], '1-pod-HBT', $range->format('Y-m-d'), $request->optional) . '" class="form-control" name="1-pod-HBT">
                        </td>';
                    }
                    $html .= '</tr>';

                    $html .= '<tr>
                    <td class="w-25"><ul class="table-informations"><li class="menu-item">Yem??k say?? - 3 d??f??</li> <li class="menu-item">M??alic?? daxil - <span><i class="fas fa-hospital text-success"></i></span> </li>';

                    $html .= '</ul></td>';
                    foreach ($ranges as $range) {
                        $html .= '<td class="1-pod-FBT">
                        <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '"  class="form-control" value="' . get_price($sanatorium_id, $room["id"], '1-pod-FBT', $range->format('Y-m-d'), $request->optional) . '">
                        </td>';
                    }
                    $html .= '</tr>';

                    $html .= '<tr>
                    <td class="w-25"><ul class="table-informations"><li class="menu-item">Yem??k say?? - 2 d??f??</li> <li class="menu-item">M??alic??siz - <span><i class="fas fa-times text-danger"></i></span> </li>';

                    $html .= '</ul></td>';
                    foreach ($ranges as $range) {
                        $html .= '<td class="1-pod-HB">
                        <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '"  class="form-control" value="' . get_price($sanatorium_id, $room["id"], '1-pod-HB', $range->format('Y-m-d'), $request->optional) . '" name="1-pod-FBT">
                        </td>';
                    }
                    $html .= '</tr>';

                    $html .= '<tr>
                    <td class="w-25"><ul class="table-informations"><li class="menu-item">Yem??k say?? - 3 d??f??</li> <li class="menu-item">M??alic??siz - <span><i class="fas fa-times text-danger"></i></span> </li>';

                    $html .= '</ul></td>';
                    foreach ($ranges as $range) {
                        $html .= '<td class="1-pod-FB">
                        <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" class="form-control" value="' . get_price($sanatorium_id, $room["id"], '1-pod-FB', $range->format('Y-m-d'), $request->optional) . '" name="1-pod-FB">
                        </td>';
                    }
                    $html .= '</tr>';
                } elseif (get_food_count($sanatorium_id) == 2) {
                    $html .= '<tr>
                    <td class="w-25"><ul class="table-informations">
                    <li class="menu-item">Yem??k say?? - 2 d??f??</li> <li class="menu-item">M??alic?? daxil - <span><i class="fas fa-hospital text-success"></i></span> </li>';

                    $html .= '</ul></td>';
                    foreach ($ranges as $range) {
                        $html .= '<td class="1-pod-HBT">
                        <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" value="' . get_price($sanatorium_id, $room["id"], '1-pod-HBT', $range->format('Y-m-d'), $request->optional) . '" class="form-control" name="1-pod-HBT">
                        </td>';
                    }
                    $html .= '</tr>';
                    $html .= '<tr>
                    <td class="w-25"><ul class="table-informations"><li class="menu-item">Yem??k say?? - 2 d??f??</li> <li class="menu-item">M??alic??siz - <span><i class="fas fa-times text-danger"></i></span> </li>';

                    $html .= '</ul></td>';
                    foreach ($ranges as $range) {
                        $html .= '<td class="1-pod-HB">
                        <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '"  class="form-control" value="' . get_price($sanatorium_id, $room["id"], '1-pod-HB', $range->format('Y-m-d'), $request->optional) . '" name="1-pod-FBT">
                        </td>';
                    }
                    $html .= '</tr>';
                } elseif (get_food_count($sanatorium_id) == 3) {

                    $html .= '<tr>
                    <td class="w-25"><ul class="table-informations"><li class="menu-item">Yem??k say?? - 3 d??f??</li> <li class="menu-item">M??alic?? daxil - <span><i class="fas fa-hospital text-success"></i></span> </li>';

                    $html .= '</ul></td>';
                    foreach ($ranges as $range) {
                        $html .= '<td class="1-pod-FBT">
                        <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '"  class="form-control" value="' . get_price($sanatorium_id, $room["id"], '1-pod-FBT', $range->format('Y-m-d'), $request->optional) . '">
                        </td>';
                    }
                    $html .= '</tr>';



                    $html .= '<tr>
                    <td class="w-25"><ul class="table-informations"><li class="menu-item">Yem??k say?? - 3 d??f??</li> <li class="menu-item">M??alic??siz - <span><i class="fas fa-times text-danger"></i></span> </li>';

                    $html .= '</ul></td>';
                    foreach ($ranges as $range) {
                        $html .= '<td class="1-pod-FB">
                        <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" class="form-control" value="' . get_price($sanatorium_id, $room["id"], '1-pod-FB', $range->format('Y-m-d'), $request->optional) . '" name="1-pod-FB">
                        </td>';
                    }
                    $html .= '</tr>';
                }
            }
        }


        if ($stchild->count() > 0) {
            foreach ($stchild as $child) {
                if ($child['paid_or_not'] == 0) {
                    $class = "readonly";
                    $placeholder = "Free";
                } else {
                    $class = "";
                    $placeholder = "";
                }
                $html .= '<tr><td colspan="' . $this->dateDiffInDays($request->start_date, $request->end_date) . '"><h4>' . $child['min_age'] . " - " . $child['max_age'] . ' ya?? aral?????? - M??alic?? daxil</h4></td></tr>';
                if (get_food_count($sanatorium_id) == 1) {
                    $html .= '<tr>
                <td class="w-25"><ul class="table-informations">';
                    $html .= '<li class="menu-item">Yem??k say?? - 2 d??f?? </li> <li class="menu-item">M??alic?? daxil - <span><i class="fas fa-hospital text-success"></i></span> </li>';

                    $html .= '</ul></td>';
                    foreach ($ranges as $range) {
                        $html .= '<td class="' . $child['min_age'] . "-" . $child['max_age'] . '-range-HBT">
                    <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" ' . $class . ' placeholder="' . $placeholder . '" value="' . get_price($sanatorium_id, $room["id"], $child['min_age'] . "-" . $child['max_age'] . '-range-HBT', $range->format('Y-m-d'), $request->optional) . '" class="form-control">
                    </td>';
                    }
                    $html .= '</tr>';

                    $html .= '<tr>
                <td class="w-25"><ul class="table-informations">';
                    $html .= '<li class="menu-item">Yem??k say?? - 3 d??f??</li> <li class="menu-item">M??alic?? daxil - <span><i class="fas fa-hospital text-success"></i></span> </li>';

                    $html .= '</ul></td>';
                    foreach ($ranges as $range) {
                        $html .= '<td class="' . $child['min_age'] . "-" . $child['max_age'] . '-range-FBT">
                    <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" ' . $class . ' placeholder="' . $placeholder . '" value="' . get_price($sanatorium_id, $room["id"], $child['min_age'] . "-" . $child['max_age'] . '-range-FBT', $range->format('Y-m-d'), $request->optional) . '" class="form-control">
                    </td>';
                    }
                    $html .= '</tr>';
                } elseif (get_food_count($sanatorium_id) == 2) {
                    $html .= '<tr>
                <td class="w-25"><ul class="table-informations">';
                    $html .= '<li class="menu-item">Yem??k say?? - 2 d??f?? </li> <li class="menu-item">M??alic?? daxil - <span><i class="fas fa-hospital text-success"></i></span> </li>';

                    $html .= '</ul></td>';
                    foreach ($ranges as $range) {
                        $html .= '<td class="' . $child['min_age'] . "-" . $child['max_age'] . '-range-HBT">
                    <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" ' . $class . ' placeholder="' . $placeholder . '" value="' . get_price($sanatorium_id, $room["id"], $child['min_age'] . "-" . $child['max_age'] . '-range-HBT', $range->format('Y-m-d'), $request->optional) . '" class="form-control">
                    </td>';
                    }
                    $html .= '</tr>';
                } elseif (get_food_count($sanatorium_id) == 3) {

                    $html .= '<tr>
                <td class="w-25"><ul class="table-informations">';
                    $html .= '<li class="menu-item">Yem??k say?? - 3 d??f??</li> <li class="menu-item">M??alic?? daxil - <span><i class="fas fa-hospital text-success"></i></span> </li>';

                    $html .= '</ul></td>';
                    foreach ($ranges as $range) {
                        $html .= '<td class="' . $child['min_age'] . "-" . $child['max_age'] . '-range-FBT">
                    <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" ' . $class . ' placeholder="' . $placeholder . '" value="' . get_price($sanatorium_id, $room["id"], $child['min_age'] . "-" . $child['max_age'] . '-range-FBT', $range->format('Y-m-d'), $request->optional) . '" class="form-control">
                    </td>';
                    }
                    $html .= '</tr>';
                }


                if ($room_informations['possible_additional_beds'] > 0) {
                    $html .= '<tr><td colspan="' . $this->dateDiffInDays($request->start_date, $request->end_date) . '"><h4>??lav?? yataq</h4></td></tr>';
                    if (get_food_count($sanatorium_id) == 1) {
                        $html .= '<tr>
                    <td class="w-25"><ul class="table-informations">
                    <li class="menu-item">Yem??k say?? - 2 d??f??</li> <li class="menu-item">M??alic?? daxil - <span><i class="fas fa-hospital text-success"></i></span> </li>';

                        $html .= '</ul></td>';
                        foreach ($ranges as $range) {
                            $html .= '<td class="' . $child['min_age'] . "-" . $child['max_age'] . '-child-pod-HBT">
                        <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" ' . $class . ' placeholder="' . $placeholder . '" value="' . get_price($sanatorium_id, $room["id"], $child['min_age'] . "-" . $child['max_age'] . '-child-pod-HBT', $range->format('Y-m-d'), $request->optional) . '" class="form-control" value="0">
                        </td>';
                        }
                        $html .= '</tr>';

                        $html .= '<tr>
                    <td class="w-25"><ul class="table-informations"><li class="menu-item">Yem??k say?? - 3 d??f??</li> <li class="menu-item">M??alic?? daxil - <span><i class="fas fa-hospital text-success"></i></span> </li>';

                        $html .= '</ul></td>';
                        foreach ($ranges as $range) {
                            $html .= '<td class="' . $child['min_age'] . "-" . $child['max_age'] . '-child-pod-FBT">
                        <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" ' . $class . ' placeholder="' . $placeholder . '" value="' . get_price($sanatorium_id, $room["id"], $child['min_age'] . "-" . $child['max_age'] . '-child-pod-FBT', $range->format('Y-m-d'), $request->optional) . '" class="form-control" value="0">
                        </td>';
                        }
                        $html .= '</tr>';
                    } elseif (get_food_count($sanatorium_id) == 2) {
                        $html .= '<tr>
                    <td class="w-25"><ul class="table-informations">
                    <li class="menu-item">Yem??k say?? - 2 d??f??</li> <li class="menu-item">M??alic?? daxil - <span><i class="fas fa-hospital text-success"></i></span> </li>';

                        $html .= '</ul></td>';
                        foreach ($ranges as $range) {
                            $html .= '<td class="' . $child['min_age'] . "-" . $child['max_age'] . '-child-pod-HBT">
                        <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" ' . $class . ' placeholder="' . $placeholder . '" value="' . get_price($sanatorium_id, $room["id"], $child['min_age'] . "-" . $child['max_age'] . '-child-pod-HBT', $range->format('Y-m-d'), $request->optional) . '" class="form-control" value="0">
                        </td>';
                        }
                        $html .= '</tr>';
                    } elseif (get_food_count($sanatorium_id) == 3) {
                        $html .= '<tr>
                    <td class="w-25"><ul class="table-informations"><li class="menu-item">Yem??k say?? - 3 d??f??</li> <li class="menu-item">M??alic?? daxil - <span><i class="fas fa-hospital text-success"></i></span> </li>';

                        $html .= '</ul></td>';
                        foreach ($ranges as $range) {
                            $html .= '<td class="' . $child['min_age'] . "-" . $child['max_age'] . '-child-pod-FBT">
                        <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" ' . $class . ' placeholder="' . $placeholder . '" value="' . get_price($sanatorium_id, $room["id"], $child['min_age'] . "-" . $child['max_age'] . '-child-pod-FBT', $range->format('Y-m-d'), $request->optional) . '" class="form-control" value="0">
                        </td>';
                        }
                        $html .= '</tr>';
                    }
                }
            }
        }
        $html .= '<tr><td colspan="' . $this->dateDiffInDays($request->start_date, $request->end_date) . '"></td></tr>';
        if ($stoutchild->count() > 0) {
            foreach ($stoutchild as $outchild) {
                if ($outchild['paid_or_not'] == 0) {
                    $class = "readonly";
                    $placeholder = "Free";
                } else {
                    $class = "";
                    $placeholder = "";
                }
                $html .= '<tr><td colspan="' . $this->dateDiffInDays($request->start_date, $request->end_date) . '"><h4>' . $outchild['min_age'] . " - " . $outchild['max_age'] . ' ya?? aral?????? - M??alic??siz</h4></td></tr>';
                if (get_food_count($sanatorium_id) == 1) {
                    $html .= '<tr>
                <td class="w-25"><ul class="table-informations">';
                    $html .= '<li class="menu-item">Yem??k say?? - 2 d??f??</li> <li class="menu-item">M??alic??siz - <span><i class="fas fa-times text-danger"></i></span> </li>';

                    $html .= '</ul></td>';
                    foreach ($ranges as $range) {
                        $html .= '<td class="' . $outchild['min_age'] . "-" . $outchild['max_age'] . '-range-HB">
                    <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" ' . $class . ' placeholder="' . $placeholder . '" value="' . get_price($sanatorium_id, $room["id"], $outchild['min_age'] . "-" . $outchild['max_age'] . '-range-HB', $range->format('Y-m-d'), $request->optional) . '" class="form-control">
                    </td>';
                    }
                    $html .= '</tr>';

                    $html .= '<tr>
                <td class="w-25"><ul class="table-informations">';
                    $html .= '<li class="menu-item">Yem??k say?? - 3 d??f??</li>  <li class="menu-item">M??alic??siz - <span><i class="fas fa-times text-danger"></i></span> </li>    ';

                    $html .= '</ul></td>';
                    foreach ($ranges as $range) {
                        $html .= '<td class="' . $outchild['min_age'] . "-" . $outchild['max_age'] . '-range-FB">
                    <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" ' . $class . ' placeholder="' . $placeholder . '" value="' . get_price($sanatorium_id, $room["id"], $outchild['min_age'] . "-" . $outchild['max_age'] . '-range-FB', $range->format('Y-m-d'), $request->optional) . '" class="form-control">
                    </td>';
                    }
                    $html .= '</tr>';
                } elseif (get_food_count($sanatorium_id) == 2) {
                    $html .= '<tr>
                <td class="w-25"><ul class="table-informations">';
                    $html .= '<li class="menu-item">Yem??k say?? - 2 d??f??</li> <li class="menu-item">M??alic??siz - <span><i class="fas fa-times text-danger"></i></span> </li>';

                    $html .= '</ul></td>';
                    foreach ($ranges as $range) {
                        $html .= '<td class="' . $outchild['min_age'] . "-" . $outchild['max_age'] . '-range-HB">
                    <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" ' . $class . ' placeholder="' . $placeholder . '" value="' . get_price($sanatorium_id, $room["id"], $outchild['min_age'] . "-" . $outchild['max_age'] . '-range-HB', $range->format('Y-m-d'), $request->optional) . '" class="form-control">
                    </td>';
                    }
                    $html .= '</tr>';
                } elseif (get_food_count($sanatorium_id) == 3) {
                    $html .= '<tr>
                <td class="w-25"><ul class="table-informations">';
                    $html .= '<li class="menu-item">Yem??k say?? - 3 d??f??</li>  <li class="menu-item">M??alic??siz - <span><i class="fas fa-times text-danger"></i></span> </li>    ';

                    $html .= '</ul></td>';
                    foreach ($ranges as $range) {
                        $html .= '<td class="' . $outchild['min_age'] . "-" . $outchild['max_age'] . '-range-FB">
                    <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '" ' . $class . ' placeholder="' . $placeholder . '" value="' . get_price($sanatorium_id, $room["id"], $outchild['min_age'] . "-" . $outchild['max_age'] . '-range-FB', $range->format('Y-m-d'), $request->optional) . '" class="form-control">
                    </td>';
                    }
                    $html .= '</tr>';
                }

                if ($room_informations['possible_additional_beds'] > 0) {
                    $html .= '<tr><td colspan="' . $this->dateDiffInDays($request->start_date, $request->end_date) . '"><h4>??lav?? yataq</h4></td></tr>';

                    if (get_food_count($sanatorium_id) == 1) {
                        $html .= '<tr>
                    <td class="w-25"><ul class="table-informations"><li class="menu-item">Yem??k say?? - 2 d??f??</li> <li class="menu-item">M??alic??siz - <span><i class="fas fa-times text-danger"></i></span> </li>';

                        $html .= '</ul></td>';
                        foreach ($ranges as $range) {
                            $html .= '<td class="' . $outchild['min_age'] . "-" . $outchild['max_age'] . '-child-pod-HB">
                        <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '"  ' . $class . ' placeholder="' . $placeholder . '" value="' . get_price($sanatorium_id, $room["id"], $outchild['min_age'] . "-" . $outchild['max_age'] . '-child-pod-HB', $range->format('Y-m-d'), $request->optional) . '" class="form-control">
                        </td>';
                        }
                        $html .= '</tr>';

                        $html .= '<tr>
                    <td class="w-25"><ul class="table-informations"><li class="menu-item">Yem??k say?? - 3 d??f??</li> <li class="menu-item">M??alic??siz - <span><i class="fas fa-times text-danger"></i></span> </li>';

                        $html .= '</ul></td>';
                        foreach ($ranges as $range) {
                            $html .= '<td "' . $outchild['min_age'] . "-" . $outchild['max_age'] . '-child-pod-FB">
                        <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '"  ' . $class . ' placeholder="' . $placeholder . '" value="' . get_price($sanatorium_id, $room["id"], $outchild['min_age'] . "-" . $outchild['max_age'] . '-child-pod-FB', $range->format('Y-m-d'), $request->optional) . '" class="form-control">
                        </td>';
                        }
                        $html .= '</tr>';
                    } elseif (get_food_count($sanatorium_id) == 2) {
                        $html .= '<tr>
                    <td class="w-25"><ul class="table-informations"><li class="menu-item">Yem??k say?? - 2 d??f??</li> <li class="menu-item">M??alic??siz - <span><i class="fas fa-times text-danger"></i></span> </li>';

                        $html .= '</ul></td>';
                        foreach ($ranges as $range) {
                            $html .= '<td class="' . $outchild['min_age'] . "-" . $outchild['max_age'] . '-child-pod-HB">
                        <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '"  ' . $class . ' placeholder="' . $placeholder . '" value="' . get_price($sanatorium_id, $room["id"], $outchild['min_age'] . "-" . $outchild['max_age'] . '-child-pod-HB', $range->format('Y-m-d'), $request->optional) . '" class="form-control">
                        </td>';
                        }
                        $html .= '</tr>';
                    } elseif (get_food_count($sanatorium_id) == 3) {
                        $html .= '<tr>
                    <td class="w-25"><ul class="table-informations"><li class="menu-item">Yem??k say?? - 3 d??f??</li> <li class="menu-item">M??alic??siz - <span><i class="fas fa-times text-danger"></i></span> </li>';

                        $html .= '</ul></td>';
                        foreach ($ranges as $range) {
                            $html .= '<td "' . $outchild['min_age'] . "-" . $outchild['max_age'] . '-child-pod-FB">
                        <input type="text" readonly id="' . (in_array($range->format('Y-m-d'), $selected_room_status) ? 'price_input_red' : '') . '"  ' . $class . ' placeholder="' . $placeholder . '" value="' . get_price($sanatorium_id, $room["id"], $outchild['min_age'] . "-" . $outchild['max_age'] . '-child-pod-FB', $range->format('Y-m-d'), $request->optional) . '" class="form-control">
                        </td>';
                        }
                        $html .= '</tr>';
                    }
                }
            }
        }

        $html .= '</tbody>
        </table>
    </div>';


        return $html;
    }

    public function dateDiffInDays($date1, $date2)
    {
        $diff = strtotime($date2) - strtotime($date1);
        return round($diff / 86400) + 2;
    }

    public function room_status(Request $request, $sanatorium_id)
    {

        $date = CarbonPeriod::create($request->start_date, $request->end_date);

        foreach ($date as $da) {
            foreach ($request->days as $dayss) {
                if ($da->format("l") == $dayss) {
                    $room_status = new RoomStatus();
                    $room_status->sanatoriums_id = $sanatorium_id;
                    $room_status->room_kinds_id = $request->room_kinds_id;
                    $room_status->start_date = $request->start_date;
                    $room_status->end_date = $request->end_date;
                    $room_status->week_days = $da->format('Y-m-d');
                    $room_status->status = $request->status;
                    $room_status->save();
                }
            }
        }
        return redirect()->back()->with('success', 'Otaq statusu veril??n tarixl??r aras??nda d??yi??dirildi!');
    }

    public function save_price(Request $request)
    {
        $sanatorium = Sanatoriums::find($request->sanatorium_id);
        $wizart = Sws::where('sanatoriums_id', $sanatorium->id)->first();
        $date = CarbonPeriod::create($request->start_date, $request->end_date);
        if ($wizart['price_table_kind'] == 1) {
            foreach ($date as $da) {
                foreach ($request->date_of_price as $dayss) {
                    if ($da->format("l") == $dayss) {
                        DB::table('daily_price_group_' . $sanatorium->country_id)->insert([
                            'sanatoriums_id' => $request->sanatorium_id,
                            'room_kinds_id' => $request->room_id,
                            'input_name' => $request->value,
                            'date_of_price' => $da->format('Y-m-d'),
                            'price' => $request->price
                        ]);
                    }
                }
            }
        } elseif ($wizart['price_table_kind'] == 2) {
            foreach ($date as $da) {
                foreach ($request->date_of_price as $dayss) {
                    if ($da->format("l") == $dayss) {
                        DB::table('weekly_price_group_' . $sanatorium->country_id)->insert([
                            'sanatoriums_id' => $request->sanatorium_id,
                            'room_kinds_id' => $request->room_id,
                            'input_name' => $request->value,
                            'date_of_price' => $da->format('Y-m-d'),
                            'price' => $request->price,
                            'package' => $request->package
                        ]);
                    }
                }
            }
        } else {
            foreach ($date as $da) {
                foreach ($request->date_of_price as $dayss) {
                    if ($da->format("l") == $dayss) {
                        DB::table('optional_price_group_' . $sanatorium->country_id)->insert([
                            'sanatoriums_id' => $request->sanatorium_id,
                            'room_kinds_id' => $request->room_id,
                            'input_name' => $request->value,
                            'date_of_price' => $da->format('Y-m-d'),
                            'price' => $request->price,
                            'package' => $request->package
                        ]);
                    }
                }
            }
        }
    }
}
