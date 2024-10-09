<section class="footer-fixed">
    <div class="container">
        <div class="row">
            <?php

            isset($_SESSION['acUID']) ? $acUID = $_SESSION['acUID'] : $acUID="N/A";
            isset($_SESSION['acVID']) ? $acVID = $_SESSION['acVID'] : $acVID="N/A";
            isset($_SESSION['acUSR']) ? $acUSR = $_SESSION['acUSR'] : $acUSR="N/A";

            ?>
            <?php echo 'UID (' . $acUID . ') | VID (' .$acVID . ') | User (' . $acUSR . ') | ' . date('D m M Y');?> | Referral Management System
        </div>
    </div>
</section>