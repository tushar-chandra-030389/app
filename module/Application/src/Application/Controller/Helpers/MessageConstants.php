<?php
/*

 * PATH : Application/src/Application/Controller/Helpers/messageConstants.php
	
*/

namespace Application\Controller\Helpers;

class MessageConstants {
	/* General Start */
		const FORWARD_REQUEST = 9000;
		const FORWARD_REPLY = 9001;
		const DB_ERROR = 9999;
	/* General End */
	
	/* Signup Start */
		const EMAIL_EXISTS = 10;
		const POST_SIGNUP_ADD_COMPANY = 11;
	/* Signup End */
	
	/* Signin Start */
		const INVALID_CREDENTIALS = 20;
		const SIGNIN_AUTHENTICATE_SUCCESS = 21;
	/* Signin End */

	/* Authenticate Start */
		const AUTHENTICATION_FAILED = 100;
		const AUTHENTICATION_SUCCESS = 110;
		const AUTHENTICATION_EXPIRED = 120;

		const AUTHORIZATION_FAILED = 150;
		const AUTHORIZATION_SUCCESS = 160;
	/* Authenticate End */

	/* Roles Start */
		const IS_LVL0 = 180;
		const IS_LVL1 = 181;
		const IS_LVL2 = 182;
		const IS_LVL3 = 183;
		const IS_LVL4 = 184;

		const NO_ACTIVE_ROLES = 200; 
	/* Roles End */
}
