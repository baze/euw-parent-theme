<?php

namespace Theme\Contracts;

interface LocationContract {

	public function map( $adr_title = null, $adr_arr = [ ] );
	public function location( $adr_arr = [ ] );

}