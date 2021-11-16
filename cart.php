<?php

session_start();

if (empty($_SESSION['loginname'])){
    header('Location: login.php');
    exit();
}
?>
<?php
      if (isset($_GET['subtract']) && $_SESSION[$_SESSION['loginname']][$_GET['subtract']] > 0) {
        header('Location: cart.php');
          $_SESSION[$_SESSION['loginname']][$_GET['subtract']]--;
      }
      if (isset($_GET['add'])) {
        header('Location: cart.php');
        $_SESSION[$_SESSION['loginname']][$_GET['add']]++;
    }
?>
<?php require 'inc/data/products.php'; ?>
<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach($catalog as $id => $cookie) { ?>
        <li><?php echo $cookie['name'] . " : "; ?>
            <a href="?subtract=<?= $id; ?>" >-</a>
            <?php if(isset($_SESSION[$_SESSION['loginname']][$id])) echo $_SESSION[$_SESSION['loginname']][$id] ?>
            <a href="?add=<?= $id; ?>" >+</a>
        </li>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
