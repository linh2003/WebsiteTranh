<?php
/**
 * 
 */
class Pagination
{
	private $total; //Lay tong tat ca phan tu
	private $per_page; //so luong phan tu tren 1 page
	private $num_page; //tong so page
	private $current_page; //Page hien tai
	function __construct()
	{
		// code...
	}
	public function init($config=[]){
		//Lay tong tat ca product
		$this->total = $config['total'];
		//so luong phan tu tren 1 page
		$this->per_page = $config['per_page'];
		//echo '<br/>per_page:' .$this->per_page;
		//so trang co duoc
		$this->num_page = ceil($this->total / $this->per_page);
		//echo '<br/>num_page:' .$this->num_page;
		//get current page on the url
		$this->current_page = 1;
		if(isset($config['current_page'])){
			$this->current_page = intval($config['current_page']);
			if($this->current_page > $this->num_page){
				$this->current_page = 1;
			}			
		}
		//echo '<br/>current_page:' .$this->current_page;
		$from = ($this->current_page - 1) * $this->per_page;
		return $from;
	}
	public function create($args=[]){
		$html = '';
		$path = ADMIN_URL;
		if(isset($args['path'])){
			$path = $args['path'];
		}
		$slug = $path . $args['slug'];
		$mid_size = 2;
		if(isset($args['mid_size'])){
			$mid_size = $args['mid_size'];
			if($mid_size < 1){
				$mid_size = 2;
			}
		}
		if($this->num_page > 1){
			$html .= '<ul class="pagination__list list-unstyled" role="list">';
			$html .= '<li><a href="'.$slug.($this->current_page-1).'" class="pagination__item link" ';
			if($this->current_page == 1){
				$html .= 'style="display:none"';
			}
			$html .= '>Prev</a></li>';
			if($this->current_page > $mid_size + 1){
				echo '<li><a href="'.$slug.'1" class="pagination__item link">1</a></li>';
			}
			for($i=1;$i<=$this->num_page;$i++){
				if($i == $this->current_page){
					$html .= '<li><strong class="pagination__item pagination__item--current">'.$i.'</strong></li>';
				}else{
					$html .= '<li><a href="'.$slug . $i.'"  class="pagination__item link" ';
					if(abs($this->current_page - $i) > $mid_size){ 
						$html .= 'style="display:none"';
					}
					$html .= '>'.$i.'</a></li>';
				}
			}
			if($this->num_page - $this->current_page > 2){
				$html .= '<li><a href="'.$slug.($this->num_page).'" class="pagination__item link">'.$this->num_page.'</a></li>';
			}
			$html .= '<li><a href="'.$slug.($this->current_page+1).'" class="pagination__item link" ';
			if($this->current_page == $this->num_page){
				$html .= 'style="display:none"';
			}
			$html .= '>Next</a></li>';
			$html .= '</ul>';
		}
		return $html;
	}
}