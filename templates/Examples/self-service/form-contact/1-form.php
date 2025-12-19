<?php
$this->extend('self-service/form-contact/0-common');

$entity = new \App\Model\Entity\Example();
$entity->setError('address', ['Example Error: You forgot house number!']);

echo $this->Form->create($entity);

echo $this->Form->control('name', [
    'label' => 'Full Name',
    'help' => 'No special characters are allowed',
]);

echo $this->Form->control('sex', [
    'type' => 'select',
    'label' => 'Sex',
    'options' => ['Male', 'Female'],
    'help' => 'Example help text',
]);

echo $this->Form->control('address', [
    'label' => 'Street and house number',
    'help' => 'Make sure you do not forget the house number',
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
    'class' => 'test-class',
    'options' => ['Under 18', '18 – 29', '30 – 39', '40 – 59', 'Over 60'],
    'help' => 'Example help text',
]);

echo $this->Form->control('agree', [
    'type' => 'checkbox',
    'label' => 'Agree to Terms of Service',
    'help' => 'There is no way around this',
]);

echo $this->Form->submit('Send');

echo $this->Form->end();
