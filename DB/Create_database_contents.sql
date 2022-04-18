USE `CLAVIERS_ET_SOURIS`;

-- ------ --
-- LES OS --
-- ------ --

INSERT INTO `OS`(nom) VALUES ('Linux'), ('MacOS'), ('Windows');

-- ------------ --
-- LES CLAVIERS --
-- ------------ --

INSERT INTO
CLAVIER(nom,                       marque,              prix,   nombre_touches, mécanique, split, deux_parties, columnar, orthogonal, manuform, programmable, bluetooth, hlink)
VALUES ('Moonlander mark I',       'zsa',               328,    72,             true,      true,  true,         true,     false,      false,    true,         false,     'https://www.zsa.io'),
('Charybdis',                      'bastard keyboards', 372,    56,             true,      true,  true,         true,     false,      true,     true,         false,     'https://bastardkb.com/charybdis/'),
('Charybdis nano',                 'bastard keyboards', 338,    35,             true,      true,  true,         true,     false,      true,     true,         false,     'https://bastardkb.com/charybdis-nano/'),
('Glove80',                        'MoErgo',            311,    80,             true,      true,  true,         true,     false,      true,     true,         true,      'https://www.moergo.com/'),
('Kinesis Advantage 2',            'kinesis ergo',      333,    86,             true,      true,  false,        true,     false,      true,     true,         false,     'https://kinesis-ergo.com/shop/advantage2/'),
('Maltron L90 dual hand',          'Maltron',           515,    110,            true,      true,  false,        true,     false,      true,     true,         false,     'https://www.maltron.com/store/p36/Maltron_L90_dual_hand_fully_ergonomic_%283D%29_keyboard_-_French_Language.html'),
('Maltron L90 dual hand flat',     'Maltron',           515,    110,            true,      true,  false,        true,     false,      false,    true,         false,     'https://www.maltron.com/store/p36/Maltron_L90_dual_hand_fully_ergonomic_%283D%29_keyboard_-_French_Language.html'),
('Dygma Raise',                    'Dygma',             288,    68,             true,      true,  true,         false,    false,      false,    true,         false,     'https://dygma.com/'),
('Ultimate Hacking Keyboard',      'UHK',               270,    63,             true,      true,  true,         false,    false,      false,    true,         false,     'https://ultimatehackingkeyboard.com/product/uhk60v2'),
('Cleave Keyboard',                'truly ergonomic',   297,    92,             true,      true,  false,        true,     false,      false,    false,        false,     'https://trulyergonomic.com/ergonomic-keyboards/'),
('Kodak Truform 3500',             'adesso',            90,     105,            false,     true,  false,        false,    false,      false,    false,        true,      'https://www.adesso.com/product/wireless-ergonomic-trackball-keyboard/'),
('Ergodox EZ',                     'zsa',               316,    76,             true,      true,  true,         true,     false,      false,    false,        false,     'https://ergodox-ez.com/'),
('Plank EZ',                       'zsa',               221,    47,             true,      false, false,        true,     true,       false,    false,        false,     'https://www.zsa.io/planck/'),
('Esrille New Keyboard',           'Esrille',           NULL,   76,             true,      true,  false,        true,     false,      false,    false,        false,     'https://www.esrille.com/keyboard/'),
('Kinesis Freestyle Pro',          'kinesis ergo',      162,    95,             true,      true,  true,         false,    false,      false,    false,        false,     'https://kinesis-ergo.com/shop/freestyle-pro/'),
('MX Keys',                        'Logitech',          139.99, 108,            true,      false, false,        false,    false,      false,    false,        true,      'https://www.logitech.com/fr-fr/products/keyboards/mx-keys-wireless-keyboard.html'),
('MX Keys Mini',                   'Logitech',          109,    79,             true,      false, false,        false,    false,      false,    false,        true,      'https://www.logitech.com/fr-fr/products/keyboards/mx-keys-mini.html'),
('Happy Hacking Keyboard Hybrid',  'HHKB',              265.49, 60,             true,      false, false,        false,    false,      false,    false,        true,      'https://www.hhkeyboard.com/fr/products/'),
('Happy Hacking Keyboard Classic', 'HHKB',              220.49, 60,             true,      false, false,        false,    false,      false,    false,        false,     'https://www.hhkeyboard.com/fr/products/'),
('X Bows Lite',                    'X Bows',            90,     86,             true,      true,  false,        true,     false,      false,    false,        false,     'https://x-bows.com/collections/keyboards/products/x-bows-lite-ergonomic-mechanical-keyboard'),
('X Bows Knight',                  'X Bows',            207,    86,             true,      true,  false,        true,     false,      false,    false,        false,     'https://x-bows.com/collections/mechanicalkeyboards/products/x-bows-knight-ergonomic-mechanical-keyboard'),
('X Bows Knight Plus',             'X Bows',            207,    108,            true,      true,  false,        true,     false,      false,    false,        false,     'https://x-bows.com/collections/mechanicalkeyboards/products/x-bows-knight-plus-ergonomic-mechanical-keyboard-with-magnetic-number-pad'),
('K860 ergo',                      'Logitech',          119,    111,            true,      true,  false,        false,    false,      false,    false,        true,      'https://www.logitech.com/fr-fr/ergo/k860-features.html'),
('Type Matrix 2030',               'TypeMatrix',        100,    80,             true,      true,  false,        true,     true,       false,    false,        false,     'http://www.typematrix.com/2030/features.php'),
('Apple Adjustable',               'Apple',             NULL,   62,             true,      true,  false,        false,    false,      false,    false,        false,     'https://en.wikipedia.org/wiki/Apple_Adjustable_Keyboard'),
('rambi',                          NULL,                NULL,   23,             true,      true,  true,         true,     true,       false,    true,         true,      'https://github.com/rambip/splitboard');


