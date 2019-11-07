<?php

Class View {
    
    private $nav;
	private $side;
    //private $head;
    private $content;
    private $foot;
    private $plugin;
	private $data = array();
	
	function __construct() {
		$this->nav = "menu_contents/navbar.php";
        $this->side = "menu_contents/sidebar.php";
        //$this->head = "menu_contents/header.php";
        $this->content = "menu_contents/content.php";
        $this->foot = "menu_contents/footer.php";
        $this->plugin = "menu_contents/plugins.php";
	}

	public function set_content($file_name) {
		$this->content = $file_name;
	}
	
	public function render_all() {
		
		$VAR = $this->data;
        include_once($this->nav);
        include_once($this->side);
		//include_once($this->head);
		include_once($this->content);
        include_once($this->foot);
        include_once($this->plugin);
	}
	
	public function push_data($array_value) {
		if($array_value != null)
			$this->data += $array_value;
	}
	
}

?>