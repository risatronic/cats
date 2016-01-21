<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Application {

	/**
	 * Index Page for this controller.
	 */
	public function index()
	{
            // Get all images.
            $pix = $this->images->all();
            
            // Create an array of formatted image cells.
            foreach ($pix as $picture)
                $cells[] = $this->parser->parse('_cell', (array) $picture, true);
            
            // Prepare table class.
            $this->load->library('table');
            $parms = array(
                'table_open' => '<table class="gallery">',
                'cell_start' => '<td class="oneimage">',
                'cell_alt_start' => '<td class="oneimage">'
            );
            $this->table->set_template($parms);
            
            // Generate image table.
            $rows = $this->table->make_columns($cells, 3);
            $this->data['thetable'] = $this->table->generate($rows);
                        
            $this->data['pagebody'] = 'gallery'; 
            $this->render();
	}
}
