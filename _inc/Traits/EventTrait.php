<?php

namespace Theme\Traits;

use Carbon\Carbon;

trait EventTrait {

	public $start;
	public $end;

	public function __construct( $pid = null ) {
		$pid = $this->determine_id( $pid );
		parent::__construct( $pid );

		$this->start = new Carbon( $this->get_field( 'dates' )[0]['start'] );
		$this->end = new Carbon( $this->get_field( 'dates' )[0]['end'] );
	}

	public function duration($date = null) {

		$event = $date ?: $this;

		$duration = $this->end->diffInDays($this->start);

		return $duration;

	}

}