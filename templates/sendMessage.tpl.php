<?php
$action = $LOGICAL_LINKS['message_attempt'];
?>
<div class="container">
<form id="message_form" action=<?php echo "${action}";?> method="post">
    <h2>Üzenjen nekünk</h2>
    <div class="input-group">
        <label for="message">Üzenet</label>
        <textarea name="message" id="message" cols="40" rows="10" required></textarea>
    </div>
    <button type="button" class="btn" onclick="submitMessage('message_form', 'message')">Küldés</button>
</form>
</div>
