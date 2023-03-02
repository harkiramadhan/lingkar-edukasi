<?php 
class Course extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->library('image_lib');
        $this->load->model([
            'M_Courses',
            'M_Pemateri',
            'M_Labels',
            'M_Benefit'
        ]);

        if($this->session->userdata('admin') != TRUE) 
            redirect('admin','refresh');
    }

    private function resizeImage($filename){
        $config['image_library'] = 'gd2';  
        $config['source_image'] = './uploads/courses/'.$filename;  
        $config['create_thumb'] = FALSE;  
        $config['maintain_ratio'] = TRUE;  
        $config['quality'] = '75%';  
        $config['new_image'] = './uploads/courses/'.$filename;  
        $config['width'] = 500;              
  
        $this->image_lib->initialize($config);
        $this->image_lib->resize();  
        $this->image_lib->clear();
    }

    function index(){
        $var = [
            'courses' => $this->M_Courses->getAll(),
            'ajax' => [
                'course'
            ]
        ];

        $this->load->view('layout/admin/header');
        $this->load->view('admin/course', $var);
        $this->load->view('layout/admin/footer', $var);
    }

    function detail($id){
        $var = [
            'course' => $this->M_Courses->getById($id),
            'ajax' => [
                'edit-course'
            ]
        ];

        $this->load->view('layout/admin/header');
        $this->load->view('admin/course-detail', $var);
        $this->load->view('layout/admin/footer', $var);
    }

    function tambah(){
        $var = [
            'pemateri' => $this->M_Pemateri->getActive(),
            'label' => $this->M_Labels->getActive(),
            'benefit' => $this->M_Benefit->getActive(),
            'ajax' => [
                'add-course'
            ]
        ];

        $this->load->view('layout/admin/header');
        $this->load->view('admin/course-tambah', $var);
        $this->load->view('layout/admin/footer', $var);
    }

    function media(){
        $this->load->view('layout/admin/header');
        $this->load->view('admin/course-media');
        $this->load->view('layout/admin/footer');
    }

    /* Action */
    function create(){
        $filename = NULL;
		$config['upload_path'] = './uploads/courses';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
            $data = $this->upload->data();
            $filename = $data['file_name'];
			$this->resizeImage($filename); 

            $dataInsert = [
                'judul'=> $this->input->post('judul', TRUE),
                'flag' => strtolower(str_replace([' '], ['-'], $this->input->post('judul', TRUE))),
                'price' => $this->input->post('price'),
                'discount' => $this->input->post('discount'),
                'pemateriid' => $this->input->post('pemateriid'),
                'status' => $this->input->post('status'),
                'level' => $this->input->post('level'),
                'deskripsi' => $this->input->post('deskripsi'),
                'cover' => $filename
            ];
            $this->db->insert('courses', $dataInsert);
            if($this->db->affected_rows() > 0){
                $courseid = $this->db->insert_id();

                $labels = $this->input->post('labels[]', TRUE);
                if(count($labels) > 0){
                    foreach($labels as $labelid){
                        $this->db->insert('courses_label', [
                            'courseid' => $courseid,
                            'labelid' => $labelid
                        ]);
                    }
                }

                $benefit = $this->input->post('benefit[]', TRUE);
                if(count($benefit) > 0){
                    foreach($benefit as $benefitid){
                        $this->db->insert('courses_benefit', [
                            'courseid' => $courseid,
                            'benefitid' => $benefitid
                        ]);
                    }
                }

                $this->session->set_flashdata('success', "Course Berhasil Di Tambahkan");
                redirect('admin/course','refresh');
            }else{
                $this->session->set_flashdata('success', "Course Gagal Di Tambahkan");
                $this->session->set_flashdata($dataInsert);
                redirect($_SERVER['HTTP_REFERER']);
            }
        }else{
			$this->session->set_flashdata('error', $this->upload->display_errors());
            redirect($_SERVER['HTTP_REFERER']);
		}

    }

    function update($id){

    }

    function remove($id){
        $course = $this->M_Courses->getById($id);
        if(@$course->cover){
            @unlink('./uploads/courses/' . $course->cover);
        }

        $this->db->where('id', $id)->delete('courses');
        if($this->db->affected_rows() > 0){
            $res = 1;
        }else{
            $res = 0;
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($res));
    }
}   