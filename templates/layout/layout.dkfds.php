<?php
use Cake\Core\Configure;

$this->extend('layout');

if (Configure::read('debug')) {
    $this->prepend('css', $this->Html->css(['dkfds.dkfds-virkdk']));
} else {
    $this->prepend('css', $this->Html->css(['dkfds.dkfds-virkdk.min']));
}

if (Configure::read('debug')) {
    $this->prepend('script', $this->Html->script(['dkfds.dkfds']));
} else {
    $this->prepend('script', $this->Html->script(['dkfds.dkfds.min']));
}
?>

        <main class="container page-container" id="main-content">

<?php
echo $this->Flash->render();
echo $this->fetch('content');
?>

        </main>
