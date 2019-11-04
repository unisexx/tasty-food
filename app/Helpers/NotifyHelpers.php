<?php
if (!function_exists('notify')) {
    function set_notify($type = 'success', $msg = null, $delay = 2)
    {
        Session::flash('notify', true);
        Session::flash('type', $type);
        Session::flash('msg', $msg);
        Session::flash('delay', $delay);
    }
}

// if (!function_exists('jsNotify')) {
//     function js_notify()
//     {
//         if (Session::get('notify')) {
//             return '
// 				<script type="text/javascript">
//                 alertify.set(\'notifier\',\'position\', \'top-right\');
//                 alertify.notify("' . Session::get('msg') . '", "' . Session::get('type') . '", ' . Session::get('delay') . ');
//                 </script>';
//         }
//     }
// }

if (!function_exists('sweetAlert')) {
    function sweetAlert()
    {
        if (Session::get('notify')) {
            return '
				<script type="text/javascript">
                Swal.fire({
                    position: "center",
                    type: "' . Session::get('type') . '",
                    title: "' . Session::get('msg') . '",
                    showConfirmButton: false,
                    timer: 1500
                });
                </script>';
        }
    }
}
