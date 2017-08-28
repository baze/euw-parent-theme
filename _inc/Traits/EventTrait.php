<?php

namespace Theme\Traits;

use Carbon\Carbon;

trait EventTrait {

	public $start;
	public $end;
	public $nextDate;

	public function __construct( $pid = null ) {
		$pid = $this->determine_id( $pid );
		parent::__construct( $pid );

		$this->start = new Carbon( $this->get_field( 'dates' )[0]['event-start'] );
		$this->end = new Carbon( $this->get_field( 'dates' )[0]['event-end'] );
	}

	public function duration($date = null) {

		$event = $date ?: $this;

		$duration = $this->end->diffInDays($this->start);

		return $duration;

	}

	public function upcomingDates() {

		$now = Carbon::now();

		$dates = $this->get_field('dates');
		$res = [];

		foreach ($dates as $date) {
			if ($date['event-start'] >= $now->format('Ymd')) {
				$res[] = $date;
			}
		}

		usort( $res, function ( $item1, $item2 ) {
			if ( $item1['event-start'] == $item2['event-start'] ) {
				return 0;
			}

			return $item1['event-start'] < $item2['event-start'] ? - 1 : 1;
		} );

		return $res;
	}

	public function calculateEventsFromDates() {

		$res = [];
		$class = get_class();

		foreach ( $this->upcomingDates() as $upcomingDate ) {

			$e = new $class( $this->ID );
			$e->nextDate = $upcomingDate;

			$res[] = $e;

		}

		return $res;
	}

}