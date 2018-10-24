<?php
/* Petits messages d'alerte */
    function alert($string) {
        return $string = "<center><div class='alert alert-danger alert-dismissible fade show'
        style='background:#f83600;z_index:3;text-align:center;position:absolute;
        left:600px;top:100px;display:inline-block;white-space:no-wrap;
        height:auto;font-size:13px;width:auto;color:#FFFFFF;border:0.5px solid #decba4;
        max-width:300px'>
        ".$string."<button type='button' class='close' style='margin-top:-10px'data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button></div></center>";
    }
    function success($string) {
        return $string = "<center><div class='alert alert-success alert-dismissible fade show' 
        style='position:absolute;z-index:3;left:600px;top:100px;display:inline-block;width:auto;
        white-space:no-wrap;max-width:300px;
        height:auto;color:#333333'>".$string."
        <button type='button' class='close' style='margin-top:-10px' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button></div></center>";
    }
?>