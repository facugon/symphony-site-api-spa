<?php

return "

SET foreign_key_checks = 0;

INSERT INTO OneToMany_Brands_Models (brand_id,model_id)
    SELECT b.id brand_id, m.id model_id 
    FROM Brand b
    INNER JOIN Model m ON b.id = m.brand_id
    ORDER BY m.id;

SET foreign_key_checks = 1;

";
