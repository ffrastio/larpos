<?php

/**
 * formatPrice
 *
 * @param  mixed $str
 * @return void
 */
function formatPrice($str)
{
    return 'Rp. ' . number_format($str, 0, ',', '.');
}


