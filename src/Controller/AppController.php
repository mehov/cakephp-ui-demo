<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/5/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Flash');

        // Reusable Session handle
        $session = $this->getRequest()->getSession();

        // Available designs
        $designs = [
            'default' => \App\View\AppView::class,
            'bootstrap' => \BootstrapUI\View\UIView::class,
            'dkfds' => \Bakeoff\DKFDS\View\View::class,
        ];
        // Use requested design, else design from Session
        $design = $this->getRequest()->getQuery('design');
        if (empty($design)) {
            $design = $session->read('design');
        }
        // Fall back to default design
        if (empty($design) || !isset($designs[$design])) {
            $design = \array_key_first($designs);
        }
        // Persist selected design
        $session->write('design', $design);
        // Use selected design
        $this->viewBuilder()->setClassName($designs[$design]);
        $this->viewBuilder()->setLayout('layout.' . $design);
    }
}