-- -------------------------- --
-- COMPATIBILITE DES CLAVIERS --
-- -------------------------- --

INSERT INTO
CLAVIER_COMPATIBLE(id_clavier,                                        os,        nom_driver)
VALUES
((SELECT id FROM CLAVIER WHERE nom='Moonlander mark I'),              'Linux',   'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Moonlander mark I'),              'MacOS',   'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Moonlander mark I'),              'Windows', 'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Charybdis'),                      'Linux',   'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Charybdis'),                      'MacOS',   'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Charybdis'),                      'Windows', 'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Charybdis nano'),                 'Linux',   'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Charybdis nano'),                 'MacOS',   'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Charybdis nano'),                 'Windows', 'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Glove80'),                        'Linux',   'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Glove80'),                        'MacOS',   'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Glove80'),                        'Windows', 'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Kinesis Advantage 2'),            'Linux',   'smart set'),
((SELECT id FROM CLAVIER WHERE nom='Kinesis Advantage 2'),            'MacOS',   'smart set'),
((SELECT id FROM CLAVIER WHERE nom='Kinesis Advantage 2'),            'Windows', 'smart set'),
((SELECT id FROM CLAVIER WHERE nom='Maltron L90 dual hand'),          'Linux',   NULL),
((SELECT id FROM CLAVIER WHERE nom='Maltron L90 dual hand'),          'MacOS',   NULL),
((SELECT id FROM CLAVIER WHERE nom='Maltron L90 dual hand'),          'Windows', NULL),
((SELECT id FROM CLAVIER WHERE nom='Maltron L90 dual hand flat'),     'Linux',   NULL),
((SELECT id FROM CLAVIER WHERE nom='Maltron L90 dual hand flat'),     'MacOS',   NULL),
((SELECT id FROM CLAVIER WHERE nom='Maltron L90 dual hand flat'),     'Windows', NULL),
((SELECT id FROM CLAVIER WHERE nom='Dygma Raise'),                    'Linux',   'Dygma configurator'),
((SELECT id FROM CLAVIER WHERE nom='Dygma Raise'),                    'MacOS',   'Dygma configurator'),
((SELECT id FROM CLAVIER WHERE nom='Dygma Raise'),                    'Windows', 'Dygma configurator'),
((SELECT id FROM CLAVIER WHERE nom='Ultimate Hacking Keyboard'),      'Linux',   'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Ultimate Hacking Keyboard'),      'MacOS',   'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Ultimate Hacking Keyboard'),      'Windows', 'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Cleave Keyboard'),                'Linux',   NULL),
((SELECT id FROM CLAVIER WHERE nom='Cleave Keyboard'),                'MacOS',   NULL),
((SELECT id FROM CLAVIER WHERE nom='Cleave Keyboard'),                'Windows', NULL),
((SELECT id FROM CLAVIER WHERE nom='Kodak Truform 3500'),             'Windows', NULL),
((SELECT id FROM CLAVIER WHERE nom='Ergodox EZ'),                     'Linux',   'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Ergodox EZ'),                     'MacOS',   'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Ergodox EZ'),                     'Windows', 'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Plank EZ'),                       'Linux',   'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Plank EZ'),                       'MacOS',   'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Plank EZ'),                       'Windows', 'QMK'),
((SELECT id FROM CLAVIER WHERE nom='Esrille New Keyboard'),           'Linux',   NULL),
((SELECT id FROM CLAVIER WHERE nom='Esrille New Keyboard'),           'MacOS',   NULL),
((SELECT id FROM CLAVIER WHERE nom='Esrille New Keyboard'),           'Windows', NULL),
((SELECT id FROM CLAVIER WHERE nom='Kinesis Freestyle Pro'),          'MacOS',   NULL),
((SELECT id FROM CLAVIER WHERE nom='Kinesis Freestyle Pro'),          'Windows', NULL),
((SELECT id FROM CLAVIER WHERE nom='MX Keys'),                        'Linux',   'Logi Options'),
((SELECT id FROM CLAVIER WHERE nom='MX Keys'),                        'MacOS',   'Logi Options'),
((SELECT id FROM CLAVIER WHERE nom='MX Keys'),                        'Windows', 'Logi Options'),
((SELECT id FROM CLAVIER WHERE nom='MX Keys Mini'),                   'Linux',   'Logi Options'),
((SELECT id FROM CLAVIER WHERE nom='MX Keys Mini'),                   'MacOS',   'Logi Options'),
((SELECT id FROM CLAVIER WHERE nom='MX Keys Mini'),                   'Windows', 'Logi Options'),
((SELECT id FROM CLAVIER WHERE nom='Happy Hacking Keyboard Hybrid'),  'Linux',   NULL),
((SELECT id FROM CLAVIER WHERE nom='Happy Hacking Keyboard Hybrid'),  'MacOS',   NULL),
((SELECT id FROM CLAVIER WHERE nom='Happy Hacking Keyboard Hybrid'),  'Windows', NULL),
((SELECT id FROM CLAVIER WHERE nom='Happy Hacking Keyboard Classic'), 'Linux',   NULL),
((SELECT id FROM CLAVIER WHERE nom='Happy Hacking Keyboard Classic'), 'MacOS',   NULL),
((SELECT id FROM CLAVIER WHERE nom='Happy Hacking Keyboard Classic'), 'Windows', NULL),
((SELECT id FROM CLAVIER WHERE nom='X Bows Lite'),                    'Windows', NULL),
((SELECT id FROM CLAVIER WHERE nom='X Bows Knight'),                  'Windows', NULL),
((SELECT id FROM CLAVIER WHERE nom='K860 ergo'),                      'Linux',   'Logi Options'),
((SELECT id FROM CLAVIER WHERE nom='K860 ergo'),                      'MacOS',   'Logi Options'),
((SELECT id FROM CLAVIER WHERE nom='K860 ergo'),                      'Windows', 'Logi Options'),
((SELECT id FROM CLAVIER WHERE nom='Type Matrix 2030'),               'Linux',   NULL),
((SELECT id FROM CLAVIER WHERE nom='Type Matrix 2030'),               'MacOS',   NULL),
((SELECT id FROM CLAVIER WHERE nom='Type Matrix 2030'),               'Windows', NULL),
((SELECT id FROM CLAVIER WHERE nom='rambi'),               'Linux',   NULL),
((SELECT id FROM CLAVIER WHERE nom='rambi'),               'MacOS',   NULL),
((SELECT id FROM CLAVIER WHERE nom='rambi'),               'Windows', NULL);



