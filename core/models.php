<?php
include 'core/dbConfig.php';

// CREATE function - Add a new applicant
function createApplicant($first_name, $last_name, $email, $phone, $job_title, $experience_years, $resume_submitted, $application_date) {
    global $pdo;

    try {
        $query = "INSERT INTO applicants (first_name, last_name, email, phone, job_title, experience_years, resume_submitted, application_date)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$first_name, $last_name, $email, $phone, $job_title, $experience_years, $resume_submitted, $application_date]);

        return [
            'message' => 'Applicant added successfully.',
            'statusCode' => 200
        ];
    } catch (PDOException $e) {
        return [
            'message' => 'Failed to add applicant: ' . $e->getMessage(),
            'statusCode' => 400
        ];
    }
}

// READ function - Get all applicants or search applicants based on a search query
function searchApplicants($searchQuery = '') {
    global $pdo;

    try {
        // Modified query to search by job title and other attributes
        $query = "SELECT * FROM applicants WHERE first_name LIKE ? OR last_name LIKE ? OR email LIKE ? OR phone LIKE ? OR job_title LIKE ?";

        $stmt = $pdo->prepare($query);
        $stmt->execute(['%' . $searchQuery . '%', '%' . $searchQuery . '%', '%' . $searchQuery . '%', '%' . $searchQuery . '%', '%' . $searchQuery . '%']);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return [
            'message' => 'Search successful.',
            'statusCode' => 200,
            'querySet' => $result
        ];
    } catch (PDOException $e) {
        return [
            'message' => 'Search failed: ' . $e->getMessage(),
            'statusCode' => 400
        ];
    }
}

// UPDATE function - Update an existing applicant
function updateApplicant($id, $first_name, $last_name, $email, $phone, $job_title, $experience_years, $resume_submitted, $application_date) {
    global $pdo;

    try {
        $query = "UPDATE applicants SET first_name = ?, last_name = ?, email = ?, phone = ?, job_title = ?, experience_years = ?, resume_submitted = ?, application_date = ? WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$first_name, $last_name, $email, $phone, $job_title, $experience_years, $resume_submitted, $application_date, $id]);

        return [
            'message' => 'Applicant updated successfully.',
            'statusCode' => 200
        ];
    } catch (PDOException $e) {
        return [
            'message' => 'Failed to update applicant: ' . $e->getMessage(),
            'statusCode' => 400
        ];
    }
}

// DELETE function - Delete an applicant
function deleteApplicant($id) {
    global $pdo;

    try {
        $query = "DELETE FROM applicants WHERE id = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$id]);

        return [
            'message' => 'Applicant deleted successfully.',
            'statusCode' => 200
        ];
    } catch (PDOException $e) {
        return [
            'message' => 'Failed to delete applicant: ' . $e->getMessage(),
            'statusCode' => 400
        ];
    }
}
?>
