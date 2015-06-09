<?php namespace AGCommerce\Events;

use AGCommerce\Events\Event;

use AGCommerce\Order;
use AGCommerce\User;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class CheckoutEvent extends Event {

	use SerializesModels;

    protected $auth;

	/**
	 * Create a new event instance.
	 *
	 * @return void
	 */
	public function __construct(User $auth)
	{
		$this->auth = $auth;
	}

    /**
     * @return User
     */
    public function getAuth()
    {
        return $this->auth;
    }



}
