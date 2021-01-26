<?php
    function get_company_details($company){
        $string = file_get_contents($company);
        $company_details = json_decode($string, true);
        if($company_details["template"]!=null)
            $company_details["template"] = file_get_contents("companies/templates/".$company_details["template"]);
        $company_details["logo"] = "/companies/logos/".$company_details["logo"];
        return $company_details;
    }
?>