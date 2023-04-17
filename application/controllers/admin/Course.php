<?php 
class Course extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->library('image_lib');
        $this->load->model([
            'M_Courses',
            'M_Tutor',
            'M_Labels',
            'M_Benefit',
            'M_Materi',
            'M_Video'
        ]);

        if($this->session->userdata('is_admin') != TRUE && $this->session->userdata('is_tutor') != TRUE){
            redirect('admin','refresh');
        }
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

    function tambah(){
        $var = [
            'pemateri' => $this->M_Tutor->getActive(),
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

    function edit($id){
        $var = [
            'course' => $this->M_Courses->getById($id),
            'pemateri' => $this->M_Tutor->getActive(),
            'label' => $this->M_Labels->getActive(),
            'benefit' => $this->M_Benefit->getActive(),
            'ajax' => [
                'edit-course'
            ]
        ];

        $this->load->view('layout/admin/header');
        $this->load->view('admin/course-edit', $var);
        $this->load->view('layout/admin/footer', $var);
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

            $cekFlag = $this->M_Courses->getByFlag(strtolower(str_replace([' '], ['-'], $this->input->post('judul', TRUE))));
            if(@$cekFlag->id){
                $flag = strtolower(str_replace([' ', '.', ','], ['-', '', ''], $this->input->post('judul', TRUE))) . "-" .$cekFlag->id;
            }else{
                $flag = strtolower(str_replace([' ', '.', ','], ['-', '', ''], $this->input->post('judul', TRUE)));
            }
            
            $dataInsert = [
                'judul'=> $this->input->post('judul', TRUE),
                'flag' => $flag,
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
        $course = $this->M_Courses->getById($id);

        $filename = $course->cover;
		$config['upload_path'] = './uploads/courses';  
		$config['allowed_types'] = 'jpg|jpeg|png'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
        if($this->upload->do_upload('img')){
            if($course->cover){
                @unlink('./uploads/courses/' . @$course->cover);
            }

            $data = $this->upload->data();
            $filename = $data['file_name'];
            $this->resizeImage($filename); 
        }else{
            $filename = $course->cover;
		}

        $cekFlag = $this->M_Courses->getByFlag(strtolower(str_replace([' '], ['-'], $this->input->post('judul', TRUE))), $id);
        if(@$cekFlag->id){
            $flag = strtolower(str_replace([' ', '.', ','], ['-', '', ''], $this->input->post('judul', TRUE))) . "-" .$cekFlag->id;
        }else{
            $flag = strtolower(str_replace([' ', '.', ','], ['-', '', ''], $this->input->post('judul', TRUE)));
        }

        $dataUpdate = [
            'judul'=> $this->input->post('judul', TRUE),
            'flag' => $flag,
            'price' => $this->input->post('price'),
            'discount' => $this->input->post('discount'),
            'pemateriid' => $this->input->post('pemateriid'),
            'status' => $this->input->post('status'),
            'level' => $this->input->post('level'),
            'deskripsi' => $this->input->post('deskripsi'),
            'cover' => $filename
        ];
        $this->db->where('id', $id)->update('courses', $dataUpdate);

        $labels = $this->input->post('labels[]', TRUE);
        if(count($labels) > 0){
            $this->db->where('courseid', $id)->delete('courses_label');
            foreach($labels as $labelid){
                $this->db->insert('courses_label', [
                    'courseid' => $id,
                    'labelid' => $labelid
                ]);
            }
        }

        $benefit = $this->input->post('benefit[]', TRUE);
        if(count($benefit) > 0){
            $this->db->where('courseid', $id)->delete('courses_benefit');
            foreach($benefit as $benefitid){
                $this->db->insert('courses_benefit', [
                    'courseid' => $id,
                    'benefitid' => $benefitid
                ]);
            }
        }

        $this->session->set_flashdata('success', "Course Berhasil Di Simpan");
        redirect($_SERVER['HTTP_REFERER']);
    }

    function remove($id){
        $course = $this->M_Courses->getById($id);
        if(@$course->cover){
            @unlink('./uploads/courses/' . $course->cover);
        }

        $this->db->where('id', $id)->delete('courses');
        $res = ($this->db->affected_rows() > 0) ? 1 : 0;
        $this->output->set_content_type('application/json')->set_output(json_encode($res));
    }

    /************************************  Materi Media ************************************/
    function media($id){
        $var = [
            'course' => $this->M_Courses->getById($id),
            'materi' => $this->M_Materi->getByClass($id),
            'videos' => $this->M_Video->getByClass($id),
            'durasi' => $this->M_Video->sumDurationByClass($id),
            'ajax' => [
                'media-course'
            ]
        ];

        $this->load->view('layout/admin/header');
        $this->load->view('admin/course-media', $var);
        $this->load->view('layout/admin/footer', $var);
    }

    /* Action */
    function createMateri(){
        $this->db->insert('materi', [
            'courseid' => $this->input->post('courseid', TRUE),
            'materi' => $this->input->post('materi', TRUE)
        ]);

        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Materi Berhasil Di Tambahkan");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('error', "Materi Gagal Di Tambahkan");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function updateMateri(){
        $this->db->where([
            'id' => $this->input->post('id', TRUE),
            'courseid' => $this->input->post('courseid', TRUE)
        ])->update('materi', [
            'materi' => $this->input->post('materi', TRUE)
        ]);

        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Materi Berhasil Di Simpan");
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('error', "Materi Gagal Di Simpan");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function createVideo(){
        $filename = NULL;
		$config['upload_path'] = './uploads/courses/videos';  
		$config['allowed_types'] = '3g2|3gp|aaf|asf|avchd|avi|drc|flv|m2v|m3u8|m4p|m4v|mkv|mng|mov|mp2|mp4|mpe|mpeg|mpg|mpv|mxf|nsv|ogg|ogv|qt|rm|rmvb|roq|svi|vob|webm|wmv|yuv'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);

        if($this->upload->do_upload('video')){
            $data = $this->upload->data();
            $filename = $data['file_name'];
        }
        
        $this->db->insert('video', [
            'courseid' => $this->input->post('courseid', TRUE),
            'materiid' => $this->input->post('materiid', TRUE),
            'judul' => $this->input->post('judul', TRUE),
            'durasi' => $this->input->post('durasi', TRUE),
            'status' => $this->input->post('status', TRUE),
            'video' => $filename
        ]);

        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Video Berhasil Di Tambahkan");
            $this->session->set_flashdata('collapse', $this->input->post('materiid', TRUE));
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('error', "Video Gagal Di Tambahkan");
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    function removeMateri($id){
        $video = $this->M_Video->getByMateri($id);
        foreach($video->result() as $row){
            if($row->video){
                @unlink('./uploads/courses/videos/' . $row->video);
            }
        }
        
        $this->db->where('id', $id)->delete('materi');
        $res = ($this->db->affected_rows() > 0) ? 1 : 0;
        $this->output->set_content_type('application/json')->set_output(json_encode(1));
    }

    function removeVideo($id){
        $video = $this->M_Video->getById($id);
        if(@$video->video){
            @unlink('./uploads/courses/videos/' . @$video->video);
        }

        $this->db->where('id', $id)->delete('video');
        $res = ($this->db->affected_rows() > 0) ? 1 : 0;
        $this->output->set_content_type('application/json')->set_output(json_encode(1));
    }
}   