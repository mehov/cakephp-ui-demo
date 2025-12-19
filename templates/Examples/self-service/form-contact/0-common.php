<?php

$this->Breadcrumbs->add([
    ['title' => 'Products', 'url' => ['controller' => 'products', 'action' => 'index']],
    ['title' => 'Product name', 'url' => ['controller' => 'products', 'action' => 'view', 1234]],
]);

echo $this->Breadcrumbs->render();

echo $this->fetch('content');