-- ---------- --
-- LES SOURIS --
-- ---------- --

INSERT INTO
`SOURIS`(nom,                     marque,      prix,   trackball, trackpad, bluetooth, hlink)
VALUES ('MX ergo',                'Logitech',  119.99, true,      false,    true,      'https://www.logitech.com/fr-fr/products/mice/mx-ergo-wireless-trackball-mouse.910-005179.html'),
('ergo M575',                     'Logitech',  49.99,  true,      false,    true,      'https://www.logitech.com/fr-fr/products/mice/m575-ergo-wireless-trackball.910-005872.html'),
('signature M650',                'Logitech',  44.99,  false,     false,    true,      'https://www.logitech.com/fr-fr/products/mice/m650-signature-wireless-mouse.html'),
('MX vertical',                   'Logitech',  119.99, false,     false,    true,      'https://www.logitech.com/fr-fr/products/mice/mx-vertical-ergonomic-mouse.910-005448.html'),
('MX master 3',                   'Logitech',  129.99, false,     false,    true,      'https://www.logitech.com/fr-fr/products/mice/mx-master-3.910-005694.html'),
('L-track',                       'X-keys',    177,    true,      false,    false,     'https://www.x-keys-uk.com/products/x-keys-l-trac-red-trackball'),
('Huge Trackball',                'Elecom',    53,     true,      false,    true,      'https://www.elecom.co.jp.e.gj.hp.transer.com/products/M-HT1DRBK.html'),
('Magic trackpad',                'Apple',     135,    false,     true,     true,      'https://www.apple.com/fr/shop/product/MK2D3Z/A/magic-trackpad-surface-multi%E2%80%91touch-blanc'),
('Touchpad T650',                 'Logitech',  100,    false,     true,     false,     'https://www.logitech.com/assets/46475/2/wireless-rechargeable-touchpad-t650.pdf'),
('Souris pour windows seulement', 'Micro$oft', 2568,   false,     false,    false,     'about:blank'),
;


