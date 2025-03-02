<?php
function set_active($uri_segment)
{
    $CI =& get_instance();
    return ($CI->uri->segment(1) == $uri_segment) ? 'active' : '';
}
