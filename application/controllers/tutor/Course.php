<?php 
class Course extends CI_Controller{
    function __construct(){
        parent::__construct();

        $this->load->library('image_lib');
        $this->load->model([
            'M_Tutor',
            'M_Courses',
            'M_Tutor',
            'M_Labels',
            'M_Benefit',
            'M_Materi',
            'M_Video',
            'M_Transaksi',
            'M_Reviews'
        ]);

        if($this->session->userdata('is_tutor') != TRUE) 
            redirect('tutor','refresh');
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
        $userid = $this->session->userdata('userid');
        $var = [
            'user' => $this->M_Tutor->getById($userid),
            'courses' => $this->M_Courses->getAll($userid),
            'ajax' => [
                'course'
            ]
        ];

        $this->load->view('layout/tutor/header', $var);
        $this->load->view('tutor/course', $var);
        $this->load->view('layout/tutor/footer', $var);
    }

    function tambah(){
        $userid = $this->session->userdata('userid');
        $var = [
            'user' => $this->M_Tutor->getById($userid),
            'label' => $this->M_Labels->getActive(),
            'benefit' => $this->M_Benefit->getActive(),
            'ajax' => [
                'add-course'
            ]
        ];

        $this->load->view('layout/tutor/header', $var);
        $this->load->view('tutor/course-tambah', $var);
        $this->load->view('layout/tutor/footer', $var);
    }

    function detail($id){
        $userid = $this->session->userdata('userid');
        $var = [
            'user' => $this->M_Tutor->getById($userid),
            'course' => $this->M_Courses->getById($id),
            'trx' => $this->M_Transaksi->getByCourse($id),
            'video' => $this->M_Video->getByClass($id),
            'reviews' => $this->M_Reviews->getByCourses($id),
            'ajax' => [
                'edit-course'
            ]
        ];

        $this->load->view('layout/tutor/header', $var);
        $this->load->view('tutor/course-detail', $var);
        $this->load->view('layout/tutor/footer', $var);
    }

    function edit($id){
        $userid = $this->session->userdata('userid');
        $var = [
            'user' => $this->M_Tutor->getById($userid),
            'course' => $this->M_Courses->getById($id),
            'pemateri' => $this->M_Tutor->getActive(),
            'label' => $this->M_Labels->getActive(),
            'benefit' => $this->M_Benefit->getActive(),
            'ajax' => [
                'edit-course'
            ]
        ];

        $this->load->view('layout/tutor/header', $var);
        $this->load->view('tutor/course-edit', $var);
        $this->load->view('layout/tutor/footer', $var);
    }

    /* Action */
    function create(){
        $userid = $this->session->userdata('userid');
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
                'pemateriid' => $userid,
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
                redirect('tutor/course','refresh');
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
        $userid = $this->session->userdata('userid');

        $var = [
            'user' => $this->M_Tutor->getById($userid),
            'course' => $this->M_Courses->getById($id),
            'materi' => $this->M_Materi->getByClass($id),
            'videos' => $this->M_Video->getByClass($id),
            'durasi' => $this->M_Video->sumDurationByClass($id),
            'ajax' => [
                'media-course'
            ]
        ];

        $this->load->view('layout/tutor/header', $var);
        $this->load->view('tutor/course-media', $var);
        $this->load->view('layout/tutor/footer', $var);
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

    function updateVideo(){
        $id = $this->input->post('id', TRUE);
        $video = $this->M_Video->getById($id);
        $filename = $video->video;
		$config['upload_path'] = './uploads/courses/videos';  
		$config['allowed_types'] = '3g2|3gp|aaf|asf|avchd|avi|drc|flv|m2v|m3u8|m4p|m4v|mkv|mng|mov|mp2|mp4|mpe|mpeg|mpg|mpv|mxf|nsv|ogg|ogv|qt|rm|rmvb|roq|svi|vob|webm|wmv|yuv'; 
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);

        if($this->upload->do_upload('video')){
            if(@$video->video){
                @unlink('./uploads/courses/videos/' . @$video->video);
            }

            $data = $this->upload->data();
            $filename = $data['file_name'];
        }

        $this->db->where('id', $id)->update('video', [
            'judul' => $this->input->post('judul', TRUE),
            'durasi' => $this->input->post('durasi', TRUE),
            'status' => $this->input->post('status', TRUE),
            'video' => $filename
        ]);

        if($this->db->affected_rows() > 0){
            $this->session->set_flashdata('success', "Video Berhasil Di Simpan");
            $this->session->set_flashdata('collapse', $this->input->post('materiid', TRUE));
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('error', "Video Gagal Di Simpan");
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

    function courseReview(){
        $userid = $this->session->userdata('userid');
        $var = [
            'user' => $this->M_Tutor->getById($userid),
            'courses' => $this->M_Courses->getAll($userid),
            'ajax' => [
                'course'
            ]
        ];

        $this->load->view('layout/tutor/header', $var);
        $this->load->view('tutor/reviews', $var);
        $this->load->view('layout/tutor/footer', $var);
    }
}   