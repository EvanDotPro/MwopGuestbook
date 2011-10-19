<?php
return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                'guestbook'        => 'Guestbook\Controller\GuestbookController',
                'guestbook-db'     => 'Zend\Db\Adapter\DiPdoMysql',
                'guestbook-mapper' => 'Guestbook\Model\GuestbookMapper',
                'guestbook-table'  => 'Guestbook\Model\DbTable\Guestbook',
            ),

            'preferences' => array(
                'Zend\Mvc\Router\RouteStack' => 'Zend\Mvc\Router\SimpleRouteStack',
            ),

            'Guestbook\Controller\GuestbookController' => array(
                'parameters' => array(
                    'mapper' => 'Guestbook\Model\GuestbookMapper',
                ),
            ),

            'Guestbook\Model\GuestbookMapper' => array(
                'parameters' => array(
                    'dbTable' => 'Guestbook\Model\DbTable\Guestbook',
                ),
            ),

            'Guestbook\Model\DbTable\Guestbook' => array(
                'parameters' => array(
                    'config' => 'guestbook-db',
                ),
            ),

            'guestbook-db' => array(
                'parameters' => array(
                    'pdo'    => 'guestbook-pdo',
                    'config' => array(),
                ),
            ),

            'Zend\View\PhpRenderer' => array(
                'parameters' => array(
                    'resolver' => 'Zend\View\TemplatePathStack',
                    'options'  => array(
                        'script_paths' => array(
                            'guestbook' => __DIR__ . '/../views',
                        ),
                    ),
                ),
            ),
        ),
    ),
);