-- ------------------------ --
-- COMPATIBILITE DES SOURIS --
-- ------------------------ --

INSERT INTO
`SOURIS_COMPATIBLE`(id_souris,                                     os,        nom_driver)
VALUES ((SELECT id FROM SOURIS WHERE nom='MX ergo'),               'Linux',   'Logi Options'),
((SELECT id FROM SOURIS WHERE nom='MX ergo'),                      'MacOS',   'Logi Options'),
((SELECT id FROM SOURIS WHERE nom='MX ergo'),                      'Windows', 'Logi Options'),
((SELECT id FROM SOURIS WHERE nom='ergo M575'),                    'Linux',   'Logi Options'),
((SELECT id FROM SOURIS WHERE nom='ergo M575'),                    'MacOS',   'Logi Options'),
((SELECT id FROM SOURIS WHERE nom='ergo M575'),                    'Windows', 'Logi Options'),
((SELECT id FROM SOURIS WHERE nom='signature M650'),               'Linux',   'Logi Options'),
((SELECT id FROM SOURIS WHERE nom='signature M650'),               'MacOS',   'Logi Options'),
((SELECT id FROM SOURIS WHERE nom='signature M650'),               'Windows', 'Logi Options'),
((SELECT id FROM SOURIS WHERE nom='MX master 3'),                  'Linux',   'Logi Options'),
((SELECT id FROM SOURIS WHERE nom='MX master 3'),                  'MacOS',   'Logi Options'),
((SELECT id FROM SOURIS WHERE nom='MX master 3'),                  'Windows', 'Logi Options'),
((SELECT id FROM SOURIS WHERE nom='L-track'),                      'Linux',   NULL),
((SELECT id FROM SOURIS WHERE nom='L-track'),                      'MacOS',   NULL),
((SELECT id FROM SOURIS WHERE nom='L-track'),                      'Windows', NULL),
((SELECT id FROM SOURIS WHERE nom='Huge Trackball'),               'Linux',   NULL),
((SELECT id FROM SOURIS WHERE nom='Huge Trackball'),               'MacOS',   NULL),
((SELECT id FROM SOURIS WHERE nom='Huge Trackball'),               'Windows', NULL),
((SELECT id FROM SOURIS WHERE nom='Magic trackpad'),               'MacOS',   NULL),
((SELECT id FROM SOURIS WHERE nom='Magic trackpad'),               'Windows', 'Magic Utilities'),
((SELECT id FROM SOURIS WHERE nom='Touchpad T650'),                'Windows', 'Logi Options'),
((SELECT id FROM SOURIS WHERE nom='Souris pour windows seulement', 'Windows', NULL))
;



-- ---------------------- --
-- LES SOURIS SUR CLAVIER --
-- ---------------------- --

INSERT INTO `SOURIS`(nom,                 marque,              trackball, trackpad, bluetooth)
VALUES ('pour charybdis',                 'bastard keyboards', true,      false,    false),
   ('pour charybdis nano',            'bastard keyboards', true,      false,    false),
   ('pour maltron L90 dual hand',     'Maltron',           true,      false,    false),
   ('pour Kodak Truform',             'adesso',            true,      false,    false),
   ('pour Kodak Truform',             'adesso',            false,     true,     false),
   ('pour Ultimate Hacking Keyboard', 'UHK',               true,      false,    false),
   ('pour Ultimate Hacking Keyboard', 'UHK',               false,     true,     false);

-- Positionnement des souris --

-- l'attribut *position* doit être insérable dans la phrase :
-- " souris intégrée au clavier, positionnée au *position*. "

