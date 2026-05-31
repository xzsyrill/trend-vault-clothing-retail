<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['confirm_logout'])) {
  $_SESSION = [];
  if (ini_get('session.use_cookies')) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
  }
  session_destroy();
  header('Location: login.php');
  exit();
}
$returnPage = $_SERVER['HTTP_REFERER'] ?? 'index.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trend Vault | Logout</title>
  <link rel="stylesheet" href="assets/css/base.css">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <style>
    body {
      min-height: 100vh;
      margin: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      background: linear-gradient(135deg, #f7f6f1, #ffffff);
      padding: 20px;
    }

    .logout-overlay {
      position: fixed;
      inset: 0;
      background: rgba(20, 20, 20, .48);
      backdrop-filter: blur(6px);
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 20px;
    }

    .logout-card {
      width: min(430px, 100%);
      background: #fff;
      border: 1px solid var(--tv-border);
      border-radius: 28px;
      padding: 34px 30px;
      text-align: center;
      box-shadow: 0 28px 80px rgba(0, 0, 0, .25);
      animation: popIn .28s ease both;
    }

    @keyframes popIn {
      from {
        opacity: 0;
        transform: translateY(18px) scale(.96)
      }

      to {
        opacity: 1;
        transform: translateY(0) scale(1)
      }
    }

    .logout-icon {
      width: 72px;
      height: 72px;
      margin: 0 auto 18px;
      border-radius: 50%;
      background: linear-gradient(135deg, #747264, #4e4d40);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      font-size: 36px;
      box-shadow: 0 12px 25px rgba(116, 114, 100, .35);
    }

    .logout-card h1 {
      font-size: clamp(28px, 5vw, 36px);
      color: var(--tv-dark);
      margin-bottom: 10px;
    }

    .logout-card p {
      font-size: 17px;
      line-height: 1.5;
      color: #626262;
      margin-bottom: 26px;
    }

    .logout-actions {
      display: flex;
      gap: 12px;
      justify-content: center;
    }

    .logout-actions a,
    .logout-actions button {
      border: 0;
      border-radius: 999px;
      padding: 14px 22px;
      font-size: 16px;
      font-weight: 800;
      cursor: pointer;
      text-decoration: none;
      transition: .25s ease;
    }

    .cancel-btn {
      background: var(--tv-soft);
      color: var(--tv-dark);
    }

    .cancel-btn:hover {
      background: #ece9df;
      transform: translateY(-2px);
    }

    .confirm-btn {
      background: var(--tv-dark);
      color: #fff;
    }

    .confirm-btn:hover {
      background: #111;
      transform: translateY(-2px);
    }

    @media(max-width:480px) {
      .logout-card {
        padding: 30px 22px
      }

      .logout-actions {
        flex-direction: column
      }

      .logout-actions a,
      .logout-actions button {
        width: 100%;
      }
    }
  </style>
</head>

<body>
  <div class="logout-overlay">
    <section class="logout-card" role="dialog" aria-modal="true" aria-labelledby="logoutTitle">
      <div class="logout-icon"><i class='bx bx-log-out-circle'></i></div>
      <h1 id="logoutTitle">Log out?</h1>
      <p>Are you sure you want to end your Trend Vault session?</p>
      <div class="logout-actions">
        <a class="cancel-btn" href="<?php echo htmlspecialchars($returnPage); ?>">Cancel</a>
        <form method="post" style="margin:0;">
          <button class="confirm-btn" type="submit" name="confirm_logout">Yes, Log Out</button>
        </form>
      </div>
    </section>
  </div>
</body>

</html>