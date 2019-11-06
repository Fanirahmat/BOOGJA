<?php
	
        var_dump($this->db->query("SELECT 'no_meja' FROM 'restoran_meja' WHERE 'id_restoran' = '" . $dr->id_restoran . "'")->num_rows());
?>