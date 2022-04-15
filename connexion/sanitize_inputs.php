<?php

function __sanitizeInputs(Array &$tab) {
    foreach ($tab as $key => $val) {
        if (is_array($val)) {
            __sanitizeInputs($val);
        } else {
            $val = htmlspecialchars(mysql_escape_string(trim($val)));
            $tab[$key] = $val;
        }
    }
}
__sanitizeInputs($_POST);
__sanitizeInputs($_GET);
__sanitizeInputs($_REQUEST);
