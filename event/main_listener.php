<?php
/**
*
* @package Cookie Portal
* @copyright (c) 2013 Bruninoit
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/
namespace bruninoit\cookieportal\event;
/**
* @ignore
*/
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
/**
* Event listener
*/
class main_listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.user_setup'						=> 'cookie_portal'
			);
	}
	/* @var \phpbb\template\template */
	protected $template;
	protected $request;
    protected $config;
    protected $user;

	/**
	* Constructor
	*
	* @param \phpbb\template			$template	Template object
	*/
	public function __construct(\phpbb\template\template $template, \phpbb\request\request $request, \phpbb\config\config $config, \phpbb\user $user)	{
        $this->template = $template;
        $this->request = $request; 
        $this->config = $config;
        $this->user = $user;
	}
	public function cookie_portal($event)
	{
    $cookie=$this->request->variable($this->config['cookie_name'] . '_brunino_cookieportal', '', true, \phpbb\request\request_interface::COOKIE);
    //if($this->request->variable('cookie_accepted', 0) and !$cookie)
    if($cookie)
    {
    $this->template->assign_var('COOKIE_DISPLAY', true);
    }else{
    $url = $this->helper->route('bruninoit_cookieportal_controller');
    header("location: $url");
    }
    
    
    
    //echo $cookie . time();
    //$this->user->set_cookie('brunino_cookieportal', true, strtotime('+1 year')); 
    //$this->template->assign_var('COOKIE_COOKIE', $this->config['cookie_name'] . '_brunino_cookieportal');
    //$this->template->assign_var('TIMESTAMP', time()); 
    //$this->template->assign_var('TIME_FINAL', time()+(365*24*3600)); 
 }
}
