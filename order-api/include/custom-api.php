<?php
/**
 * Add rest api endpoint for order
 */

class Order_List_Rest {
	
	protected $namespace;
	
	protected $rest_base;

	public function __construct() {

		$this->namespace = 'woocommerce/v1';
		$this->rest_base = 'order';
	}
	
	public function get_years() {
		global $wpdb;
	    $yearList = '';
		$prefix = $wpdb->prefix;
		$columnName = $prefix."wc_order_stats";
		$orderStatus = 'wc-completed';

		$yearLists_sql = $wpdb->get_results(
	    	"SELECT DISTINCT YEAR(date_completed) AS year 
	    	FROM {$columnName} WHERE status = '{$orderStatus}' AND date_completed <= now() ORDER BY date_completed DESC"
    	);

    	foreach($yearLists_sql as $y_List){
			if(!empty($yearList)) {
				$yearList .= ',';
			}
			$yearList .= $y_List->year;
		}

		return $yearList;
	}

	public function get_months() {
		global $wpdb;
	    $monthList = '';
		$prefix = $wpdb->prefix;
		$columnName = $prefix."wc_order_stats";
		$orderStatus = 'wc-completed';

		$monthLists_sql = $wpdb->get_results(
			"SELECT DISTINCT MONTH(date_completed) AS month 
			FROM {$columnName} WHERE status = '{$orderStatus}' AND date_completed <= now() ORDER BY date_completed DESC"
		);
	
		foreach($monthLists_sql as $m_List){
			if(!empty($monthList)) {
				$monthList .= ',';
			}
			$monthList .= $m_List->month;
		}

		return $monthList;
	}
	
	public function register_routes() {
	
		register_rest_route( $this->namespace, '/' . $this->rest_base, 
			array(
				array(
					'methods'             => WP_REST_Server::READABLE,
					'callback'            => array( $this, 'get_orderlists' ),
					//'permission_callback' => array( $this, '__return_true' )
					'permission_callback' => '__return_true'
					),
					'args' => array(
		            	'year' => array(
		            		'default' => $this->get_years()
		            	),
		            	'month' => array(
		            		'default' => $this->get_months()
		            	)
		            )
			) 
		);

	}
	
	/*public function get_orderlists_permissions_check() {
		if(is_user_logged_in()) {
			return true;
		}
		return false;
	}*/
	
	public function get_orderlists($request='') {
		global $wpdb;
		$res = [];
		$regexPattern = '/^\d+(?:,\d+)*$/';
		$years = $request['year'];
		$months = $request['month'];
		$prefix = $wpdb->prefix;
		$columnName = $prefix."wc_order_stats";
		$orderStatus = 'wc-completed';

		if(empty($years)) {
			return new WP_Error( 'no_data_found',esc_html__('No data found (Give paramater value)'), 
				array( 'status' => 404 ));
			wp_die();
		}

		if (!preg_match($regexPattern, $years) ) {
			return new WP_Error( 'rest_forbidden',esc_html__('Only number is allowed (param: year)'), array( 'status' => 401 ));
			wp_die();
		}
		

		if(empty($months)) {
			return new WP_Error( 'no_data_found',esc_html__('No data found (Give parameter value)'), 
				array( 'status' => 404 ));
			wp_die();
		}

		
		if (!preg_match($regexPattern, $months) ) {
			return new WP_Error( 'rest_forbidden',esc_html__('Only number is allowed (param: month)'), array( 'status' => 401 ));
			wp_die();
		}

		$orderDetails = $wpdb->get_results(
			"SELECT DISTINCT YEAR(date_completed) AS year,
			MONTH(date_completed) AS month, 
			SUM(total_sales) AS total_price, SUM(num_items_sold) AS total_sale_count FROM {$columnName} WHERE status = '{$orderStatus}' AND YEAR(date_completed) IN ($years) AND MONTH(date_completed) IN ($months) GROUP BY year, month ORDER BY date_completed DESC",ARRAY_A
			);

		foreach ($orderDetails as $orderDetail) {
			$res[] = $orderDetail;
		}

		if(empty($res)) {
			return new WP_Error( 'no_data_found',esc_html__('No data found'),
				array( 'status' => 404 ));
			wp_die();
		}


		return rest_ensure_response($res);
	}

}

function register_order_api_controller() {
	$controller = new Order_List_Rest();
	$controller->register_routes();
}

add_action( 'rest_api_init', 'register_order_api_controller' );