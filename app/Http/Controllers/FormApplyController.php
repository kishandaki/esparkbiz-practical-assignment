<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ApplicationForm;
use App\Models\EducationDetail;

class FormApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('form-apply');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function saveForm(Request $request)
    {

        $applicationForm = new ApplicationForm();
        $applicationForm->fill($request->all());

        $date = date_create($request->date_of_birth);
        $date_of_birth =  date_format($date, "Y/m/d H:i:s");
        $applicationForm->date_of_birth = $date_of_birth;
        if($applicationForm->save()){
            $this->saveSSCDetail($request, $applicationForm->id);
            $this->saveHSCDetail($request, $applicationForm->id);
            $this->saveBachelorDetail($request, $applicationForm->id);
            $this->saveMasterDetail($request, $applicationForm->id);

            return redirect(route('form'))->with('success', trans('messages.users.submit_data'));

        }
    }
    /**
     * Save SSC Detail
     *
     */
    public function saveSSCDetail(Request $request, $applicationFormId)
    {
        $educationDetail = new EducationDetail();

        $educationDetail->form_id = $applicationFormId;
        $educationDetail->type = $request->ssc_board;
        $educationDetail->name_of_board = $request->ssc_board_name;
        $educationDetail->pass_out_year = $request->ssc_board_pass_year;
        $educationDetail->percentage = $request->ssc_board_percentage;
        $educationDetail->save();
    }

    /**
     * Save HSC Detail
     *
     */
    public function saveHSCDetail(Request $request, $applicationFormId)
    {
        $educationDetail = new EducationDetail();

        $educationDetail->form_id = $applicationFormId;
        $educationDetail->type = $request->hsc_board_name;
        $educationDetail->name_of_board = $request->hsc_board_name;
        $educationDetail->pass_out_year = $request->hsc_board_pass_year;
        $educationDetail->percentage = $request->hsc_board_percentage;
        $educationDetail->save();
    }


    /**
     * Save Bachelor Detail
     *
     */
    public function saveBachelorDetail(Request $request, $applicationFormId)
    {
        $educationDetail = new EducationDetail();

        $educationDetail->form_id = $applicationFormId;
        $educationDetail->type = $request->bachelor_degree_name;
        $educationDetail->course_name = $request->bachelor_degree_course_name;
        $educationDetail->name_of_board = $request->bachelor_degree_university_name;
        $educationDetail->pass_out_year = $request->bachelor_degree_pass_year;
        $educationDetail->percentage = $request->bachelor_degree_pass_year;
        $educationDetail->save();
    }


    /**
     * Save Master Detail
     *
     */
    public function saveMasterDetail(Request $request, $applicationFormId)
    {
        $educationDetail = new EducationDetail();

        $educationDetail->form_id = $applicationFormId;
        $educationDetail->type = $request->master_degree_name;
        $educationDetail->name_of_board = $request->master_degree_course_name;
        $educationDetail->course_name = $request->master_degree_course_name;
        $educationDetail->pass_out_year = $request->master_degree_pass_year;
        $educationDetail->percentage = $request->master_degree_percentage;
        $educationDetail->save();
    }

}
