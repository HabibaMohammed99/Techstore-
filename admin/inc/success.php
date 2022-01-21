<?php if($session->has("success")): ?>
    <div class="alert alert-success text-center">
            <p><?= $session->get("success") ?></p>
    </div>
<?php endif; $session->remove("success"); ?>