<?php
    function get_company_details($company){
        $string = file_get_contents($company);
        $company_details = json_decode($string, true);
        if($company_details["template"]!=null)
            $company_details["template"] = file_get_contents("companies/templates/".$company_details["template"]);
        $company_details["logo"] = "/companies/media/".$company_details["logo"];
        if(isset($company_details["video"]))
            $company_details["video"] = "/companies/media/".$company_details["video"];
        if(isset($company_details["logo-header"]))
            $company_details["logo-header"] = "/companies/media/".$company_details["logo-header"];
        else
            $company_details["logo-header"] = $company_details["logo"];
        return $company_details;
    }
?>