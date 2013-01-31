<?php

/**
 * 
 * 
 * @return bool
 */
function validateContact() {
    
    $errors = checkEmail('email', 'Must be a valid email.', false);
    $errors = checkRequired('message', 'Message cannot be blank.', $errors);
    
    return $errors;
}

/**
 * 
 * 
 * @return void
 */
function sendContact() {
    
    global $db;
    
    $stmt = $db->prepare("INSERT INTO Contact
                        (Email, Body, TrafficId, Time)
                        VALUES (?, ?, ?, NOW())");
                        
    $stmt->execute(array($_POST['email'], $_POST['message'], $_SESSION['traffic']));
    
    email(SITE_EMAIL, "New message from " . $_POST['email'], $_POST['message']);
    
    message("Your message has been sent.", true);
    header("Location: " . BASE . "contact");
    exit;
}