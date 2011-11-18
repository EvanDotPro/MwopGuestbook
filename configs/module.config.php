<?php
return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                'mwopguestbook'        => 'MwopGuestbook\Controller\GuestbookController',
                'mwopguestbook_db'     => 'Zend\Db\Adapter\DiPdoMysql',
                'mwopguestbook_mapper' => 'MwopGuestbook\Model\GuestbookMapper',
                'mwopguestbook_table'  => 'MwopGuestbook\Model\DbTable\Guestbook',
            ),

            'preferences' => array(
                'Zend\Mvc\Router\RouteStack' => 'Zend\Mvc\Router\SimpleRouteStack',
            ),

            'MwopGuestbook\Controller\GuestbookController' => array(
                'parameters' => array(
                    'mapper' => 'MwopGuestbook\Model\GuestbookMapper',
                ),
            ),

            'MwopGuestbook\Model\GuestbookMapper' => array(
                'parameters' => array(
                    'dbTable' => 'MwopGuestbook\Model\DbTable\Guestbook',
                ),
            ),

            'MwopGuestbook\Model\DbTable\Guestbook' => array(
                'parameters' => array(
                    'config' => 'mwopguestbook_db',
                ),
            ),

            'mwopguestbook_db' => array(
                'parameters' => array(
                    'pdo'    => 'mwopguestbook_pdo',
                    'config' => array(),
                ),
            ),

            'Zend\View\PhpRenderer' => array(
                'parameters' => array(
                    'resolver' => 'Zend\View\TemplatePathStack',
                    'options'  => array(
                        'script_paths' => array(
                            'mwopguestbook' => __DIR__ . '/../views',
                        ),
                    ),
                ),
            ),
        ),
    ),
    'routes' => array(
        'mwopguestbook' => array(
            'type' => 'Literal',
            'priority' => 1000,
            'options' => array(
                'route' => '/guestbook',
                'defaults' => array(
                    'controller' => 'mwopguestbook',
                ),
            ),
            'may_terminate' => true,
            'child_routes' => array(
                'sign' => array(
                    'type' => 'Literal',
                    'options' => array(
                        'route' => '/sign',
                        'defaults' => array(
                            'controller' => 'mwopguestbook',
                            'action'     => 'sign',
                        ),
                    ),
                ),
            ),
        ),
    ),
);
