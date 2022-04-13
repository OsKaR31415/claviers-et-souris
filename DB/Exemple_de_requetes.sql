

-- tous les claviers avec souris intégrée
SELECT * from CLAVIER WHERE id IN (SELECT id_clavier from SOURIS_SUR_CLAVIER);

-- clavier compatible linux
SELECT * FROM CLAVIER WHERE id IN (SELECT id_clavier FROM CLAVIER_COMPATIBLE WHERE os='Linux');

-- clavier avec trackpad intégré
SELECT * from CLAVIER WHERE id IN (SELECT id_clavier from SOURIS_SUR_CLAVIER WHERE id_souris IN (SELECT id FROM SOURIS WHERE trackpad = true));

-- claviers avec souris intégrée, plus de 40 touches et compatibles Linux
SELECT * from CLAVIER WHERE id IN (SELECT id_clavier from SOURIS_SUR_CLAVIER) AND nombre_touches > 40 AND id IN (SELECT id_clavier FROM CLAVIER_COMPATIBLE WHERE os='Linux');


