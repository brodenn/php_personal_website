<?php

/**
 * Various functions for improved code structure.
 */

/**
 * Destroy the session
 */
function destroySession(): void
{
    // Unset all of the session variables.
    $_SESSION = array();

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Finally, destroy the session.
    session_destroy();
}

/**
 * Various functions for improved code structure.
 */

// ... your previous functions are here

/**
 * Set the flash message.
 *
 * @param string $type Type of the flash message.
 * @param string $message Content of the flash message.
 * @return void
 */
function setFlashMessage(string $type, string $message): void
{
    $_SESSION["flash-message"] = ["type" => $type, "message" => $message];
}

/**
 * Get the flash message, if any.
 *
 * @return string The flash message or an empty string.
 */
function getFlashMessage(): string
{
    if (isset($_SESSION["flash-message"])) {
        $flash = $_SESSION["flash-message"];
        unset($_SESSION["flash-message"]);
        return "<div class=\"{$flash['type']}\"><p>{$flash['message']}</p></div>";
    }
    return "";
}

/**
 * Check if the user is logged in and return the user acronym or redirect to the login page.
 *
 * @return string The user acronym or empty string.
 */
function checkIfUserLoggedInOrRedirectToLogin(): string
{
    $user = $_SESSION["user"] ?? null;
    if (!$user) {
        setFlashMessage("warning", "Only a logged-in user can access this page.");
        header("Location: login.php");
        exit();
    }
    return $user['acronym'] ?? '';
}

/**
 * Check if the user is logged in and return the user acronym or an empty string.
 *
 * @return string The user acronym or an empty string.
 */
function checkIfUserLoggedIn(): string
{
    return $_SESSION["user"]['acronym'] ?? '';
}

/**
 * Redirect to a page.
 *
 * @param string $url The URL to redirect to.
 * @return void
 */
function redirectTo(string $url): void
{
    header("Location: $url");
    exit();
}

/**
 * Check if a user is an admin.
 *
 * @param array $user User information.
 * @return bool True if admin, False otherwise.
 */
function isAdmin(array $user): bool
{
    return $user['role'] === 'admin';
}
