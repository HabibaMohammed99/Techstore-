<?php if($session->has("errors")): ?>
    <div class="alert alert-danger">
        <?php foreach($session->get("errors") as $error): ?>
            <p><?= $error ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; $session->remove("errors"); ?>