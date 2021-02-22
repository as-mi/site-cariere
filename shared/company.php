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

    function package_color($package){
        if($package=="platinum")
            return "rgb(155, 228, 241)";
        elseif ($package=="gold")
            return "gold";
        elseif ($package=="silver")
            return "rgb(141, 139, 139)";
        elseif ($package=="bronze")
            return "#f4a460";
        return "white";
    }

    function package_number($package){
        if($package=="platinum")
            return 1;
        elseif ($package=="gold")
            return 2;
        elseif ($package=="silver")
            return 3;
        elseif ($package=="bronze")
            return 4;
        return 5;
    }
?>