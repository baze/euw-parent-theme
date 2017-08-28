<?php

namespace Theme\Traits;

trait FileTrait {

	public function __construct( $pid = null ) {
		$pid = $this->determine_id( $pid );
		parent::__construct( $pid );
	}

	public function filesize() {

		return 0;

	}

}