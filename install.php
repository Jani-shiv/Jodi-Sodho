<?php
session_start();

$requirements = [
    'php_version' => version_compare(PHP_VERSION, '7.4.0', '>='),
    'pdo_mysql' => extension_loaded('pdo_mysql'),
    'write_website' => is_writable(__DIR__ . '/website/includes'),
    'write_admin' => is_writable(__DIR__ . '/admin/includes'),
];

$step = isset($_GET['step']) ? (int)$_GET['step'] : 1;
$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $step === 2) {
    $db_host = trim($_POST['db_host']);
    $db_user = trim($_POST['db_user']);
    $db_pass = $_POST['db_pass'];
    $db_name = trim($_POST['db_name']);

    try {
        // Test connection without database name first (to create it if missing)
        $pdo = new PDO("mysql:host=$db_host;charset=utf8mb4", $db_user, $db_pass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);

        // Create Database
        $pdo->exec("CREATE DATABASE IF NOT EXISTS `$db_name` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
        $pdo->exec("USE `$db_name`;");

        // Load SQL Schema DDL
        $sqlPath = __DIR__ . '/admin/assets/js/../../jodi_sodho_schema.sql'; // default root path if it exists
        if (!file_exists($sqlPath)) {
            $sqlPath = __DIR__ . '/jodi_sodho_schema.sql';
        }

        if (file_exists($sqlPath)) {
            $sql = file_get_contents($sqlPath);
            // Execute SQL script
            $pdo->exec($sql);
        } else {
            throw new Exception("Schema file jodi_sodho_schema.sql not found in root.");
        }

        // Generate Connection Config Contents
        $configContent = "<?php\n"
            . "// Jodi Sodho Database Connection Config\n"
            . "define('DB_HOST', " . var_export($db_host, true) . ");\n"
            . "define('DB_USER', " . var_export($db_user, true) . ");\n"
            . "define('DB_PASS', " . var_export($db_pass, true) . ");\n"
            . "define('DB_NAME', " . var_export($db_name, true) . ");\n\n"
            . "try {\n"
            . "    \$pdo = new PDO(\n"
            . "        \"mysql:host=\" . DB_HOST . \";dbname=\" . DB_NAME . \";charset=utf8mb4\",\n"
            . "        DB_USER,\n"
            . "        DB_PASS,\n"
            . "        [\n"
            . "            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,\n"
            . "            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,\n"
            . "            PDO::ATTR_EMULATE_PREPARES => false,\n"
            . "        ]\n"
            . "    );\n"
            . "    \$db_connected = true;\n"
            . "} catch (PDOException \$e) {\n"
            . "    \$db_connected = false;\n"
            . "    \$db_error = \$e->getMessage();\n"
            . "}\n";

        // Write Config to Website Includes
        $webConfigPath = __DIR__ . '/website/includes/db.php';
        file_put_contents($webConfigPath, $configContent);

        // Write Config to Admin Includes
        $adminConfigPath = __DIR__ . '/admin/includes/db.php';
        file_put_contents($adminConfigPath, $configContent);

        // Set session success and redirect to step 3
        $_SESSION['installed'] = true;
        header("Location: install.php?step=3");
        exit();

    } catch (Exception $e) {
        $error = "Installation Failed: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jodi Sodho – Database Setup Installer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary: #ff3b68;
            --secondary: #7b3feb;
            --dark: #1f1a24;
            --body-bg: #fff6f8;
            --card-bg: rgba(255, 255, 255, 0.75);
            --border-color: #1f1a24;
            --neo-border: 3px solid var(--border-color);
            --neo-shadow-md: 7px 7px 0px var(--border-color);
            --neo-shadow-lg: 12px 12px 0px var(--border-color);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--body-bg);
            color: var(--dark);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem 0;
        }

        .install-card {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            border: var(--neo-border);
            border-radius: 16px;
            box-shadow: var(--neo-shadow-lg);
            width: 100%;
            max-width: 580px;
            padding: 3rem 2.5rem;
        }

        h2 {
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: -0.5px;
            text-shadow: 2px 2px 0px #fff;
        }

        .btn-primary {
            background-color: var(--primary);
            color: #fff;
            border: var(--neo-border);
            box-shadow: 4px 4px 0px var(--border-color);
            font-weight: 700;
            text-transform: uppercase;
            padding: 0.8rem 2rem;
            transition: 0.1s ease;
        }
        .btn-primary:hover, .btn-primary:active {
            background-color: #ff547b !important;
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0px var(--border-color);
            color: #fff !important;
        }

        .form-control {
            border: var(--neo-border);
            border-radius: 10px;
            padding: 0.8rem 1.2rem;
            font-weight: 600;
            background-color: #fff;
            box-shadow: 4px 4px 0px var(--border-color);
        }
        .form-control:focus {
            transform: translate(2px, 2px);
            box-shadow: 2px 2px 0px var(--border-color);
            background-color: #fff0f3;
            color: var(--dark);
        }

        .req-item {
            border: var(--neo-border);
            border-radius: 10px;
            padding: 1rem;
            background-color: #fff;
            box-shadow: 4px 4px 0px var(--border-color);
            margin-bottom: 1.2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center">
    <div class="install-card">
        <div class="text-center mb-4">
            <h2 class="text-primary"><i class="bi bi-heart-fill"></i> Jodi Sodho</h2>
            <p class="text-muted fw-bold uppercase">Enterprise Database Setup Installer</p>
        </div>

        <?php if ($step === 1): ?>
            <!-- STEP 1: REQUIREMENTS -->
            <h5 class="fw-bold mb-4 text-secondary">Step 1: Check System Requirements</h5>
            
            <div class="req-item">
                <div>
                    <strong class="d-block">PHP Version 7.4+</strong>
                    <span class="small text-muted">Current: <?php echo PHP_VERSION; ?></span>
                </div>
                <?php if ($requirements['php_version']): ?>
                    <span class="badge bg-success border border-dark text-dark px-3 py-2"><i class="bi bi-check2"></i> Pass</span>
                <?php else: ?>
                    <span class="badge bg-danger border border-dark text-dark px-3 py-2"><i class="bi bi-x"></i> Fail</span>
                <?php endif; ?>
            </div>

            <div class="req-item">
                <div>
                    <strong class="d-block">MySQL PDO Driver</strong>
                    <span class="small text-muted">Required for database communication</span>
                </div>
                <?php if ($requirements['pdo_mysql']): ?>
                    <span class="badge bg-success border border-dark text-dark px-3 py-2"><i class="bi bi-check2"></i> Pass</span>
                <?php else: ?>
                    <span class="badge bg-danger border border-dark text-dark px-3 py-2"><i class="bi bi-x"></i> Fail</span>
                <?php endif; ?>
            </div>

            <div class="req-item">
                <div>
                    <strong class="d-block">Website Includes Write Permission</strong>
                    <span class="small text-muted">Required to write website connection credentials</span>
                </div>
                <?php if ($requirements['write_website']): ?>
                    <span class="badge bg-success border border-dark text-dark px-3 py-2"><i class="bi bi-check2"></i> Pass</span>
                <?php else: ?>
                    <span class="badge bg-danger border border-dark text-dark px-3 py-2"><i class="bi bi-x"></i> Fail</span>
                <?php endif; ?>
            </div>

            <div class="req-item">
                <div>
                    <strong class="d-block">Admin Includes Write Permission</strong>
                    <span class="small text-muted">Required to write admin connection credentials</span>
                </div>
                <?php if ($requirements['write_admin']): ?>
                    <span class="badge bg-success border border-dark text-dark px-3 py-2"><i class="bi bi-check2"></i> Pass</span>
                <?php else: ?>
                    <span class="badge bg-danger border border-dark text-dark px-3 py-2"><i class="bi bi-x"></i> Fail</span>
                <?php endif; ?>
            </div>

            <div class="text-end mt-4">
                <?php if (!in_array(false, $requirements, true)): ?>
                    <a href="install.php?step=2" class="btn btn-primary">Proceed to Configuration <i class="bi bi-arrow-right-short"></i></a>
                <?php else: ?>
                    <button class="btn btn-secondary border border-dark" disabled>Fix requirements to continue</button>
                <?php endif; ?>
            </div>

        <?php elseif ($step === 2): ?>
            <!-- STEP 2: FORM -->
            <h5 class="fw-bold mb-4 text-secondary">Step 2: Database Configuration</h5>
            
            <?php if ($error): ?>
                <div class="alert alert-danger border-3 shadow-sm mb-4">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <form action="install.php?step=2" method="POST">
                <div class="mb-4">
                    <label class="form-label fw-bold">MySQL Database Host</label>
                    <input type="text" name="db_host" class="form-control" value="localhost" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold">Database Username</label>
                    <input type="text" name="db_user" class="form-control" value="root" required>
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold">Database Password</label>
                    <input type="password" name="db_pass" class="form-control" placeholder="Leave empty for XAMPP/WAMP default">
                </div>
                <div class="mb-4">
                    <label class="form-label fw-bold">Database Name</label>
                    <input type="text" name="db_name" class="form-control" value="jodi_sodho" required>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="btn btn-primary"><i class="bi bi-gear-fill me-1"></i> Run Installation</button>
                </div>
            </form>

        <?php elseif ($step === 3): ?>
            <!-- STEP 3: SUCCESS -->
            <div class="text-center py-4">
                <div class="text-success display-1 mb-3"><i class="bi bi-check-circle-fill"></i></div>
                <h4 class="fw-bold text-dark mb-3">Setup Completed Successfully!</h4>
                <p class="text-muted">The MySQL database has been created, schema tables constructed, composite indexes established, and configuration config links written to website and admin modules.</p>
                
                <div class="d-flex flex-column gap-3 mt-4">
                    <a href="website/index.php" class="btn btn-primary py-3"><i class="bi bi-globe me-1"></i> Open Matrimonial Site</a>
                    <a href="admin/admin-dashboard.php" class="btn btn-outline-primary py-3"><i class="bi bi-shield-lock-fill me-1"></i> Open Admin Panel</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
