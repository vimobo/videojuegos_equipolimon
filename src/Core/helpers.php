<?php

namespace Core;
function e ($var) {
    return htmlspecialchars(trim($var), ENT_QUOTES, 'UTF-8');
}