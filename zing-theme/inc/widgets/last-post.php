<?php
class ZingShop_Widget_LastPost extends WP_Widget{
	
	public function __construct() {
		$id_base = 'zingshop-widget-last-post';
		$name	= 'Bài viết mới nhất';
		$widget_options = array(
					'classname' => 'widget-last-post',
					'description' => 'Hien thi bai viet moi nhat'
				);
		$control_options = array('width'=>'250px');
		parent::__construct($id_base, $name,$widget_options, $control_options);
	}	
		
	public function widget( $args, $instance ) {
		extract($args);
							
		$title = apply_filters('widget_title', $instance['title']);
		$title = (empty($title)) ? 'Tin tức mới' : $title;
		$quantity = (empty($instance['quantity'])) ? 5 : $instance['quantity'];
		
		echo $before_widget;
		if(!empty($title)){
			echo $before_title . $title . $after_title;		
		}
		require 'html/last-post.php';
		
		echo $after_widget;
	}
	
	public function update( $new_instance, $old_instance ) {
		
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['quantity'] = strip_tags($new_instance['quantity']);
		
		return $instance;
	}
	
	public function form( $instance ) {
			//Tao phan tu chua Title
			$inputID 	= $this->get_field_id('title');
			$inputName 	= $this->get_field_name('title');
			$inputValue = @$instance['title'];
			$arr = array('class' =>'widefat','id' => $inputID);
			$htmlTitle = '<p><label for="'. $inputID .'">Tiêu đề: </label><br/>'
					. '<input type="text" name="'. $inputName .'" id="'. $inputID .'" size="35" value="'. $inputValue .'" /></p>';
			echo $htmlTitle;
			
			//Tao phan tu chua Quantity
			$inputID 	= $this->get_field_id('quantity');
			$inputName 	= $this->get_field_name('quantity');
			$inputValue = @$instance['quantity'];
			$arr = array('class' =>'widefat','id' => $inputID);
			$htmlTitle = '<p><label for="'. $inputID .'">Số post hiển thị: </label><br/>'
					. '<input type="text" name="'. $inputName .'" id="'. $inputID .'" size="35" value="'. $inputValue .'" /></p>';
			echo $htmlTitle;
	}
	
}
register_widget('ZingShop_Widget_LastPost');