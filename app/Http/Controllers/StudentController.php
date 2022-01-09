<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classs;
use App\Models\Section;
use App\Models\Student;
use DB;
use Session;

class StudentController extends Controller
{
    //home page
    public function index(){
        $clases=Classs::latest()->orderBy('id','desc')->get();
        return view('student.index',compact('clases'));
    }//end method


    //store class info
    public function StoreClass(Request $request){
       // return $request->all();

       //insert class info process one
    //    Classs::insert([
    //        'class_name'=>$request->class_name,
    //    ]);

     //insert class info process two
        // Classs::create($request->all());

     //insert class info process three
     $clas=new Classs();
     $clas->class_name=$request->class_name;
     $clas->save();




       return redirect()->back()->with('sms','class info saved successfully');
    }//end method


    //class info edit form
    public function EditClass($id){
        $clas=Classs::find($id);
        return view('student.class_edit',compact('clas'));
    }//end method


    //update class info
    public function UpdateClass(Request $request){
        $clas=Classs::find($request->id);

        //update process one
        // $clas->update([
        //     'class_name'=>$request->class_name,
        // ]);


        //update process two
        // $clas->update($request->all());

        //update process three
        $clas->class_name=$request->class_name;
        $clas->save();


        return redirect('/')->with('message','student info updated successfully');
    }//end method


    //delete class info
    public function DeleteClass($id){
        $clas=Classs::find($id)->delete();
        return redirect()->back()->with('signal','class info deleted successfully');
    }//end method


    //section view
    public function SectionView(){
        $classes=Classs::all();
        $sections=Section::all();
        return view('student.section_view',[
            'classes'=>$classes,
            'sections'=>$sections,
        ]);
    }//end method


    //store section info
    public function StoreSection(Request $request){
        //form validation
        $request->validate([
            'class_id'=>'required',
        ],[
            'class_id.required'=>'please select a class',
        ]);
                $section=new Section();
                $section->class_id=$request->class_id;
                $section->section_name=$request->section_name;
                $section->save();
                return redirect()->back()->with('sms','section saved successfully');
    }//end method


    //section info edit form
    public function EditSection($id){
        $section=Section::find($id);
        $classes=Classs::all();

        return view('student.section_edit',compact('section','classes'));
    }//end method



    //update section
    public function UpdateSection(Request $request){
        $section=Section::find($request->id);
                $section->class_id=$request->class_id;
                $section->section_name=$request->section_name;
                $section->save();
                return redirect('/section/view')->with('sms','section updated successfully');
    }//end method




    //delete section
    public function DeleteSection($id){
        $section=Section::find($id)->delete();
        return redirect()->back()->with('signal','section deleted successfully');
    }//end section



    //student view
    public function StudentView(){
        $sections=Section::all();
        $classes=Classs::all();
        return view('student.student_view',compact('sections','classes'));
    }//end method



    //student info store
    public function StoreStudent(Request $request){
        $request->validate([
            'registration'=>'required|unique:students',
            'class_id'=>'required',
            'section_id'=>'required',
        ],[
            'class_id.required'=>'please select a class',
            'section_id.required'=>'please select a section',

        ]);







    $check=Student::where('class_id',$request->class_id)->where('roll',$request->roll)->exists();
    // return $check; exit();

    If(!$check){
        $student_info=new Student();
    $student_info->stu_name=$request->stu_name;
    $student_info->roll =$request->roll;
    $student_info->class_id =$request->class_id ;
    $student_info->section_id=$request->section_id;
    $student_info->registration=$request->registration;
    $student_info->save();
    return redirect()->back()->with('sms','Student info added successfully');
    } else{
        return redirect()->back()->with('warning','the roll number is already exists for this class');
    }



























        // Student::insert([
        //     'stu_name'=>$request->stu_name,
        //     'roll'=>$request->roll,
        //     'registration'=>$request->registration,
        //     'class_id'=>$request->class_id,
        //     'section_id'=>$request->section_id,
        // ]);


        // return redirect()->back()->with('sms','student info saved successfully');


    }//end method



    // ajax for section auto select
    public function GetSection($class_id){
        $sections=Section::where('class_id',$class_id)->get();
        return json_encode($sections);
    }//end method


















}// class end
