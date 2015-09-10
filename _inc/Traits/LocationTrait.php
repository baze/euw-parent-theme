<?php

namespace Theme\Traits;

trait LocationTrait {

	public function map( $adr_title = null, $adr_arr = [ ] ) {

		$adr_string = $this->location( $adr_arr );

		if ( $adr_string ) {
			$mymap   = new \Mappress_Map();
			$mypoi_1 = new \Mappress_Poi( [
				"title"   => $adr_title,
				"address" => $adr_string,
				"body"    => $adr_string
			] );
			$mypoi_1->geocode();
			$mymap->pois = array( $mypoi_1 );

			$mymap->width                    = '100%';
			$mymap->height                   = 480;
			$mymap->options->adaptive        = true;
			$mymap->options->alignment       = 'default';
			$mymap->options->border['style'] = '';
			$mymap->options->directions      = 'none'; //'google';
			$mymap->options->initialOpenInfo = true;
			$mymap->options->onLoad          = true;
			$mymap->options->postTypes       = array();

			return $mymap;
		}

		return null;
	}

	public function location( $adr_arr = [ ] ) {

		if ( empty( $adr_arr ) ) {
			$adr_arr[] = $this->get_field( 'address' );
			$adr_arr[] = $this->get_field( 'postal_code' );
			$adr_arr[] = $this->get_field( 'city' );
			$adr_arr[] = $this->get_field( 'state' );
			$adr_arr[] = $this->get_field( 'country' );
		}

		$adr_string = implode( ' ', $adr_arr );
		$adr_string = trim( $adr_string );

		return $adr_string;
	}

}