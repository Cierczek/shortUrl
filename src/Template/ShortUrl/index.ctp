<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ShortUrl[]|\Cake\Collection\CollectionInterface $shortUrl
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Short Url'), ['controller'=>'ShortUrl', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="shortUrl index large-9 medium-8 columns content">
    <h3><?= __('Short Url') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('orginal_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('short_url') ?></th>
                <th scope="col"><?= $this->Paginator->sort('visits') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($shortUrl as $shortUrl): ?>
            <tr>
                <td><?= h($shortUrl->orginal_url) ?></td>
                <td><?= h($shortUrl->short_url) ?></td>
                <td><?= $this->Number->format($shortUrl->visits) ?></td>
                <td class="actions">
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $shortUrl->id], ['confirm' => __('Are you sure you want to delete # {0}?', $shortUrl->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
