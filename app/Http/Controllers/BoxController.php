<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BoxController extends Controller
{
    public function edit(Request $request){
    	//For edit teacher profile
    	$authBase = new AuthBase($secretAcessKey,$access_key);
		$method = "edit_teacher";
		$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
		$requestParameters["teacher_id"]=""; //Required
		$requestParameters["name"] = "";//Required
		$requestParameters["email"]=""; //Required
		$requestParameters["password"]=""; //optional
		$requestParameters["image"]=""; //optional
		$requestParameters["phone_number"]=""; //optional
		$requestParameters["mobile_number"]=""; //optional
		$requestParameters["about_the_teacher"]=""; //optional
		$requestParameters["can_schedule_class"]=""; //optional
		$requestParameters["is_active"]=true; //optional

		$httpRequest=new HttpRequest();
		try
		{
			$XMLReturn=$httpRequest->wiziq_do_post_request($webServiceUrl.'?method=edit_teacher',http_build_query($requestParameters, '', '&')); 
		}
		catch(Exception $e)
		{	
	  		echo $e->getMessage();
		}
 		if(!empty($XMLReturn))
 		{
 			try
			{
			  $objDOM = new DOMDocument();
			  $objDOM->loadXML($XMLReturn);
	  
			}
			catch(Exception $e)
			{
			  echo $e->getMessage();
			}
		$status=$objDOM->getElementsByTagName("rsp")->item(0);
    	$attribNode = $status->getAttribute("status");
		if($attribNode=="ok")
		{

		}
		else if($attribNode=="fail")
		{
			$error=$objDOM->getElementsByTagName("error")->item(0);	
   			$errormsg = $error->getAttribute("msg");	
		}
	 }//end if	

    }



    public function index(){
    	//get_teacher_details API
    	$authBase = new AuthBase($secretAcessKey,$access_key);
		$method = "get_teacher_details";
		$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
		$requestParameters["teacher_id"]=""; //Required

		$httpRequest=new HttpRequest();
		try
		{
			$XMLReturn=$httpRequest->wiziq_do_post_request($webServiceUrl.'?method=get_teacher_details',http_build_query($requestParameters, '', '&')); 
		}
		catch(Exception $e)
		{	
	  		echo $e->getMessage();
		}
 		if(!empty($XMLReturn))
 		{
 			try
			{
			  $objDOM = new DOMDocument();
			  $objDOM->loadXML($XMLReturn);
	  
			}
			catch(Exception $e)
			{
			  echo $e->getMessage();
			}
		$status=$objDOM->getElementsByTagName("rsp")->item(0);
    	$attribNode = $status->getAttribute("status");
		if($attribNode=="ok")
		{
			$teacher_idTag = $objDOM->getElementsByTagName("teacher_id")->item(0);
			$teacher_id=$teacher_idTag->item(0)->nodeValue;

			$nameTag = $objDOM->getElementsByTagName("name")->item(0);
			$name=$nameTag->item(0)->nodeValue;

			$emailTag = $objDOM->getElementsByTagName("email")->item(0);
			$email=$emailTag->item(0)->nodeValue;

			$passwordTag= $objDOM->getElementsByTagName("password")->item(0);
			$password=$passwordTag->item(0)->nodeValue;

			$phone_numberTag = $objDOM->getElementsByTagName("phone_number")->item(0);
			$phone_number=$phone_numberTag->item(0)->nodeValue;

			$mobile_numberTag = $objDOM->getElementsByTagName("mobile_number")->item(0);
			$mobile_number=$mobile_numberTag->item(0)->nodeValue;

			$about_the_teacherTag = $objDOM->getElementsByTagName("about_the_teacher")->item(0);
			$about_the_teacher=$about_the_teacherTag->item(0)->nodeValue;

			$imageTag = $objDOM->getElementsByTagName("image")->item(0);
			$image=$imageTag->item(0)->nodeValue;

			$time_zoneTag = $objDOM->getElementsByTagName("time_zone")->item(0);
			$time_zone=$time_zoneTag->item(0)->nodeValue;

			$can_schedule_classTag = $objDOM->getElementsByTagName("can_schedule_class")->item(0);
			$can_schedule_class=$can_schedule_classTag->item(0)->nodeValue;

			$is_activeTag = $objDOM->getElementsByTagName("is_active")->item(0);
			$is_active=$is_activeTag->item(0)->nodeValue;


		}
		else if($attribNode=="fail")
		{
			$error=$objDOM->getElementsByTagName("error")->item(0);	
   			$errormsg = $error->getAttribute("msg");	
		}
	 }//end if	

    }


    public function edit(){
    	//modify class
    	$authBase = new AuthBase($secretAcessKey,$access_key);
		$method = "get_teacher_details";
		$requestParameters["signature"]=$authBase->GenerateSignature($method,$requestParameters);
		$requestParameters["class_id"]=""; //Required
		$requestParameters["title"]="";
		$requestParameters["start_time"]="";
		$requestParameters["duration"]="";
		$requestParameters["time_zone"]="";
		$requestParameters["attendee_limit"]="";
		$requestParameters["presenter_default_controls"]="";
		$requestParameters["attendee_default_controls"]="";
		$requestParameters["create_recording"]="";
		$requestParameters["return_url"]="";
		$requestParameters["status_ping_url"]="";
		$requestParameters["presenter_email"]="";


		$httpRequest=new HttpRequest();
		try
		{
			$XMLReturn=$httpRequest->wiziq_do_post_request($webServiceUrl.'?method=get_teacher_details',http_build_query($requestParameters, '', '&')); 
		}
		catch(Exception $e)
		{	
	  		echo $e->getMessage();
		}
 		if(!empty($XMLReturn))
 		{
 			try
			{
			  $objDOM = new DOMDocument();
			  $objDOM->loadXML($XMLReturn);
	  
			}
			catch(Exception $e)
			{
			  echo $e->getMessage();
			}
		$status=$objDOM->getElementsByTagName("rsp")->item(0);
    	$attribNode = $status->getAttribute("status");
		if($attribNode=="ok")
		{
			$teacher_idTag = $objDOM->getElementsByTagName("teacher_id")->item(0);
			$teacher_id=$teacher_idTag->item(0)->nodeValue;

			


		}
		else if($attribNode=="fail")
		{
			$error=$objDOM->getElementsByTagName("error")->item(0);	
   			$errormsg = $error->getAttribute("msg");	
		}
	 }//end if	
    }


}
