<?php
error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $url = $_POST['url'];
    $content = fetchContent($url);

}

function fetchContent($url) {
    // Validate URL to prevent other vulnerabilities
    if (filter_var($url, FILTER_VALIDATE_URL)) {
        // Validate if the URL is pointing to a local file on the server
        $localPath = 'file://' . realpath('flag.txt');
      
            $content = file_get_contents($url);
            return $content !== false ? htmlspecialchars($content) : 'Failed to fetch content.';
         
    } else {
        return 'Invalid URL.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Source Code as Services</title>
</head>
<body>
    <h1>Source Code as Services</h1>
    <p>Enter a URL to fetch and display its HTML source code:</p>
    <form method="POST" action="">
        <label for="url">Enter URL:</label>
        <input type="text" id="url" name="url" required>
        <button type="submit">Fetch HTML Source Code</button>
    </form>
    <hr>
    <h2>Fetched HTML Source Code:</h2>
    <pre><?php echo htmlspecialchars($content ?? ''); ?></pre>
</body>
</html>
