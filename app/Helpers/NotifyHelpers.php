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

if (!function_exists('sweetAlert')) {
    function sweetAlert()
    {
        if (Session::get('notify')) {
            return '
				<script type="text/javascript">
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    type: "' . Session::get('type') . '",
                    title: "' . Session::get('msg') . '",
                    showConfirmButton: false,
                    timer: 1500
                });
                </script>';
        }
    }
}

if (!function_exists('sweetAlert29')) {
    function sweetAlert29()
    {
        if (Session::get('notify')) {
            return '
				<script type="text/javascript">
                Swal.fire({
                    // toast: true,
                    position: "center",
                    icon: "' . Session::get('type') . '",
                    title: "' . Session::get('msg') . '",
                    showConfirmButton: false,
                    timer: 3000
                });
                </script>';
        }
    }
}
