<?php





function seo_friendly_string($string)

{

//	$title = str_replace(" " , "-",$title);

	

    $string = str_replace(array('[\', \']'), '', $string);

    $string = preg_replace('/\[.*\]/U', '', $string);

    $string = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $string);

    $string = htmlentities($string, ENT_COMPAT, 'utf-8');

    $string = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $string );

    $string = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $string);

    return strtolower(trim($string, '-'));

		

}



function readable_string($string)

{

	$string = str_replace("-", " ", $string);

	

	return ucwords($string);

}



function get_home_card_type($id)

{

	if(strstr($id, "SPT"))

		return "Srila Prabhupada Today";

	if(strstr($id, "LSO"))

		return "Memory of the Day";

	if(strstr($id, "RP"))

		return "Rare Picture of the Day";

	if(strstr($id, "LST"))

		return "Anecdote of the Day";

	if(strstr($id, "QU"))

		return "Quote of the Day";

	

	if(strstr($id,"DY"))

		return "Interesting facts";

	if(strstr($id,"BR"))

		return "First Publication dates";	

	if(strstr($id,"TK"))

		return "Places made holy";	

	if(strstr($id,"NV"))

		return "Prabhupadas travels";	

	if(strstr($id,"FV"))

		return " First Visits";

	return "";

}


function array_sort($array, $on, $order=SORT_ASC)
{
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
            break;
            case SORT_DESC:
                arsort($sortable_array);
            break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}



?>