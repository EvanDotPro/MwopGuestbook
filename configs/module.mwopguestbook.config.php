<?php
/**
 * MwopGuestbook Configuration
 */
$mwopGuestbookSettings = array(
    /**
     * PDO Connection DI alias
     *
     * Specify the DI alias for the configured PDO instance that MwopGuestbook 
     * should use.
     */
    'pdo' => 'CHANGEME',

    /**
     * End of MwopGuestbook configuration
     */
);

/**
 * You do not need to edit below this line
 */
return array(
    'di' => array(
        'instance' => array(
            'alias' => array(
                'mwopguestbook_pdo' => $mwopGuestbookSettings['pdo'],
            ),
        ),
    ),
);
