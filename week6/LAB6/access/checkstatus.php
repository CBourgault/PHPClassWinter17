<?php

function isLoggedIn() {
    
    if ( !isset($_SESSION['userid']) || $_SESSION['userid'] === 0
            // IF not set or returned false, no login
            ) {
            return false;
        }
        return true;
}