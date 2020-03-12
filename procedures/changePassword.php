<?php
require_once __DIR__ .'/../inc/bootstrap.php';
requireAuth();

$currentPassword = request()->get('current_password');
$newPassword = request()->get('password');
$confirmPassword = request()->get('confirm_password');

//Matches confirmed and new password - works
if ($newPassword != $confirmPassword) {
    $session->getFlashBag()->add('error', 'New Passwords do not match. Please try again.');
      redirect('/account.php');
}

$user = getAuthenticatedUser();

if (empty($user)) {
  $session->getFlashBag()->add('error','Something Went Wrong. Try Again. If it continues, please log out and back in.');
  redirect('/account.php');
}
