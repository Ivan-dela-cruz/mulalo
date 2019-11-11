<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Languages extends Admin_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("language_model");
		//$this->load->model("setting_model");
	}
	
	
	function switch_language($language = "",$f=false,$s=false,$t=false,$ft=false) {
			//echo $_POST['id'];
			if($_POST['id']==0){
				$this->session->set_userdata(array('lang'       => 'english','direction' => 'ltr'));
			}
			$lang	=	$this->language_model->get_language_id($_POST['id']);
			if($lang){
				$this->session->set_userdata(array(
                            'lang'       => $lang->name,
							'direction' => $lang->direction
                    ));
			}
			$this->session->set_flashdata('message', lang('language_change'));
			echo 1;exit;
			//echo '<pre>'; print_r($this->session->all_userdata());die;
    }
	
	function download()
	{
		$file = BASEPATH.'../application/language/english/admin_lang.php';
		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit;
		}
	}
	
	
	function download_lang($name)
	{	$lang = strtolower(urldecode($name));
		$file = BASEPATH.'../application/language/'.$lang.'/admin_lang.php';
		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($file));
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			exit;
		}
	}


	function index($id=false){
		
		
		$data['langs'] = $this->language_model->get_all();
		$data['lang'] =	$lang	=	$this->language_model->get_language_id($id);
		if ($this->input->server('REQUEST_METHOD') === 'POST')
        {	
			$this->load->library('form_validation');
			$this->form_validation->set_rules('name', 'lang:language_name', 'required');
			$this->form_validation->set_rules('direction', 'lang:language_direction', 'required');
			$this->form_validation->set_message('required', lang('custom_required'));
			if ($this->form_validation->run()==true)
            {
				//echo '<pre>'; print_r($_FILES);die;
				
					if(!empty($_FILES['img']))
					{ 
						$config['upload_path'] = './assets/admin/uploads/languages/';
						$config['allowed_types'] = 'gif|jpg|png|jpeg';
						$config['max_size']	= '10000';
						$config['max_width']  = '10000';
						$config['max_height']  = '6000';
				
						$this->load->library('upload', $config);
				
						if ( !$img = $this->upload->do_upload('img'))
							{
								 
							}
							else
							{
								$img_data = array('upload_data' => $this->upload->data());
								$save['flag'] = $img_data['upload_data']['file_name'];
							}
						
					}
					
				$path = site_url('application/language/');
				$language_name = strtolower($this->input->post('name'));
				
				
				if (!file_exists('./application/language/' . $language_name)) {
						mkdir('./application/language/' . $language_name, 0777, true);
				}
				$eng_file	=	FCPATH.'application/language/english/admin_lang.php';
				$new_file	=	FCPATH.'application/language/'.$language_name.'/admin_lang.php';
				copy($eng_file, $new_file);
						
					
				$save['name'] = strtolower($this->input->post('name'));
				$save['direction'] = strtolower($this->input->post('direction'));
				
				if(!empty($id)){
					$this->session->set_flashdata('message', lang('language_update'));
					$this->language_model->update($save,$id);
				}else{
					$this->session->set_flashdata('message', lang('language_save'));
					$this->language_model->save($save);
				}
				
				
                //$this->session->set_flashdata('message', lang('general_settings_updated'));
				redirect('admin/languages');
				
			}
		}		
		
		
		$data['page_title'] = lang('language');
		$this->render_admin('language/language', $data);	

	}
	
	function delete($id){
		
		$lang	=	$this->language_model->get_language_id($id);
		$name = strtolower($lang->name);
		$img = BASEPATH.'../assets/admin/uploads/languages/'.$lang->flag;
		unlink($img);
		
		$file = BASEPATH.'../application/language/'.$name.'/admin_lang.php';
		unlink($file);
		
		$file = BASEPATH.'../application/language/'.$name;
		rmdir($file);
		
		$this->language_model->delete($id);
		$this->session->set_flashdata('message', lang('language_delete'));
		redirect('admin/languages');
	}
	
	
		
	
	
		
	
}