INSERT INTO `SOURIS_SUR_CLAVIER`(id_souris,                                                  id_clavier,                                                       position)
VALUES ((SELECT id FROM `SOURIS` WHERE nom='pour charybdis'),                                (SELECT id FROM `CLAVIER` WHERE nom='Charybdis'),                 'pouce gauche'),
   ((SELECT id FROM `SOURIS` WHERE nom='pour charybdis nano'),                               (SELECT id FROM `CLAVIER` WHERE nom='Charybdis nano'),            'pouce gauche'),
   ((SELECT id FROM `SOURIS` WHERE nom='pour maltron L90 dual hand'),                        (SELECT id FROM `CLAVIER` WHERE nom='Maltron L90 dual hand'),     'milieu'),
   ((SELECT id FROM `SOURIS` WHERE nom='pour Kodak Truform' AND trackball=true),             (SELECT id FROM `CLAVIER` WHERE nom='Kodak Truform 3500'),        'milieu'),
   ((SELECT id FROM `SOURIS` WHERE nom='pour Kodak Truform' AND trackpad=true),              (SELECT id FROM `CLAVIER` WHERE nom='Kodak Truform 3500'),        'milieu'),
   ((SELECT id FROM `SOURIS` WHERE nom='pour Ultimate Hacking Keyboard' AND trackball=true), (SELECT id FROM `CLAVIER` WHERE nom='Ultimate Hacking Keyboard'), 'pouce droit'),
   ((SELECT id FROM `SOURIS` WHERE nom='pour Ultimate Hacking Keyboard' AND trackpad=true),  (SELECT id FROM `CLAVIER` WHERE nom='Ultimate Hacking Keyboard'), 'pouce droit');



-- ----------- --
-- ORDINATEURS --
-- ----------- --


INSERT INTO `ORDINATEUR`(nom, marque,  prix)
VALUES ('PowerBook 100',      'Apple', 2260),
('Macintosh Portable',        'Apple', 5880),
('Kinesis Laptop',            NULL,    NULL),
('MacBookAir 2017',           'Apple', 400)
;


-- SOURIS SUR DES ORDINATEURS --

INSERT INTO `SOURIS`(nom,    marque,  trackball, trackpad, bluetooth)
VALUES ('sur PowerBook 100', 'Apple', true,      false,    false),
('sur Macintosh Portable',   'Apple', true,      false,    false),
('sur Kinesis Laptop',       NULL,    false,     true,     false),
('trackpad sur MakBookAir',  'Apple', false,     true,     false);


-- Positionnement des souris --

INSERT INTO `SOURIS_SUR_ORDINATEUR`(id_souris,                 id_ordi)
VALUES ((SELECT id FROM SOURIS WHERE nom='sur PowerBook 100'), (SELECT id FROM ORDINATEUR WHERE nom='PowerBook 100')),
((SELECT id FROM SOURIS WHERE nom='sur Macintosh Portable'),   (SELECT id FROM ORDINATEUR WHERE nom='Macintosh Portable')),
((SELECT id FROM SOURIS WHERE nom='sur Kinesis Laptop'),       (SELECT id FROM ORDINATEUR WHERE nom='Kinesis Laptop')),
((SELECT id FROM SOURIS WHERE nom='trackpad sur MakBookAir'),  (SELECT id FROM ORDINATEUR WHERE nom='MacBookAir 2017'));




-- CLAVIERS SUR DES ORDINATEURS --

-- TODO: ajouter différents claviers/trackpads des MacBookPro (butterfly, magic keyboard, ...) (trackpad, magic trackpad, ...)
INSERT INTO
CLAVIER(nom,                            marque,  prix, nombre_touches, mécanique, split, deux_parties, columnar, orthogonal, manuform, programmable, bluetooth, hlink)
VALUES ('Clavier Kinesis sur portable', NULL,    NULL, 86,             false,     true,  false,        true,     false,      false,    false,        false,     'http://xahlee.info/kbd/kinesis_laptop.html'),
('Clavier butterfly',                   'Apple', NULL, 79,             false,     false, false,        false,    false,      false,    false,        false,     'about:blank');

-- Positionnement des claviers --

-- TODO: ajouter des claviers sur ordinateurs /MacBook(Pro)?/ --
INSERT INTO `CLAVIER_SUR_ORDINATEUR`(id_clavier, id_ordi)
VALUES
((SELECT id FROM CLAVIER WHERE nom='Clavier Kinesis sur portable'), (SELECT id FROM ORDINATEUR WHERE nom='Kinesis Laptop')),
((SELECT id FROM CLAVIER WHERE nom='Clavier butterfly'), (SELECT id FROM ORDINATEUR WHERE nom='MacBookAir 2017'));


