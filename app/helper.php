<?php
function getToken ($length = 50)
{
    $token = "";
    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
    $codeAlphabet .= "0123456789";
    $max = strlen ($codeAlphabet) - 1;
    for ($i = 0; $i < $length; $i++) {
        $token .= $codeAlphabet[crypto_rand_secure (0, $max)];
    }
    return $token;
}


function crypto_rand_secure ($min, $max)
{
    $range = $max - $min;
    if ($range < 1) return $min;
    $log = ceil (log ($range, 2));
    $bytes = (int)($log / 8) + 1;
    $bits = (int)$log + 1;
    $filter = (int)(1 << $bits) - 1;
    do {
        $rnd = hexdec (bin2hex (openssl_random_pseudo_bytes ($bytes)));
        $rnd = $rnd & $filter;
    } while ($rnd >= $range);
    return $min + $rnd;
}

function generatePassword ($length)
{
    $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
    return substr (str_shuffle ($chars), 0, $length);
}

function saveBase64Image ($object, $file_input, $folder)
{

    $data = $file_input;
    list($type, $data) = explode (';', $data);
    list(, $data) = explode (',', $data);
    $split = explode ('/', $type);
    $type = $split[1];
    $data = base64_decode ($data);
    if (!is_dir (base_path () . "/public/img/$folder")) {
        mkdir (base_path () . "/public/img/$folder", 0755, true);
    }
    $imageName = 'img' . $object->id . '_' . getToken (10) . '.' . $type;

    file_put_contents (base_path () . "/public/img/" . $folder . "/" . $imageName, $data);//create or open a existing file

    return $imageName;
}

function saveImage ($files, $folder)
{
    $names = [];
    if (is_array ($files)) {
        foreach ($files as $file) {
            if (!file_exists ($folder)) {
                mkdir ($folder);
            }
            $name = 'img' . getToken () . '.' . $file->getClientOriginalExtension ();

            $path = public_path () . "/img/" . $folder;
            $file->move ($path, $name);
            array_push ($names, $name);
        }
    } else {
        if (!file_exists ($folder)) {
            mkdir ($folder);
        }
        $path = public_path () . "/img/" . $folder;
        $name = 'img'.getToken().'.'. $files->getClientOriginalExtension ();
        $files->move ($path, $name);
        array_push ($names, $name);
    }
    return $names;
}
function saveImage2($file, $folder)
{
    $upload_image = $_FILES['image']['name'][0];
    $ext = pathinfo($upload_image,PATHINFO_EXTENSION);

    $name = 'img'.getToken().'.'.$ext;
    $final_path = public_path()."/img/".$folder;
    $tmp_name = $_FILES["image"]["tmp_name"][0];

    move_uploaded_file($tmp_name, "$final_path/$name");

    return $name;
}
function deleteImage ($name, $folder)
{
    if (strlen ($name) > 0)
        if (file_exists (public_path () . "/img/" . $folder . '/' . $name))
            unlink (public_path () . "/img/" . $folder . '/' . $name);
}

function saveVideo ($file, $folder)
{
    if (!file_exists ($folder)) {
        mkdir ($folder);
    }
    $name = 'video' . getToken () . '.' . $file->getClientOriginalExtension ();
    $path = public_path () . "/videos/" . $folder;
    $file->move ($path, $name);

    return $name;
}

function deleteVideo ($name, $folder)
{
    if (strlen ($name) > 0) if (file_exists (public_path () . "/videos/" . $folder . '/' . $name)) unlink (public_path () . "/videos/" . $folder . '/' . $name);
}

function savePdf ($file, $folder)
{
    if (!file_exists ($folder)) {
        mkdir ($folder);
    }
    $name = 'doc' . getToken () . '.' . $file->getClientOriginalExtension ();
    $path = public_path () . "/documents/" . $folder;
    $file->move ($path, $name);

    return $name;
}

function deletePdf ($name, $folder)
{
    if (strlen ($name) > 0) if (file_exists (public_path () . "/documents/" . $folder . '/' . $name)) unlink (public_path () . "/documents/" . $folder . '/' . $name);
}

function check_route ($route)
{
    if (is_array ($route)) {
        $current_url = strtolower (Route::getCurrentRoute ()->uri ());
        foreach ($route as $item) {
            if (strpos ($current_url, $item)) return 'active';
        }
        return '';
    } else
        return strpos (strtolower (Route::getCurrentRoute ()->uri ()), $route) !== false ? 'active' : '';
}

function show_date_confirmation ($date)
{
    $mes = ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'];
    $mes_string = $mes[((int)$date->format ('n')) - 1];
    $string = $date->format ('d') . ' de ' . ucfirst ($mes_string);
    return $string;
}

function show_date_spanish($date)
{
    $dia = ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'];
    $mes = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

    $dia_string = $dia[(int)date('w',strtotime($date))];
    $dia_number = date('j',strtotime($date));
    $mes_string = $mes[(int)date('n',strtotime($date))-1];
    $time = date('G:i',strtotime($date));

    $string_date = $dia_string .' '.$dia_number .' de '. ucfirst($mes_string).' '.$time;

    return  $string_date;
}

function messageCounterPagination($total, $page, $pagination){
    $initial = ($page == 0)? 1 : $page;
    $start = ($initial * $pagination) - ($pagination -1);
    $end = $initial * $pagination;
    if ($end > $total)
        $end = $total;
    $text = "Mostrando registros del ".$start." al ".$end." de un total de ".$total." registros";
    return $text;
}

function messageCountResults($total,$keyword)
{
    if ($total == 1 && !$keyword)
        return $total." resultado encontrado";
    if ($total > 1 && !$keyword)
        return $total." resultados encontrados";
    if (!$keyword)
        return null;
    if ($total > 0) {
        if ($total == 1)
            $temp = " resultado encontrado ";
        else
            $temp = " resultados encontrados ";
        return $total .$temp."para <span>\"" . $keyword . "\"</span>";
    }else
        return "No hay contenido disponible aplicando los filtros seleccionados";
//        return "No se encontraron resultados para <span>".$keyword."</span>";
}
