<?php
include 'core/models.php';

// Process form submissions for CRUD operations

// Handle Create
if (isset($_POST['createApplicant'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $job_title = $_POST['job_title']; // Change from 'subject' to 'job_title'
    $experience_years = $_POST['experience_years'];
    $resume_submitted = $_POST['resume_submitted'];
    $application_date = $_POST['application_date'];

    // Ensure the data is sanitized and valid before inserting
    $response = createApplicant($first_name, $last_name, $email, $phone, $job_title, $experience_years, $resume_submitted, $application_date);
    echo json_encode($response);
}

// Handle Update
if (isset($_POST['updateApplicant'])) {
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $job_title = $_POST['job_title']; // Change from 'subject' to 'job_title'
    $experience_years = $_POST['experience_years'];
    $resume_submitted = $_POST['resume_submitted'];
    $application_date = $_POST['application_date'];

    // Ensure the data is sanitized and valid before updating
    $response = updateApplicant($id, $first_name, $last_name, $email, $phone, $job_title, $experience_years, $resume_submitted, $application_date);
    echo json_encode($response);
}

// Handle Delete
if (isset($_POST['deleteApplicant'])) {
    $id = $_POST['id'];
    $response = deleteApplicant($id);
    echo json_encode($response);
}
?>
