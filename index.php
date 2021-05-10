<?php
/*
Made by [egy.js](https://www.instagram.com/egy.js/);
Updated by [Kibirige Junior Lawrence](aanga26@gmil.com, +256705568794)
*/
header('Access-Control-Allow-Origin: *');  
header('Content-Type: application/json');
if(isset($_GET['url']) && $_GET['url'] != ""){
    parse_str( parse_url( $_GET['url'], PHP_URL_QUERY ), $vars );
    
    $id=$vars['v'];
    $dt=file_get_contents("https://www.youtube.com/get_video_info?video_id=$id&el=embedded&ps=default&eurl=&gl=US&hl=en");
    // var_dump(explode("&",$dt));
    if (strpos($dt, 'status=fail') !== false) {
        
        $x=explode("&",$dt);
        $t=array(); $g=array(); $h=array();
        foreach($x as $r){
            $c=explode("=",$r);
            $n=$c[0]; $v=$c[1];
            $y=urldecode($v);
            $t[$n]=$v;
        }
            $x=explode("&",$dt);
        $h=[];
            foreach($x as $r){
                $c=explode("=",$r);
                $n=$c[0]; $v=$c[1];
                $h[$n]=urldecode($v);
            }
//         echo json_encode($h, JSON_PRETTY_PRINT);
//         array_push();
//         $g[]=$h;
        $g[0]['error'] = true;
        $g[0]['madeBy'] = "El-zahaby";
        $g[0]['instagram'] = "egy.js";
        $g[0]['updatedBy'] = "Kibirige Junior Lawrence";
        $g[0]['email'] = "aanga26@gmail.com";
        $g[0]['github'] = "https://github.com/juniorkibirige";
        echo json_encode($g,JSON_PRETTY_PRINT);  
    } else{
        // $a = json_decode(urldecode(explode("=",explode("&",$dt)[13])[1]))->streamingData->formats;
        // echo json_encode($a);
        $x=explode("&",$dt);
        $t=array(); $g=array(); $h=array();
        foreach($x as $r){
            $c=explode("=",$r);
            $n=$c[0]; $v=$c[1];
            $y=urldecode($v);
            $t[$n]=$v;
        }
        // echo json_encode(json_decode(urldecode($t['player_response']))->streamingData->formats[0]);
        $streams = json_decode(urldecode($t['player_response']))->streamingData->formats;
        // echo json_encode($streams);
        // foreach($streams as $d){ 
        //     $x=explode("&",$d);
        //     foreach($x as $r){
        //         $c=explode("=",$r);
        //         $n=$c[0]; $v=$c[1];
        //         $h[$n]=urldecode($v);
        //     }
        //     $g[]=$h;
        // }
        echo json_encode($streams);
       // var_dump( $g[1]["quality"],true);
    }
}else{
    $myObj = array();
    $myObj['error'] = true;
    $myObj['msg'] = "There is no youtube link";
    $myObj['madeBy'] = "El-zahaby";
    $myObj['instagram'] = "egy.js";
    $myObj['updatedBy'] = "Kibirige Junior Lawrence";
    $myObj['email'] = "aanga26@gmail.com";
    $myObj['github'] = "https://github.com/juniorkibirige";
    $myJSON = json_encode($myObj);
    echo $myJSON;
}
