<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShortUrl $shortUrl
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Short Url'), '/'); ?></li>
    </ul>
</nav>
<div class="shortUrl form large-9 medium-8 columns content">
    <?= $this->Form->create($shortUrl) ?>
    <fieldset>
        <legend><?= __('Add Short Url') ?></legend>
        <?= $this->Form->control('orginal_url'); ?>
    </fieldset>
    <button type="button" id="send">Submit</button>
    <?= $this->Form->end() ?>
</div>
<script>
    var csrfToken = <?= json_encode($this->request->getParam('_csrfToken')) ?>;
    $(function () {
        $('#send').on('click', function () {

            $.ajax({
                method: 'POST',
                headers: {
                    'X-CSRF-Token': csrfToken
                },
                url: "/short-url/add",
                data: {
                    orginal_url: $('#orginal-url').val(),
                },
                dataType: 'json'

            }).done(function (data, textStatus, jqXHR) {
                if (!data.error) {
                    console.log(data);
                    $(".shortUrl").append("<p><a href='" + data.shortUrl.short_url + "'>" + data.shortUrl.short_url + "</a></p>");
                } else {
                    alert(data.error);
                }

            }).fail(function () {

            });
        });
    });
</script>