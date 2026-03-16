<?php
function fmt(float $amt, string $c = "$"): string {
    return $c . $amt;
}
