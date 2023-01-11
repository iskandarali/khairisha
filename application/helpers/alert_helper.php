<?php

function alert($msg, $type = null)
{
    return '<div class="alert alert-' . $type . '" role="alert">
                <strong>' . $msg . '</strong>
            </div>';
}
