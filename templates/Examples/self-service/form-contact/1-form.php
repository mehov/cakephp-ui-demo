<?php
$this->extend('self-service/form-contact/0-common');

echo $this->Form->create(null);

echo $this->Form->control('name', [
    'label' => 'Name',
]);

echo $this->Form->control('address', [
    'label' => 'Street and house number',
]);

echo $this->Form->control('postal_code', [
    'label' => 'Postal code',
]);

echo $this->Form->control('phone', [
    'label' => 'Phone number',
    'help' => 'Optional',
]);

echo $this->Form->control('email', [
    'type' => 'email',
    'label' => 'E-mail address',
]);

echo $this->Form->control('age_group', [
    'type' => 'radio',
    'label' => 'Age group',
    'options' => ['Under 18', '18 – 29', '30 – 39', '40 – 59', 'Over 60'],
]);

echo $this->Form->control('agree', [
    'label' => 'Agree to Terms of Service',
    'type' => 'checkbox',
]);

echo $this->Form->submit('Send');

echo $this->Form->end();
